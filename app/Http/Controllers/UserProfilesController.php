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

        // Fetch users from the database
        $users = $users->get();

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
            $users = $users->shuffle()->take(10);
            foreach ($users as $user) {
                $user->is_favorited = auth()->user()->profile->favoriteProfiles()->where('favorite_profile_id', $user->id)->exists();
            }
        }

        // Return the filtered users to the view
        return view('default.view.profile.search.create', ['users' => $users]);
    }

    public function view_profile()
    {
        $profiles = Profile::all();
        $user = auth()->user()->profile()->first();
        $profileCompletion = $this->calculateProfileCompletion($user);
        return view('default.view.profile.view_profile.create', ['user' => $user, 'profiles' => $profiles, 'profileCompletion' => $profileCompletion]);
    }

    public function basic_details()
    {
        $user = auth()->user()->profile()->first();
        $profileCompletion = $this->calculateProfileCompletion($user);
        return view('default.view.profile.basic_details.index', ['user' => $user, 'profileCompletion' => $profileCompletion]);
    }

    public function religious_details()
    {
        $user = auth()->user()->profile()->first();
        $castes = Caste::all();
        $subCastes = SubCaste::all();
        $profileCompletion = $this->calculateProfileCompletion($user);
        return view('default.view.profile.religious_details.create', ['user' => $user, 'castes' => $castes, 'subCastes' => $subCastes, 'profileCompletion' => $profileCompletion]);
    }

    public function family_details()
    {
        $user = auth()->user()->profile()->first();
        $profileCompletion = $this->calculateProfileCompletion($user);
        return view('default.view.profile.family_details.create', ['user' => $user, 'profileCompletion' => $profileCompletion]);
    }

    public function astronomy_details()
    {
        $user = auth()->user()->profile()->first();
        $profileCompletion = $this->calculateProfileCompletion($user);
        return view('default.view.profile.astronomy_details.create', ['user' => $user, 'profileCompletion' => $profileCompletion]);
    }

    public function educational_details()
    {
        $user = auth()->user()->profile()->first();
        $profileCompletion = $this->calculateProfileCompletion($user);
        return view('default.view.profile.educational_details.create', ['user' => $user, 'profileCompletion' => $profileCompletion]);
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



   public function add_favorite(Request $request){
     
       $favUserId = $request->favorite_id;
         
       $favProfile = Profile::find($favUserId);
       if(!$favProfile){
          return redirect()->back()->with('error', 'profile does not exists');
       }
       
       $profile = auth()->user()->profile;
       $profile->favoriteProfiles()->attach($favProfile->id);
        
       return redirect()->back()->with('success', 'profile added to favorites successfully');
   }

   
   public function remove_favorite(Request $request){
     
    $favUserId = $request->favorite_id;
      
    $favProfile = Profile::find($favUserId);
    if(!$favProfile){
       return redirect()->back()->with('error', 'profile does not exists');
    }
    
    $profile = auth()->user()->profile;
    $profile->favoriteProfiles()->detach($favProfile->id);
     
    return redirect()->back()->with('success', 'profile removed from favorites successfully');
}

    
}