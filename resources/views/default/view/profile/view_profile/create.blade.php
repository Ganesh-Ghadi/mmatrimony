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
            {{-- <p>No pic display</p> --}}
        @endif
    </div>
    <div class="form-group">
        @if($user->img_2)
            <img src="{{ asset('storage/images/' . $user->img_2) }}" alt="Uploaded Image" class="profile-image">
        @else
            {{-- <p>No pic display</p> --}}
        @endif
    </div>
    <div class="form-group">
        @if($user->img_3)
            <img src="{{ asset('storage/images/' . $user->img_3) }}" alt="Uploaded Image" class="profile-image">
        @else
            {{-- <p>No pic display</p> --}}
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
</br>


        
        
        <div class="panel">
            <h3>Your Profile</h3>
            
            <div class="card">
                <h3 class="text-center">Basic Profile</h3>
                <br/>
                
                <!-- First Row: User Info -->
                <h4 class="text-center" style="border-top: 1px solid #ccc; padding-top: 10px;">Personal Information</h4>
                <div class="card-row" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
                    <p><strong>User ID:</strong> {{ $user->user_id }}</p>
                    <p><strong>Full Name:</strong> {{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</p>
                     <p><strong>Mother Tongue:</strong> {{ $user->mother_tongue }}</p>
                    <p><strong>Native Place:</strong> {{ $user->native_place }}</p>
                    <p><strong>Gender:</strong> {{ $user->gender }}</p>
                    <p><strong>Marital Status:</strong> {{ $user->marital_status }}</p>
                    <p><strong>Living With:</strong> {{ $user->living_with }}</p>

                </div>
            
                <!-- Third Row: Personal Details -->
                <h4 class="text-center" style="border-top: 1px solid #ccc; padding-top: 10px;">Health Information</h4>

                <div class="card-row" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
                    <p><strong>Blood Group:</strong> {{ $user->blood_group }}</p>
                    <p><strong>Height:</strong> {{ $user->height }}</p>
                    <p><strong>Weight:</strong> {{ $user->weight }}</p>
                    <p><strong>Body Type:</strong> {{ $user->body_type }}</p>
                    <p><strong>Complexion:</strong> {{ $user->complexion }}</p>
                    <p><strong>Physical Abnormality:</strong> {{ $user->physical_abnormality ? 'Yes' : 'No' }}</p>
                    <p><strong>Spectacles:</strong> {{ $user->spectacles ? 'Yes' : 'No' }}</p>
                    <p><strong>Lens:</strong> {{ $user->lens ? 'Yes' : 'No' }}</p>

                </div>
            
                <!-- Fifth Row: Other Habits -->
                <h4 class="text-center" style="border-top: 1px solid #ccc; padding-top: 10px;">Food Habits</h4>

                <div class="card-row" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
                    <p><strong>Eating Habits:</strong> {{ $user->eating_habits }}</p>
                    <p><strong>Drinking Habits:</strong> {{ $user->drinking_habits }}</p>
                    <p><strong>Smoking Habits:</strong> {{ $user->smoking_habits }}</p>
                </div>
            
                <!-- Sixth Row: About Self -->
                <div class="card-row" style="border-top: 1px solid #ccc; padding-top: 10px;">
                    <p><strong>About Self:</strong> {{ $user->about_self }}</p>
                </div>
            </div>
            
            <div class="card">
                <h3 class="text-center">Religious Profile</h3></br>
                <div class="card-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                    <div>
                        <p><strong>Religion:</strong>{{ $user->religion }}</p>
                    </div>
                    <div>
                        <p><strong>Caste:</strong>{{ $user->cast }}</p>
                    </div>
                    <div>
                        <p><strong>Sub-Caste:</strong>{{ $user->sub_cast }}</p>
                    </div>
                    <div>
                        <p><strong>Gotra:</strong>{{ $user->gotra }}</p>
                    </div>
                </div>
            </div>
            

         
         
            <div class="card">
                <div style="display: grid; grid-template-columns: 1fr; gap: 20px;">
                    <!-- Family Profile -->
                    <div>
                        <h4 class="text-center">Family Profile</h4>
                        <div class="card-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                            <p><strong>Father's Alive:</strong> {{ $user->father_is_alive ? 'Yes' : 'No' }}</p>
                            <p><strong>Father's Name:</strong> {{ $user->father_name }}</p>
                            <p><strong>Father's Occupation:</strong> {{ $user->father_occupation }}</p>
                            <p><strong>Father's Job Type:</strong> {{ $user->father_job_type }}</p>
                            <p><strong>Father's Organization:</strong> {{ $user->father_organization }}</p>
                            <p><strong>Mother's Alive:</strong> {{ $user->mother_is_alive ? 'Yes' : 'No' }}</p>
                            <p><strong>Mother's Name:</strong> {{ $user->mother_name }}</p>
                            <p><strong>Mother's Occupation:</strong> {{ $user->mother_occupation }}</p>
                            <p><strong>Mother's Job Type:</strong> {{ $user->mother_job_type }}</p>
                            <p><strong>Mother's Organization:</strong> {{ $user->mother_organization }}</p>
                        </div>
                    </div>
            
                    <!-- Brother Details -->
                    <div>
                        <h4 class="text-center" style="border-top: 1px solid #ccc; padding-top: 10px;">Brother Details</h4>
                        <div class="card-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                            <p><strong>Resident Place:</strong> {{ $user->brother_resident_place }}</p>
                            <p><strong>Married:</strong> {{ $user->brother_is_alive ?? 0 }} {{ ($user->brother_is_alive ?? 0) == 1 ? 'brother' : 'brothers' }}</p>
                            <p><strong>Unmarried:</strong> {{ $user->brother_is_alive ?? 0 }} {{ ($user->brother_is_alive ?? 0) == 1 ? 'brother' : 'brothers' }}</p>
                                </div>
                    </div>
            
                    <!-- Sister Details -->
                    <div>
                        <h4 class="text-center" style="border-top: 1px solid #ccc; padding-top: 10px;">Sister Details</h4>
                        <div class="card-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                            <p><strong>Resident Place:</strong> {{ $user->sister_resident_place }}</p>
                            <p><strong>Married:</strong> {{ $user->number_of_sisters_married ?? 0 }} {{ ($user->number_of_sisters_married ?? 0) == 1 ? 'sister' : 'sisters' }}</p>
                            <p><strong>Unmarried:</strong> {{ $user->number_of_sisters_unmarried ?? 0 }} {{ ($user->number_of_sisters_unmarried ?? 0) == 1 ? 'sister' : 'sisters' }}</p>
                            
                        </div>
                    </div>
                    
            
                    <!-- About Parents -->
                    <div>
                        <div class="card-row" style="border-top: 1px solid #ccc; padding-top: 10px;">
                            <p><strong>About Parents:</strong> {{ $user->about_parents }}</p>
                        </div>
                    </div>
                </div>
            </div>
            

        <div class="card">   
            <h3 center class="text-center">Educational Profile</h3> 
          <div class="card-row">
                <p><strong>Highest Education:</strong> {{ $user->highest_education }}</p>
                <p><strong>Education in Detail:</strong> {{ $user->education_in_detail }}</p>
                <p><strong>Additional Degree:</strong> {{ $user->additional_degree }}</p>
        </div>
    </div>
    <div class="card">
        <!-- Organisation Information Section -->
        <div>
            <h4 class="text-center">Organisation Information</h4>
            <div class="card-row" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
                <p><strong>Occupation:</strong> {{ $user->occupation }}</p>
                <p><strong>Organization:</strong> {{ $user->organization }}</p>
                <p><strong>Designation:</strong> {{ $user->designation }}</p>
                <p><strong>Job Location:</strong> {{ $user->job_location }}</p>
            </div>
        </div>
    
        <!-- Experience/Income Section -->
        <div>
            <h4 class="text-center"  style="border-top: 1px solid #ccc; padding-top: 10px;">Experience/Income</h4>
            <div class="card-row" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
                <p><strong>Job Experience:</strong> {{ $user->job_experience }}</p>
                <p><strong>Income:</strong> {{ $user->income }} {{ $user->currency }}</p>
            </div>
        </div> 
    </div>
    
    <div class="card">
        <!-- Location Information Section -->
        <div>
            <h4 class="text-center">Location Information</h4>
            <div class="card-row" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
                <p><strong>Country:</strong> {{ $user->country }}</p>
                <p><strong>State:</strong> {{ $user->state }}</p>
                <p><strong>City:</strong> {{ $user->city }}</p>
            </div>
        </div>
    
        <!-- Address / Contact Information Section -->
        <div>
            <h4 class="text-center"  style="border-top: 1px solid #ccc; padding-top: 10px;">Address / Contact Information</h4>
            <div class="card-row" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
                <p><strong>Address:</strong> {{ $user->address_line_1 }}, {{ $user->address_line_2 }}</p>
                <p><strong>Landmark:</strong> {{ $user->landmark }}</p>
                <p><strong>Pincode:</strong> {{ $user->pincode }}</p>
                <p><strong>Mobile:</strong> {{ $user->mobile }}</p>
                <p><strong>Landline:</strong> {{ $user->landline }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
            </div>
        </div>
    </div>
    
    <div class="card">
        <!-- About Life Partner Profile Section -->
        <div>
            <h4 class="text-center">About Life Partner Profile</h4>
            <div class="card-row" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
                <p><strong>Partner Min Age:</strong> {{ $user->partner_min_age }}</p>
                <p><strong>Partner Max Age:</strong> {{ $user->partner_max_age }}</p>
                <p><strong>Partner Min Height:</strong> {{ $user->partner_min_height }}</p>
                <p><strong>Partner Max Height:</strong> {{ $user->partner_max_height }}</p>
            </div>
        </div>
    
        <!-- Expected Information About Partners Section -->
        <div>
            <h4 class="text-center" style="border-top: 1px solid #ccc; padding-top: 10px;">Expected Information About Partners</h4>
            <div class="card-row" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
                <p><strong>Partner Income:</strong> {{ $user->partner_income }} {{ $user->partner_currency }}</p>
                <p><strong>Partner Currency:</strong> {{ $user->partner_currency }}</p>
                <p><strong>Want to See Patrika:</strong> {{ $user->want_to_see_patrika ? 'Yes' : 'No' }}</p>
                <p><strong>Partner Sub-Cast:</strong> {{ $user->partner_sub_cast }}</p>
                <p><strong>Partner Eating Habit:</strong> {{ $user->partner_eating_habbit }}</p>
                <p><strong>Partner City Preference:</strong> {{ $user->partner_city_preference }}</p>
                <p><strong>Partner Education:</strong> {{ $user->partner_education }}</p>
                <p><strong>Partner Job:</strong> {{ $user->partner_job }}</p>
                <p><strong>Partner Business:</strong> {{ $user->partner_business }}</p>
                <p><strong>Partner Foreign Resident:</strong> {{ $user->partner_foreign_resident ? 'Yes' : 'No' }}</p>
            </div>
        </div>
    </div>
    
         
            
           
            
            
            
           
        </div>
    </div>

    <div class="sidebar">
        <x-common.usersidebar />
    </div>
     
    
    
    
    
    
</x-layout.user>
