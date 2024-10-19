<x-layout.user>

    <style>
    .card-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 20px;
}

.card {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 20px;
    width: 100%;
    max-width: 800px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.card-row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: 10px 0;
}

.card-row p {
    flex: 1 0 21%; /* Take 21% width of the container */
    margin: 5px; /* Space between fields */
    min-width: 200px; /* Ensure a minimum width */
}
.image-gallery {
    display: flex; /* Use flexbox for horizontal alignment */
    justify-content: space-around; /* Space images evenly */
    margin-bottom: 20px; /* Optional: add space below the gallery */
    gap: 15px; /* Space between images */
    flex-wrap: wrap; /* Allow images to wrap to the next line */
}

.profile-image {
    max-width: 100px; /* Set maximum width for the images */
    height: auto; /* Maintain aspect ratio */
    border-radius: 8px; /* Optional: adds rounded corners */
    border: 1px solid #ddd; /* Optional: adds a border */
    object-fit: cover; /* Maintain aspect ratio and cover the height */
    height: 150px; /* Set desired height */


}
 .sidebar {
    width: 300px; /* Fixed width for the sidebar */
    position: sticky;
    top: 0; /* Make the sidebar sticky at the top when scrolling */
    height: 100vh; /* Full height of the viewport */
    background-color: #f5f5f5; /* Optional background color for sidebar */
    padding: 15px;
    border-left: 1px solid #ddd; /* Optional border for separation */
}
.form-group {
    margin-right: 15px; /* Adjust as needed */
}
.progress {
    background-color: #f3f3f3;
    border-radius: 5px;
    height: 25px;
    width: 100%;
}

.progress-bar {
    background-color: #007bff;
    height: 100%;
    color: white;
    text-align: center;
    line-height: 25px;
}


    </style>
    
    <div class="card-container">
        <h3>Profile Images</h3>
        <div class="form-row image-gallery">
    <div class="form-group">
        @if($user->img_1)
            <img src="{{ asset('storage/images/' . $user->img_1) }}" alt="Uploaded Image" class="profile-image">
        @else
            <p>No pic display</p>
        @endif
    </div>
    <div class="form-group">
        @if($user->img_2)
            <img src="{{ asset('storage/images/' . $user->img_2) }}" alt="Uploaded Image" class="profile-image">
        @else
            <p>No pic display</p>
        @endif
    </div>
    <div class="form-group">
        @if($user->img_3)
            <img src="{{ asset('storage/images/' . $user->img_3) }}" alt="Uploaded Image" class="profile-image">
        @else
            <p>No pic display</p>
        @endif
    </div>
</div>

<div>
    <h2>Profile Completion</h2>
    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: {{ $profileCompletion }}%;" aria-valuenow="{{ $profileCompletion }}" aria-valuemin="0" aria-valuemax="100">
            {{ $profileCompletion }}%
        </div>
    </div>
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
