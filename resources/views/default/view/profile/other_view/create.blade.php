<x-layout.user>
    <style>.sidebar {
        width: 300px; /* Fixed width for the sidebar */
        position: sticky;
        top: 0; /* Make the sidebar sticky at the top when scrolling */
        height: 100vh; /* Full height of the viewport */
        background-color: #f5f5f5; /* Optional background color for sidebar */
        padding: 15px;
        border-left: 1px solid #ddd; /* Optional border for separation */
    }</style>
    <div>
    <h1>{{ $user->first_name }} {{ $user->last_name }}'s Profile</h1>

    <div class="profile-details">
        @if($user->img_1)
            <img src="{{ asset('storage/images/' . $user->img_1) }}" alt="Profile Image" class="profile-image">
        @else
            <p>No photo available</p> <!-- Or use an image tag for a placeholder image -->
        @endif
    </div>
    <div class="card">
        <h3>Profile</h3>
        <div class="card-row">
            <p><strong>User ID:</strong> {{ $user->user_id }}</p>
            <p><strong>First Name:</strong> {{ $user->first_name }}</p>
            <p><strong>Middle Name:</strong> {{ $user->middle_name }}</p>
            <p><strong>Last Name:</strong> {{ $user->last_name }}</p>
        </div>
        <div class="card-row">
            <p><strong>Mother Tongue:</strong> {{ $user->mother_tongue }}</p>
            <p><strong>Native Place:</strong> {{ $user->native_place }}</p>
            <p><strong>Gender:</strong> {{ $user->gender }}</p>
            <p><strong>Marital Status:</strong> {{ $user->marital_status }}</p>
        </div>
        <div class="card-row">
            <p><strong>Living With:</strong> {{ $user->living_with }}</p>
            <p><strong>Blood Group:</strong> {{ $user->blood_group }}</p>
            <p><strong>Height:</strong> {{ $user->height }}</p>
            <p><strong>Weight:</strong> {{ $user->weight }}</p>
        </div>
        <div class="card-row">
            <p><strong>Body Type:</strong> {{ $user->body_type }}</p>
            <p><strong>Complexion:</strong> {{ $user->complexion }}</p>
            <p><strong>Physical Abnormality:</strong> {{ $user->physical_abnormality ? 'Yes' : 'No' }}</p>
            <p><strong>Spectacles:</strong> {{ $user->spectacles ? 'Yes' : 'No' }}</p>
        </div>
        <div class="card-row">
            <p><strong>Lens:</strong> {{ $user->lens ? 'Yes' : 'No' }}</p>
            <p><strong>Eating Habits:</strong> {{ $user->eating_habits }}</p>
            <p><strong>Drinking Habits:</strong> {{ $user->drinking_habits }}</p>
            <p><strong>Smoking Habits:</strong> {{ $user->smoking_habits }}</p>
        </div>
        <div class="card-row">
            <p><strong>About Self:</strong> {{ $user->about_self }}</p>
            <p><strong>Religion:</strong> {{ $user->religion }}</p>
            <p><strong>Cast:</strong> {{ $user->cast }}</p>
            <p><strong>Sub-Cast:</strong> {{ $user->sub_cast }}</p>
        </div>
        <div class="card-row">
            <p><strong>Gotra:</strong> {{ $user->gotra }}</p>
            <p><strong>Father's Name:</strong> {{ $user->father_name }}</p>
            <p><strong>Father's Occupation:</strong> {{ $user->father_occupation }}</p>
            <p><strong>Mother's Name:</strong> {{ $user->mother_name }}</p>
        </div>
        <div class="card-row">
            <p><strong>Mother's Occupation:</strong> {{ $user->mother_occupation }}</p>
            <p><strong>Date of Birth:</strong> {{ $user->date_of_birth }}</p>
            <p><strong>Highest Education:</strong> {{ $user->highest_education }}</p>
            <p><strong>Occupation:</strong> {{ $user->occupation }}</p>
        </div>
        <div class="card-row">
            <p><strong>Organization:</strong> {{ $user->organization }}</p>
            <p><strong>Designation:</strong> {{ $user->designation }}</p>
            <p><strong>Job Location:</strong> {{ $user->job_location }}</p>
            <p><strong>Job Experience:</strong> {{ $user->job_experience }}</p>
        </div>
        <div class="card-row">
            <p><strong>Income:</strong> {{ $user->income }} {{ $user->currency }}</p>
            <p><strong>Address:</strong> {{ $user->address_line_1 }}, {{ $user->city }}, {{ $user->state }}</p>
            <p><strong>Pincode:</strong> {{ $user->pincode }}</p>
            <p><strong>Mobile:</strong> {{ $user->mobile }}</p>
        </div>
        <div class="card-row">
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Partner Min Age:</strong> {{ $user->partner_min_age }}</p>
            <p><strong>Partner Max Age:</strong> {{ $user->partner_max_age }}</p>
            <p><strong>Partner Min Height:</strong> {{ $user->partner_min_height }}</p>
        </div>
        <div class="card-row">
            <p><strong>Partner Max Height:</strong> {{ $user->partner_max_height }}</p>
            <p><strong>Partner Income:</strong> {{ $user->partner_income }} {{ $user->partner_currency }}</p>
            <p><strong>Want to See Patrika:</strong> {{ $user->want_to_see_patrika ? 'Yes' : 'No' }}</p>
            <p><strong>Partner Sub-Cast:</strong> {{ $user->partner_sub_cast }}</p>
        </div>
        <div class="card-row">
            <p><strong>Partner Eating Habit:</strong> {{ $user->partner_eating_habbit }}</p>
            <p><strong>Partner City Preference:</strong> {{ $user->partner_city_preference }}</p>
            <p><strong>Partner Education:</strong> {{ $user->partner_education }}</p>
            <p><strong>Partner Education Specialization:</strong> {{ $user->partner_education_specialization }}</p>
        </div>
        <div class="card-row">
            <p><strong>Partner Job:</strong> {{ $user->partner_job }}</p>
            <p><strong>Partner Business:</strong> {{ $user->partner_business }}</p>
            <p><strong>Partner Foreign Resident:</strong> {{ $user->partner_foreign_resident ? 'Yes' : 'No' }}</p>
        </div>
    </div>
</div>
<div class="sidebar">
    <x-common.usersidebar />
</div>
</x-layout.user>
