<?php

namespace App\Http\Controllers;

use App\Http\Requests\Default\UpdateProfileRequest;
use App\Models\Caste;
use App\Models\Package;
use App\Models\Profile;
use App\Models\ProfilePackage;
use App\Models\SubCaste;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UserProfilesController extends Controller
{
    public function calculateProfileCompletion($user)
    {
        // Define the fields that contribute to profile completion
        $fields = [
            'first_name',
            'middle_name',
            'last_name',
            'mother_tongue',
            'native_place',
            'gender',
            'marital_status',
            'living_with',
            'blood_group',
            'height',
            'weight',
            'body_type',
            'complexion',
            'physical_abnormality',
            'spectacles',
            'lens',
            'eating_habits',
            'drinking_habits',
            'smoking_habits',
            'about_self',
            'img_1',
            'img_2',
            'img_3',
            'religion',
            'cast',
            'sub_cast',
            'gotra',
            'father_is_alive',
            'father_name',
            'father_occupation',
            'father_organization',
            'father_job_type',
            'mother_is_alive',
            'mother_name',
            'mother_occupation',
            'number_of_brothers_married',
            'number_of_brothers_unmarried',
            'brother_resident_place',
            'number_of_sisters_married',
            'number_of_sisters_unmarried',
            'sister_resident_place',
            'about_parents',
            'date_of_birth',
            'birth_time',
            'birth_place',
            'highest_education',
            'education_in_detail',
            'additional_degree',
            'occupation',
            'organization',
            'designation',
            'job_location',
            'job_experience',
            'income',
            'currency',
            'country',
            'state',
            'city',
            'address_line_1',
            'address_line_2',
            'landmark',
            'pincode',
            'mobile',
            'landline',
            'email',
            'partner_min_age',
            'partner_max_age',
            'partner_min_height',
            'partner_max_height',
            'partner_income',
            'partner_currency',
            'want_to_see_patrika',
            'partner_sub_cast',
            'partner_eating_habbit',
            'partner_city_preference',
            'partner_education',
            'partner_education_specialization',
            'partner_job',
            'partner_business',
            'partner_foreign_resident',
        ];

        // Count how many of these fields are filled
        $filledFields = 0;
        foreach ($fields as $field) {
            if (!empty($user->$field)) {
                $filledFields++;
            }
        }

        // Calculate the completion percentage
        $totalFields = count($fields);
        $completionPercentage = ($filledFields / $totalFields) * 100;

        return round($completionPercentage);  // Return rounded completion percentage
    }

    public function search(Request $request)
    {
        // Get the search inputs
        $query = $request->input('query');
        $from_age = $request->input('from_age');
        $to_age = $request->input('to_age');
        $marital_status = $request->input('marital_status');
        $castes = $request->input('caste');
        // dd($castes);
        $from_height = $request->input('from_height');
        $to_height = $request->input('to_height');
        $Castes = Caste::all();
        $SubCastes = SubCaste::all();
        $Subcastes = $request->input('Subcastes');

        // Initialize query builder for Profile model
        $users = Profile::query();

        // Filter by name if a query is provided
        if ($query) {
            $users->where(function ($queryBuilder) use ($query) {
                $queryBuilder
                    ->where('first_name', 'like', '%' . $query . '%')
                    ->orWhere('last_name', 'like', '%' . $query . '%');
            });
        }

        // Filter by marital status if provided
        if ($marital_status) {
            $users->whereIn('marital_status', $marital_status);
        }

        // Apply age filtering by converting birthdate to age
        if ($from_age && $to_age) {
            $users
                ->whereNotNull('date_of_birth')  // Ensure users have a birthdate
                ->whereRaw('TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE()) BETWEEN ? AND ?', [$from_age, $to_age]);
        }

        if ($castes) {
            // Ensure $castes is an array even if it's a single value
            if (!is_array($castes)) {
                $castes = [$castes];  // Convert the single value to an array
            }
            $users->whereIn('caste', $castes);
        }
        if ($Subcastes) {
            // Ensure $castes is an array even if it's a single value
            if (!is_array($Subcastes)) {
                $Subcastes = [$Subcastes];  // Convert the single value to an array
            }
            $users->whereIn('sub_caste', $Subcastes);
        }

        // if ($castes) {
        //     $users->where(function ($queryBuilder) use ($query) {
        //         $queryBuilder
        //             ->where('caste', $query);
        //     });
        // }
        // if ($Subcastes) {
        //     $users->where(function ($queryBuilder) use ($query) {
        //         $queryBuilder
        //             ->where('sub_caste', 'like', '%' . $query . '%');
        //     });
        // }

        if ($from_height && $to_height) {
            $users
                ->whereNotNull('height')  // Ensure users have a height
                ->whereRaw('height BETWEEN ? AND ?', [$from_height, $to_height]);
        }

        // Fetch users from the database
        if (auth()->user()->profile->role === 'bride') {
            $users = $users->where('role', 'groom')->get();
        } elseif (auth()->user()->profile->role === 'groom') {
            $users = $users->where('role', 'bride')->get();
        }

        foreach ($users as $user) {
            $user->is_favorited = auth()->user()->profile->favoriteProfiles()->where('favorite_profile_id', $user->id)->exists();
        }

        // Convert birthdate to age for each user, handling null or invalid birthdates
        foreach ($users as $user) {
            if ($user->date_of_birth) {
                try {
                    $user->age = Carbon::parse($user->date_of_birth)->age;
                } catch (\Exception $e) {
                    $user->age = 'Unknown';  // Handle invalid dates
                }
            } else {
                $user->age = 'Unknown';  // Handle users without a birthdate
            }
        }

        // If no filters applied, show random 10 users
        if (empty($query) && empty($from_age) && empty($to_age) && empty($marital_status)) {
            if (auth()->user()->profile->role === 'bride') {
                $users = $users->where('role', 'groom')->shuffle()->take(10);
            } elseif (auth()->user()->profile->role === 'groom') {
                $users = $users->where('role', 'bride')->shuffle()->take(10);
            }
            foreach ($users as $user) {
                $user->is_favorited = auth()->user()->profile->favoriteProfiles()->where('favorite_profile_id', $user->id)->exists();
            }
        }

        // Return the filtered users to the view
        return view('default.view.profile.search.create', ['users' => $users, 'Caste' => $Castes, 'SubCaste' => $SubCastes]);
    }

    public function view_profile()
    {
        $profiles = Profile::all();
        $user = auth()->user()->profile()->first();
        $profileCompletion = $this->calculateProfileCompletion($user);
        return view('default.view.profile.view_profile.create', ['user' => $user, 'profiles' => $profiles, 'profileCompletion' => $profileCompletion]);
    }

    public function basic_details(Request $request)
    {
        $user = auth()->user()->profile()->first();
        $profileCompletion = $this->calculateProfileCompletion($user);
        return view('default.view.profile.basic_details.index', ['user' => $user, 'profileCompletion' => $profileCompletion]);
    }

    public function basic_details_store(Request $request)
    {
        $profile_pics = auth()->user()->profile->img_1;
        $rules = [
            'first_name' => 'required|string|max:100',
            'middle_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'mother_tongue' => 'nullable|string|max:100',
            'native_place' => 'nullable|string|max:100',
            'gender' => 'required|string|max:50',
            'marital_status' => 'required|string|max:50',
            'living_with' => 'required|string|max:100',
            'blood_group' => 'required|string|max:10',
            'height' => 'required|string|max:10',
            'weight' => 'nullable|string|max:10',
            'body_type' => 'required|string|max:50',
            'complexion' => 'required|string|max:50',
            'physical_abnormality' => 'required|boolean',
            'spectacles' => 'nullable|boolean',
            'lens' => 'nullable|boolean',
            'eating_habits' => 'nullable|string|max:100',
            'drinking_habits' => 'nullable|string|max:100',
            'smoking_habits' => 'nullable|string|max:100',
            'img_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'img_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
        if ($profile_pics) {
            // If profile exists, make img_1 nullable
            $rules['img_1'] = 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048';
        } else {
            // If profile does not exist, img_1 is required
            $rules['img_1'] = 'required|image|mimes:jpeg,png,jpg,gif|max:2048';
        }

        $validated = $request->validate($rules);
        $data = $validated;
        // dd($data);
        if ($request->hasFile('img_1')) {
            $img_1FileNameWithExtention = $request->file('img_1')->getClientOriginalName();
            $img_1Filename = pathinfo($img_1FileNameWithExtention, PATHINFO_FILENAME);
            $img_1Extention = $request->file('img_1')->getClientOriginalExtension();
            $img_1FileNameToStore = $img_1Filename . '_' . time() . '.' . $img_1Extention;
            $img_1Path = $request->file('img_1')->storeAs('public/images', $img_1FileNameToStore);
        }

        if ($request->hasFile('img_2')) {
            $img_2FileNameWithExtention = $request->file('img_2')->getClientOriginalName();
            $img_2Filename = pathinfo($img_2FileNameWithExtention, PATHINFO_FILENAME);
            $img_2Extention = $request->file('img_2')->getClientOriginalExtension();
            $img_2FileNameToStore = $img_2Filename . '_' . time() . '.' . $img_2Extention;
            $img_2Path = $request->file('img_2')->storeAs('public/images', $img_2FileNameToStore);
        }

        if ($request->hasFile('img_3')) {
            $img_3FileNameWithExtention = $request->file('img_3')->getClientOriginalName();
            $img_3Filename = pathinfo($img_3FileNameWithExtention, PATHINFO_FILENAME);
            $img_3Extention = $request->file('img_3')->getClientOriginalExtension();
            $img_3FileNameToStore = $img_3Filename . '_' . time() . '.' . $img_3Extention;
            $img_3Path = $request->file('img_3')->storeAs('public/images', $img_3FileNameToStore);
        }

        if ($request->hasFile('img_1')) {
            $data['img_1'] = $img_1FileNameToStore;
        }

        if ($request->hasFile('img_2')) {
            $data['img_2'] = $img_2FileNameToStore;
        }

        if ($request->hasFile('img_3')) {
            $data['img_3'] = $img_3FileNameToStore;
        }

        $profile = Profile::where('user_id', auth()->user()->id)->first();
        if ($profile) {
            $profile->update($data);
        } else {
            return redirect()->back()->with('error', 'Profile not found.');
        }

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function religious_details()
    {
        $user = auth()->user()->profile()->first();
        $castes = Caste::all();
        $subCastes = SubCaste::all();
        $profileCompletion = $this->calculateProfileCompletion($user);
        return view('default.view.profile.religious_details.create', ['user' => $user, 'castes' => $castes, 'subCastes' => $subCastes, 'profileCompletion' => $profileCompletion]);
    }

    public function religious_details_store(Request $request)
    {
        $validated = $request->validate([
            'religion' => 'required|string|max:100',
            'caste' => 'required|integer',
            'sub_caste' => 'required|integer',
            'gotra' => 'nullable|string|max:100',
        ]);
        $data = $validated;

        $profile = Profile::where('user_id', auth()->user()->id)->first();
        if ($profile) {
            $profile->update($data);
        } else {
            return redirect()->back()->with('error', 'Profile not found.');
        }

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function family_details()
    {
        $user = auth()->user()->profile()->first();
        $profileCompletion = $this->calculateProfileCompletion($user);
        return view('default.view.profile.family_details.create', ['user' => $user, 'profileCompletion' => $profileCompletion]);
    }

    public function family_details_store(Request $request)
    {
        $validated = $request->validate([
            'father_is_alive' => 'required|boolean',
            'father_name' => 'nullable|string|max:100',
            'father_occupation' => 'nullable|string|max:100',
            'father_job_type' => 'nullable|string|max:100',
            'father_organization' => 'nullable|string|max:100',
            'mother_is_alive' => 'nullable|boolean',
            'mother_name' => 'nullable|string|max:100',
            'mother_occupation' => 'nullable|string|max:100',
            'mother_job_type' => 'nullable|string|max:100',
            'mother_organization' => 'nullable|string|max:100',
            'brother_resident_place' => 'nullable|string|max:100',
            'number_of_brothers_married' => 'nullable|integer|min:0|max:10',
            'number_of_brothers_unmarried' => 'nullable|integer|min:0|max:10',
            'sister_resident_place' => 'nullable|string|max:100',
            'number_of_sisters_married' => 'nullable|integer|min:0|max:10',
            'number_of_sisters_unmarried' => 'nullable|integer|min:0|max:10',
            'about_parents' => 'nullable|string',
        ]);
        $data = $validated;

        $profile = Profile::where('user_id', auth()->user()->id)->first();
        if ($profile) {
            $profile->update($data);
        } else {
            return redirect()->back()->with('error', 'Profile not found.');
        }

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function astronomy_details()
    {
        $user = auth()->user()->profile()->first();
        $profileCompletion = $this->calculateProfileCompletion($user);
        return view('default.view.profile.astronomy_details.create', ['user' => $user, 'profileCompletion' => $profileCompletion]);
    }

    public function astronomy_details_store(Request $request)
    {
        // dd($request);
        // Validate input data
        $validated = $request->validate([
            'birth_place' => 'nullable|string|max:100',
            'date_of_birth' => 'nullable|date',
            'birth_time' => 'nullable|string|max:50',
            'when_meet' => 'nullable|boolean',
            'rashee' => 'nullable|string|max:50',
            'nakshatra' => 'nullable|string|max:50',
            'mangal' => 'nullable|string|max:50',
            'charan' => 'nullable|string|max:50',
            'gana' => 'nullable|string|max:50',
            'nadi' => 'nullable|string|max:50',
            'chart' => 'nullable|string|max:50',
            'more_about_patrika' => 'nullable|string',
            'celestial_bodies' => 'nullable|string|max:50',
            'img_patrika' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $data = $validated;

        if ($request->hasFile('img_patrika')) {
            $img_patrikaFileNameWithExtention = $request->file('img_patrika')->getClientOriginalName();
            $img_patrikaFilename = pathinfo($img_patrikaFileNameWithExtention, PATHINFO_FILENAME);
            $img_patrikaExtention = $request->file('img_patrika')->getClientOriginalExtension();
            $img_patrikaFileNameToStore = $img_patrikaFilename . '_' . time() . '.' . $img_patrikaExtention;
            $img_patrikaPath = $request->file('img_patrika')->storeAs('public/images', $img_patrikaFileNameToStore);
        }
        if ($request->hasFile('img_patrika')) {
            $data['img_patrika'] = $img_patrikaFileNameToStore;
        }

        $profile = Profile::where('user_id', auth()->user()->id)->first();
        if ($profile) {
            $profile->update($data);
        } else {
            return redirect()->back()->with('error', 'Profile not found.');
        }

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function educational_details()
    {
        $user = auth()->user()->profile()->first();
        $profileCompletion = $this->calculateProfileCompletion($user);
        return view('default.view.profile.educational_details.create', ['user' => $user, 'profileCompletion' => $profileCompletion]);
    }

    public function educational_details_store(Request $request)
    {
        $validated = $request->validate([
            'highest_education' => 'required|string|max:100',  // Fixed typo here: 'required' instead of 'requried'
            'education_in_detail' => 'nullable|string',
            'additional_degree' => 'nullable|string|max:100',
        ]);

        $data = $validated;

        $profile = Profile::where('user_id', auth()->user()->id)->first();
        if ($profile) {
            $profile->update($data);
        } else {
            return redirect()->back()->with('error', 'Profile not found.');
        }

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function occupation_details()
    {
        $user = auth()->user()->profile()->first();
        $profileCompletion = $this->calculateProfileCompletion($user);
        return view('default.view.profile.occupation_details.create', ['user' => $user, 'profileCompletion' => $profileCompletion]);
    }

    public function contact_details()
    {
        $user = auth()->user()->profile()->first();
        $profileCompletion = $this->calculateProfileCompletion($user);

        return view('default.view.profile.contact_details.create', ['user' => $user, 'profileCompletion' => $profileCompletion]);
    }

    public function life_partner()
    {
        $user = auth()->user()->profile()->first();
        $profileCompletion = $this->calculateProfileCompletion($user);
        return view('default.view.profile.life_partner.create', ['user' => $user, 'profileCompletion' => $profileCompletion]);
    }

    //  ->where(function ($query) use ($data) {
    //     $query->whereHas('Manager', function ($query) use ($data) {
    //         $query->where('name', 'like', "%$data%");
    //     })
    //     ->orWhereHas('Manager.AreaManager', function ($query) use ($data) {
    //         $query->where('name', 'like', "%$data%");
    //     })
    //     ->orWhereHas('Manager.ZonalManager', function ($query) use ($data) {
    //         $query->where('name', 'like', "%$data%");
    //     });
    //    })

    public function user_packages()
    {
        $user = auth()->user()->profile()->first();
        $purchased_packages = auth()
            ->user()
            ->profile
            ->profilePackages()
            ->withPivot('tokens_received', 'tokens_used', 'starts_at', 'expires_at')
            ->where('expires_at', '>', now())
            ->get();

        $packages = Package::all();
        return view('default.view.profile.user_packages.create', ['user' => $user, 'packages' => $packages, 'purchased_packages' => $purchased_packages]);
    }

    public function show($id)
    {
        // Find the user by ID
        $user = Profile::findOrFail($id);

        // Return a view with the user's data
        return view('default.view.profile.other_view.create', ['user' => $user]);
    }

    public function store(UpdateProfileRequest $request)
    {
        if ($request->hasFile('img_1')) {
            $img_1FileNameWithExtention = $request->file('img_1')->getClientOriginalName();
            $img_1Filename = pathinfo($img_1FileNameWithExtention, PATHINFO_FILENAME);
            $img_1Extention = $request->file('img_1')->getClientOriginalExtension();
            $img_1FileNameToStore = $img_1Filename . '_' . time() . '.' . $img_1Extention;
            $img_1Path = $request->file('img_1')->storeAs('public/images', $img_1FileNameToStore);
        }
        if ($request->hasFile('img_patrika')) {
            $img_patrikaFileNameWithExtention = $request->file('img_patrika')->getClientOriginalName();
            $img_patrikaFilename = pathinfo($img_patrikaFileNameWithExtention, PATHINFO_FILENAME);
            $img_patrikaExtention = $request->file('img_patrika')->getClientOriginalExtension();
            $img_patrikaFileNameToStore = $img_patrikaFilename . '_' . time() . '.' . $img_patrikaExtention;
            $img_patrikaPath = $request->file('img_patrika')->storeAs('public/images', $img_patrikaFileNameToStore);
        }

        if ($request->hasFile('img_2')) {
            $img_2FileNameWithExtention = $request->file('img_2')->getClientOriginalName();
            $img_2Filename = pathinfo($img_2FileNameWithExtention, PATHINFO_FILENAME);
            $img_2Extention = $request->file('img_2')->getClientOriginalExtension();
            $img_2FileNameToStore = $img_2Filename . '_' . time() . '.' . $img_2Extention;
            $img_2Path = $request->file('img_2')->storeAs('public/images', $img_2FileNameToStore);
        }

        if ($request->hasFile('img_3')) {
            $img_3FileNameWithExtention = $request->file('img_3')->getClientOriginalName();
            $img_3Filename = pathinfo($img_3FileNameWithExtention, PATHINFO_FILENAME);
            $img_3Extention = $request->file('img_3')->getClientOriginalExtension();
            $img_3FileNameToStore = $img_3Filename . '_' . time() . '.' . $img_3Extention;
            $img_3Path = $request->file('img_3')->storeAs('public/images', $img_3FileNameToStore);
        }

        $data = $request->validated();
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

        $profile = Profile::where('user_id', auth()->user()->id)->first();
        if ($profile) {
            $profile->update($data);  // update() handles mass assignment based on fillable fields
        } else {
            return redirect()->back()->with('error', 'Profile not found.');
        }

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function add_favorite(Request $request)
    {
        $favUserId = $request->favorite_id;

        $favProfile = Profile::find($favUserId);
        if (!$favProfile) {
            return redirect()->back()->with('error', 'profile does not exists');
        }

        $profile = auth()->user()->profile;
        $profile->favoriteProfiles()->attach($favProfile->id);

        return response()->json(['message' => 'added to favorites']);

        // return redirect()->back()->with('success', 'profile added to favorites successfully');
    }

    public function show_interest(Request $request)
    {
        $interestUserId = $request->interest_id;

        $interestProfile = Profile::find($interestUserId);
        if (!$interestProfile) {
            return redirect()->back()->with('error', 'profile does not exists');
        }

        $profile = auth()->user()->profile;
        $profile->interestProfiles()->attach($interestProfile->id);

        // return response()->json(['message' => 'added to interests']);

        return redirect()->back()->with('success', 'profile added to Interests successfully');
    }

    public function remove_favorite(Request $request)
    {
        $favUserId = $request->favorite_id;

        $favProfile = Profile::find($favUserId);
        if (!$favProfile) {
            return redirect()->back()->with('error', 'profile does not exists');
        }

        $profile = auth()->user()->profile;
        $profile->favoriteProfiles()->detach($favProfile->id);

        if ($request->has('fav_page')) {
            return redirect()->back()->with('success', 'profile removed from favorites successfully');
        }
        return response()->json(['message' => 'removed from favorites']);
    }

    public function view_favorite()
    {
        $users = auth()->user()->profile->favoriteProfiles()->get();

        return view('default.view.profile.view_favorites.index', ['users' => $users]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        // Check if the token exists in the password_resets table
        $reset = DB::table('password_resets')->where('email', $request->email)->where('token', $request->token)->first();

        if (!$reset) {
            return back()->withErrors(['email' => 'This password reset token is invalid.']);
        }

        // Update the user's password
        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // Optionally, you can delete the token after it's used
        DB::table('password_resets')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('status', 'Password has been reset.');
    }

    public function showImages(string $filename)
    {
        // $img_1_name = auth()->user()->profile->img_1;
        //  Log::info("this is image name ", $filename);
        Log::info('Requested image filename', ['filename' => $filename]);  // Correct usage

        $path = 'images/' . $filename;

        if (!Storage::disk('public')->exists($path)) {
            return response()->json(['error' => 'Image not found.'], 404);
        }

        $file = Storage::disk('public')->get($path);
        $type = Storage::disk('public')->mimeType($path);

        return response($file, 200)
            ->header('Content-Type', $type);
    }


   

    
}