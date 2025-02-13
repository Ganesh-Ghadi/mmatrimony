<?php

namespace App\Http\Controllers\admin;

use Excel;
use Throwable;
use App\Models\User;
use App\Models\Caste;
use App\Models\Profile;
use App\Models\SubCaste;
use Illuminate\Http\Request;
use App\Imports\ImportUserProfiles;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Default\UpdateProfileRequest;

class ProfilesController extends Controller
{
    // public function index()
    // {
    //     $profiles = Profile::paginate(12);
    //     return view('admin.user_profiles.index', ['profiles' => $profiles]);
    // }

    public function index(Request $request)
{
    $query = Profile::query();

    if ($request->has('search')) {
        $search = $request->input('search');
        $query->where(function ($q) use ($search) {
            $q->where('first_name', 'like', "%{$search}%")
              ->orWhere('middle_name', 'like', "%{$search}%")
              ->orWhere('last_name', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%")
              ->orWhere('mobile', 'like', "%{$search}%");
         });
    }

    $profiles = $query->paginate(12);
    return view('admin.user_profiles.index', compact('profiles'));
}


    public function edit(string $id)
    {
        $profile = Profile::find($id);
        $castes = Caste::all();
        $subCastes = SubCaste::all();
        return view('admin.user_profiles.edit', ['profile' => $profile, 'castes' => $castes, 'subCastes' => $subCastes]);
    }

    // public function user_profiles()
    // {
    //     $user = auth()->user()->profile()->first();
    //     return view('admin.user_profiles.create', ['user' => $user]);
    // }


    public function update(Request $request, string $id)
    {
        // dd($id);
        // dd($request->all());
        $profile = Profile::find($id);
        $data = $request->all();
        if ($request->hasFile('img_1')) {
            if (!empty($profile->img_1) && Storage::exists('public/images/'.$profile->img_1)) {
                Storage::delete('public/images/'.$profile->img_1);
            }

            // Get the uploaded image file details
            $img_1FileNameWithExtention = $request->file('img_1')->getClientOriginalName();
            $img_1Filename = pathinfo($img_1FileNameWithExtention, PATHINFO_FILENAME);
            $img_1Extention = $request->file('img_1')->getClientOriginalExtension();
            $img_1FileNameToStore = $img_1Filename . '_' . time() . '.' . $img_1Extention;

            // Store the image temporarily
            $img_1Path = $request->file('img_1')->storeAs('public/images', $img_1FileNameToStore);

            // Get the path to the uploaded image
            $imagePath = storage_path('app/public/images/' . $img_1FileNameToStore);

            // Open the uploaded image
            $image = imagecreatefromjpeg($imagePath);
            if ($image === false) {
                return redirect()->back()->with('error', 'Failed to open image.');
            }

            // Get the current image dimensions
            $imageWidth = imagesx($image);
            $imageHeight = imagesy($image);

            // Define the desired 5:7 aspect ratio
            $desiredAspectRatio = 5 / 7;

            // Resize logic for 5:7 ratio
            if ($imageWidth / $imageHeight > $desiredAspectRatio) {
                // If width is too large for the 5:7 ratio, crop width
                $newWidth = $imageHeight * $desiredAspectRatio;
                $newHeight = $imageHeight;
            } else {
                // If height is too large for the 5:7 ratio, crop height
                $newWidth = $imageWidth;
                $newHeight = $imageWidth / $desiredAspectRatio;
            }

            // Crop the image to maintain the 5:7 ratio
            $resizedImage = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresampled($resizedImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $imageWidth, $imageHeight);

            // Save the resized image
            imagejpeg($resizedImage, $imagePath);

            // Free up memory
            imagedestroy($image);
            imagedestroy($resizedImage);

            // Font and color for the text
            $fontPath = public_path('fonts/font-1.ttf');  // Ensure this is the correct path to your TTF font

            // Colors for text and shadow
            $shadowColor = imagecolorallocatealpha($image, 0, 0, 0, 50);  // Faded shadow
            $textColor = imagecolorallocatealpha($image, 255, 0, 0, 100);  // Faded text

            // Text to overlay
            $text = 'Maratha Vivah Mandal';

            // Get the image dimensions again after resizing
            $imageWidth = imagesx($resizedImage);
            $imageHeight = imagesy($resizedImage);

            // Dynamically adjust the font size based on image dimensions
            $maxFontSize = 0;
            $fontSize = 1;  // Start with the smallest font size and increase it
            while ($fontSize < 100) {  // Maximum font size limit (adjust as needed)
                // Get the bounding box for the current font size
                $textBoundingBox = imagettfbbox($fontSize, 0, $fontPath, $text);
                $textWidth = $textBoundingBox[2] - $textBoundingBox[0];
                $textHeight = $textBoundingBox[1] - $textBoundingBox[7];

                // Check if the text fits within the image width and height
                if ($textWidth <= $imageWidth && $textHeight <= $imageHeight) {
                    $maxFontSize = $fontSize;  // Store the last valid font size
                } else {
                    break;  // Exit the loop if the text doesn't fit
                }

                $fontSize++;
            }

            // Calculate the text position (center it on the image)
            $textBoundingBox = imagettfbbox($maxFontSize, 0, $fontPath, $text);
            $textWidth = $textBoundingBox[2] - $textBoundingBox[0];
            $textHeight = $textBoundingBox[1] - $textBoundingBox[7];

            $x = ($imageWidth - $textWidth) / 2;  // Center the text horizontally
            $y = ($imageHeight - $textHeight) / 2 + $textHeight;  // Center the text vertically

            // Ensure text is inside the image (if the calculated position is too close to the edge)
            if ($x < 0) {
                $x = 0;
            } elseif ($x + $textWidth > $imageWidth) {
                $x = $imageWidth - $textWidth;
            }

            if ($y < $textHeight) {
                $y = $textHeight;
            } elseif ($y + $textHeight > $imageHeight) {
                $y = $imageHeight - $textHeight;
            }

            // Add shadow layer
            $shadowOffsetX = 3;
            $shadowOffsetY = 3;

            // First, draw the shadow layer (text slightly offset)
            imagettftext($resizedImage, $maxFontSize, 0, $x + $shadowOffsetX, $y + $shadowOffsetY, $shadowColor, $fontPath, $text);

            // Then, draw the main text on top of the shadow
            imagettftext($resizedImage, $maxFontSize, 0, $x, $y, $textColor, $fontPath, $text);

            // Save the modified image
            imagejpeg($resizedImage, $imagePath);

            // Free up memory
            imagedestroy($resizedImage);

            // Assign the image name to the data array
            $data['img_1'] = $img_1FileNameToStore;
        }
        if ($request->hasFile('img_patrika')) {
            $img_patrikaFileNameWithExtention = $request->file('img_patrika')->getClientOriginalName();
            $img_patrikaFilename = pathinfo($img_patrikaFileNameWithExtention, PATHINFO_FILENAME);
            $img_patrikaExtention = $request->file('img_patrika')->getClientOriginalExtension();
            $img_patrikaFileNameToStore = $img_patrikaFilename . '_' . time() . '.' . $img_patrikaExtention;
            $img_patrikaPath = $request->file('img_patrika')->storeAs('public/images', $img_patrikaFileNameToStore);
        }

        if ($request->hasFile('img_2')) {
            if (!empty($profile->img_2) && Storage::exists('public/images/' . $profile->img_2)) {
                Storage::delete('public/images/' . $profile->img_2);
            }
            // Get the uploaded image file details
            $img_2FileNameWithExtention = $request->file('img_2')->getClientOriginalName();
            $img_2Filename = pathinfo($img_2FileNameWithExtention, PATHINFO_FILENAME);
            $img_2Extention = $request->file('img_2')->getClientOriginalExtension();
            $img_2FileNameToStore = $img_2Filename . '_' . time() . '.' . $img_2Extention;

            // Store the image in the 'public/images' directory
            $img_2Path = $request->file('img_2')->storeAs('public/images', $img_2FileNameToStore);

            // GD library to add text to the image
            $imagePath = storage_path('app/public/images/' . $img_2FileNameToStore);

            // Open the image file
            $image = imagecreatefromjpeg($imagePath);

            if ($image === false) {
                // Handle image opening failure
                return redirect()->back()->with('error', 'Failed to open image.');
            }

            // Font and color for the text
            $fontPath = public_path('fonts/font-1.ttf');  // Ensure this is the correct path to your TTF font

            // Colors for text and shadow (faded shadow effect)
            $shadowColor = imagecolorallocatealpha($image, 0, 0, 0, 50);  // Black color with alpha 50 (faded shadow)
            $textColor = imagecolorallocatealpha($image, 255, 0, 0, 100);  // Red color with alpha 100 (faded text)

            // Text to overlay
            $text = 'Maratha Vivah Mandal';

            // Get the image dimensions
            $imageWidth = imagesx($image);
            $imageHeight = imagesy($image);

            // Dynamically adjust the font size based on the image size
            $fontSize = min($imageWidth, $imageHeight) / 10;  // Scale font size based on image size

            // Get the text dimensions
            $textBoundingBox = imagettfbbox($fontSize, 0, $fontPath, $text);
            $textWidth = $textBoundingBox[2] - $textBoundingBox[0];
            $textHeight = $textBoundingBox[1] - $textBoundingBox[7];

            // Calculate the position to center the text
            $x = ($imageWidth - $textWidth) / 2;  // Center the text horizontally
            $y = ($imageHeight - $textHeight) / 2 + $textHeight;  // Center the text vertically

            // Add shadow layer to simulate 3D effect (slightly offset shadow)
            $shadowOffsetX = 3;  // Horizontal offset of shadow
            $shadowOffsetY = 3;  // Vertical offset of shadow

            // First, draw the shadow layer (text slightly offset)
            imagettftext($image, $fontSize, 0, $x + $shadowOffsetX, $y + $shadowOffsetY, $shadowColor, $fontPath, $text);

            // Then, draw the main text on top of the shadow
            imagettftext($image, $fontSize, 0, $x, $y, $textColor, $fontPath, $text);

            // Save the modified image (overwrites the original file)
            imagejpeg($image, $imagePath);

            // Free up memory after modifying the image
            imagedestroy($image);

            // Assign the image name to the data array
            $data['img_2'] = $img_2FileNameToStore;
        }

        if ($request->hasFile('img_3')) {
            if (!empty($profile->img_3) && Storage::exists('public/images/' . $profile->img_3)) {
                Storage::delete('public/images/' . $profile->img_3);
            }
            // Get the uploaded image file details
            $img_3FileNameWithExtention = $request->file('img_3')->getClientOriginalName();
            $img_3Filename = pathinfo($img_3FileNameWithExtention, PATHINFO_FILENAME);
            $img_3Extention = $request->file('img_3')->getClientOriginalExtension();
            $img_3FileNameToStore = $img_3Filename . '_' . time() . '.' . $img_3Extention;

            // Store the image in the 'public/images' directory
            $img_3Path = $request->file('img_3')->storeAs('public/images', $img_3FileNameToStore);

            // GD library to add text to the image
            $imagePath = storage_path('app/public/images/' . $img_3FileNameToStore);

            // Open the image file
            $image = imagecreatefromjpeg($imagePath);

            if ($image === false) {
                // Handle image opening failure
                return redirect()->back()->with('error', 'Failed to open image.');
            }

            // Font and color for the text
            $fontPath = public_path('fonts/font-1.ttf');  // Ensure this is the correct path to your TTF font

            // Colors for text and shadow (faded shadow effect)
            $shadowColor = imagecolorallocatealpha($image, 0, 0, 0, 50);  // Black color with alpha 50 (faded shadow)
            $textColor = imagecolorallocatealpha($image, 255, 0, 0, 100);  // Red color with alpha 100 (faded text)

            // Text to overlay
            $text = 'Maratha Vivah Mandal';

            // Get the image dimensions
            $imageWidth = imagesx($image);
            $imageHeight = imagesy($image);

            // Dynamically adjust the font size based on the image size (for better scaling)
            $fontSize = min($imageWidth, $imageHeight) / 10;  // Font size based on the image's smallest dimension (adjust /10 to suit)

            // Get the text dimensions
            $textBoundingBox = imagettfbbox($fontSize, 0, $fontPath, $text);
            $textWidth = $textBoundingBox[2] - $textBoundingBox[0];
            $textHeight = $textBoundingBox[1] - $textBoundingBox[7];

            // Calculate the position to center the text
            $x = ($imageWidth - $textWidth) / 2;  // Center the text horizontally
            $y = ($imageHeight - $textHeight) / 2 + $textHeight;  // Center the text vertically

            // Add shadow layer to simulate 3D effect (slightly offset shadow)
            $shadowOffsetX = 3;  // Horizontal offset of shadow
            $shadowOffsetY = 3;  // Vertical offset of shadow

            // First, draw the shadow layer (text slightly offset)
            imagettftext($image, $fontSize, 0, $x + $shadowOffsetX, $y + $shadowOffsetY, $shadowColor, $fontPath, $text);

            // Then, draw the main text on top of the shadow
            imagettftext($image, $fontSize, 0, $x, $y, $textColor, $fontPath, $text);

            // Save the modified image (overwrites the original file)
            imagejpeg($image, $imagePath);

            // Free up memory after modifying the image
            imagedestroy($image);

            // Assign the image name to the data array
            $data['img_3'] = $img_3FileNameToStore;
        }

        if ($request->hasFile('img_1')) {
            $data['img_1'] = $img_1FileNameToStore;
        }
        if ($request->hasFile('img_patrika')) {
            $data['img_patrika'] = $img_patrikaFileNameToStore;
        }

        if ($request->hasFile('img_2')) {
            $data['img_2'] = $img_2FileNameToStore;
        }

        if ($request->hasFile('img_3')) {
            $data['img_3'] = $img_3FileNameToStore;
        }
        $data['lens'] = $request->has('lens');
        $data['spectacles'] = $request->has('spectacles');

        if ($profile) {
            $profile->update($data);  // update() handles mass assignment based on fillable fields
        } else {
            return redirect()->back()->with('error', 'Profile not found.');
        }

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
    

    public function import()
    {
        return view('admin.user_profiles.import');
    }

    public function destroy(string $id)
    {
        // Find the profile by ID
        $profile = Profile::find($id);
    
        // Check if profile exists
        if (!$profile) {
            return redirect()->back()->with('error', 'Profile not found');
        }
    
        // Find the user associated with this profile
        $user = User::find($profile->user_id);
    
        // Check if user exists
        if ($user) {
            // Optional: Delete the profile if you want to delete the related profile as well
            // $profile->delete();
    
            // Delete the user
            $user->delete();
    
            // Redirect with success message
            return redirect('/user_profiles')->with('success', 'Profile deleted successfully');
        } else {
            // Handle case where user is not found
            return redirect()->back()->with('error', 'User associated with the profile not found');
        }
    }


    public function importUserProfilesExcel(Request $request)
    {
        try {
            Excel::import(new ImportUserProfiles, $request->file);
            $request->session()->flash('success', 'Excel imported successfully!');
            return redirect()->route('user_profiles.index');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    

}