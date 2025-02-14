<x-layout.user_banner>

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

button.btn {
    background-color: #ff0000; /* Rose Red color */
    color: white !important; /* Ensure text color is white */
    border: none; /* Optional: remove border */
}

    </style>
    
    <div class="card-container">
        <h3>Profile Images</h3>
        <div class="form-row image-gallery">
     <div class="form-group">
        @if($user->img_1)
        <div x-data="imageLoader()" x-init="fetchImage('{{ $user->img_1 }}')">
            <template x-if="imageUrl">
                <img class="profile-image" :src="imageUrl" alt="Uploaded Image" />
            </template>
            <template x-if="!imageUrl">
                {{-- <p>Loading image...</p> --}}
            </template>
        </div>
            {{-- <img src="{{ asset('storage/images/' . $user->img_1) }}" alt="Uploaded Image" class="profile-image"> --}}
        @else
            {{-- <p>No pic display</p> --}}
        @endif
     </div>
     <div class="form-group">
        @if($user->img_2)
        <div x-data="imageLoader()" x-init="fetchImage('{{ $user->img_2 }}')">
            <template x-if="imageUrl">
                <img class="profile-image" :src="imageUrl" alt="Uploaded Image" />
            </template>
            <template x-if="!imageUrl">
                {{-- <p>Loading image...</p> --}}
            </template>
        </div>
            {{-- <img src="{{ asset('storage/images/' . $user->img_2) }}" alt="Uploaded Image" class="profile-image"> --}}
        @else
            {{-- <p>No pic display</p> --}}
        @endif
      </div>
    <div class="form-group">
        @if($user->img_3)
        <div x-data="imageLoader()" x-init="fetchImage('{{ $user->img_3 }}')">
            <template x-if="imageUrl">
                <img class="profile-image" :src="imageUrl" alt="Uploaded Image" />
            </template>
            <template x-if="!imageUrl">
                {{-- <p>Loading image...</p> --}}
            </template>
        </div>
            {{-- <img src="{{ asset('storage/images/' . $user->img_3) }}" alt="Uploaded Image" class="profile-image"> --}}
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
                <h3 class="text-center" style="color: #FF3846;">Basic Profile</h3>
                <br/>
                <!-- First Row: User Info -->
                <h4 class="text-center" style="border-top: 1px solid #ccc; padding-top: 10px;">Personal Information</h4>
                <div class="card-row" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
                    <p><strong>User ID:</strong> {{ $user->user_id }}</p>
                    <p><strong>Full Name:</strong> {{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</p>
                    <p><strong>Mother Tongue:</strong> {{ ucfirst($user->mother_tongue) }}</p>
                    <p><strong>Native Place:</strong> {{ ucfirst($user->native_place) }}</p>
                    <p><strong>Gender:</strong> {{ ucfirst($user->gender) }}</p>
                    <p><strong>Marital Status:</strong> {{  ucfirst($user->marital_status) }}</p>
                    <p><strong>Living With:</strong> {{ ucfirst($user->living_with) }}</p>

                </div>
                <!-- Third Row: Personal Details -->
                <h4 class="text-center" style="border-top: 1px solid #ccc; padding-top: 10px;">Health Information</h4>
                <div class="card-row" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
                    <p><strong>Blood Group:</strong> {{ ucfirst($user->blood_group) }}</p>
                    <p><strong>Height:</strong> {{ ucfirst($user->height) }}</p>
                    <p><strong>Weight:</strong> {{ ucfirst($user->weight) }}</p>
                    <p><strong>Body Type:</strong> {{ ucfirst($user->body_type) }}</p>
                    <p><strong>Complexion:</strong> {{ ucfirst($user->complexion) }}</p>
                    <p><strong>Physical Abnormality:</strong> {{ ucfirst($user->physical_abnormality) ? 'Yes' : 'No' }}</p>
                    <p><strong>Spectacles:</strong> {{ ucfirst($user->spectacles) ? 'Yes' : 'No' }}</p>
                    <p><strong>Lens:</strong> {{ ucfirst($user->lens) ? 'Yes' : 'No' }}</p>
                 </div>
                <!-- Fifth Row: Other Habits -->
                <h4 class="text-center" style="border-top: 1px solid #ccc; padding-top: 10px;">Food Habits</h4>
                <div class="card-row" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
                    <p><strong>Eating Habits:</strong> {{ ucfirst($user->eating_habits) }}</p>
                    <p><strong>Drinking Habits:</strong> {{ ucfirst($user->drinking_habits) }}</p>
                    <p><strong>Smoking Habits:</strong> {{ ucfirst($user->smoking_habits) }}</p>
                    
                </div>
                <!-- Sixth Row: About Self -->
                <div class="card-row" style="border-top: 1px solid #ccc; padding-top: 10px;">
                    <p><strong>About Self:</strong> {{ ucfirst($user->about_self) }}</p>
                </div>
            </div>
            <div class="card">
                <h3 class="text-center" style="color: #FF3846;">Religious Profile</h3></br>
                <div class="card-row" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px;">
                    <div>
                        <p><strong>Religion:</strong> {{ ucfirst($user->religion) }}</p>
                    </div>
                    <div>
                        <p><strong>Caste:</strong> {{ ucfirst($castes) }}</p>
                    </div>
                    <div>
                        <p><strong>Gotra:</strong> {{ ucfirst($user->gotra) }}</p>
                    </div>
                </div>
                
            </div>
            <div class="card">
                <div style="display: grid; grid-template-columns: 1fr; gap: 20px;">
                    <!-- Family Profile -->
                    <div>
                        <h3 center class="text-center"   style="color: #FF3846;">Family Details</h3> 

                        <h5 class="text-center" style="border-top: 1px solid #ccc; padding-top: 10px;">Father and Mother Details</h5>
                        <div class="card-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                            <p><strong>Father's Alive:</strong>
                                @if($user->father_is_alive)
                                    <span >Yes</span>
                                @else
                                    <span >No</span>
                                    
                                @endif
                            </p>
                             <p><strong>Father's Name:</strong> {{ ucfirst($user->father_name) }}</p>
                            <p><strong>Father's Occupation:</strong> {{ ucfirst($user->father_occupation) }}</p>
                            <p><strong>Father's Job Type:</strong> {{ ucfirst($user->father_job_type) }}</p>
                             <p><strong>Father's Organization:</strong> {{ ucfirst($user->father_organization) }}</p>
                            <p><strong>Mother's Alive:</strong> 
                                @if($user->mother_is_alive === null)
                                    <span></span> 
                                @elseif($user->mother_is_alive)
                                    <span>Yes</span>
                                @else
                                    <span>No</span>
                                @endif
                            </p>
                            
                            <p><strong>Mother's Name:</strong> {{ ucfirst($user->mother_name) }}</p>
                            <p><strong>Mother's Occupation:</strong> {{ ucfirst($user->mother_occupation) }}</p>
                            <p><strong>Mother's Job Type:</strong> {{ ucfirst($user->mother_job_type) }}</p>
                            <p><strong>Mother's Organization:</strong> {{ ucfirst($user->mother_organization) }}</p>
                            <p><strong>Mother's Native Place:</strong> {{ ucfirst($user->mother_native_place) }}</p>
                            <p><strong>Mother's Name Before Marriage:</strong> {{ ucfirst($user->mother_name_before_marriage) }}</p>
                             
                        </div>
                    </div>
                    <!-- Brother Details -->
                    <div>
                        <h5 class="text-center" style="border-top: 1px solid #ccc; padding-top: 10px;">Brother Details</h5>
                        <div class="card-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                            <p><strong>Resident Place:</strong> {{  ucfirst($user->brother_resident_place) }}</p>
                            <p><strong>Married:</strong> {{ $user->brother_is_alive ?? 0 }} {{ ($user->brother_is_alive ?? 0) == 1 ? 'brother' : 'brothers' }}</p>
                            <p><strong>Unmarried:</strong> {{ $user->brother_is_alive ?? 0 }} {{ ($user->brother_is_alive ?? 0) == 1 ? 'brother' : 'brothers' }}</p>
                                </div>
                    </div>
                    <!-- Sister Details -->
                    <div>
                        <h5 class="text-center" style="border-top: 1px solid #ccc; padding-top: 10px;">Sister Details</h5>
                        <div class="card-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                            <p><strong>Resident Place:</strong> {{ ucfirst($user->sister_resident_place) }}</p>
                            <p><strong>Married:</strong> {{ $user->number_of_sisters_married ?? 0 }} {{ ($user->number_of_sisters_married ?? 0) == 1 ? 'sister' : 'sisters' }}</p>
                            <p><strong>Unmarried:</strong> {{ $user->number_of_sisters_unmarried ?? 0 }} {{ ($user->number_of_sisters_unmarried ?? 0) == 1 ? 'sister' : 'sisters' }}</p>
                            
                        </div>
                    </div>
                    
            
                    <!-- About Parents -->
                    <div>
                        <div class="card-row" style="border-top: 1px solid #ccc; padding-top: 10px;">
                            <p><strong>About Parents:</strong> {{ ucfirst($user->about_parents) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            

        <div class="card">   
            <h3 center class="text-center" style="color: #FF3846;">Educational Profile</h3> 
          <div style="border-top: 1px solid #ccc; padding-top: 10px;" class="card-row">
                <p><strong>Highest Education:</strong> {{ ucfirst($user->highest_education) }}</p>
                <p><strong>Other Education:</strong> {{ ucfirst($user->other_education) }}</p>
                <p><strong>Education in Detail:</strong> {{ ucfirst($user->education_in_detail) }}</p>
                <p><strong>Additional Degree:</strong> {{ ucfirst($user->additional_degree) }}</p>
                 
        </div>
    </div>
    <div class="card">
        <!-- Organisation Information Section -->
        <div>
            <h4 class="text-center" style="color: #FF3846;" >Occupation Details</h4>

            <h5 class="text-center" style="border-top: 1px solid #ccc; padding-top: 10px;">Organisation Information</h5>
            <div class="card-row" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
                <p><strong>Occupation:</strong> {{ ucfirst($user->occupation) }}</p>
                <p><strong>Organization:</strong> {{ ucfirst($user->organization) }}</p>
                <p><strong>Designation:</strong> {{ ucfirst($user->designation) }}</p>
                <p><strong>Job Location:</strong> {{ ucfirst($user->job_location) }}</p>
              
            </div>
        </div>
    
        <!-- Experience/Income Section -->
        <div>
            <h5 class="text-center"  style="border-top: 1px solid #ccc; padding-top: 10px;">Experience/Income</h5>
            <div class="card-row" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
                <p><strong>Job Experience:</strong> {{ ucfirst($user->job_experience) }}</p>
                <p><strong>Income:</strong> {{ ucfirst($user->income) }} {{ ucfirst($user->currency) }}</p>
             </div>
        </div> 
    </div>
    
    <div class="card">
        <!-- Location Information Section -->
        <div>
            <h4 class="text-center" style="color: #FF3846;" >Contact Details</h4>

            <h5 class="text-center" style="border-top: 1px solid #ccc; padding-top: 10px;">Location Information</h5>
            <div class="card-row" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
                <p><strong>Country:</strong> {{ ucfirst($user->country) }}</p>
                <p><strong>State:</strong> {{ ucfirst($user->state) }}</p>
                <p><strong>City:</strong> {{ ucfirst($user->city) }}</p>
                
            </div>
        </div>
    
        <!-- Address / Contact Information Section -->
        <div>
            <h5 class="text-center"  style="border-top: 1px solid #ccc; padding-top: 10px;">Address / Contact Information</h5>
            <div class="card-row" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
                <p><strong>Address:</strong> {{ ucfirst($user->address_line_1) }}, {{ ucfirst($user->address_line_2) }}</p>
                <p><strong>Landmark:</strong> {{ ucfirst($user->landmark) }}</p>
                <p><strong>Pincode:</strong> {{ ucfirst($user->pincode) }}</p>
                <p><strong>Mobile:</strong> {{ ucfirst($user->mobile) }}</p>
                <p><strong>Landline:</strong> {{ ucfirst($user->landline) }}</p>
                <p><strong>Email:</strong> {{ ucfirst($user->email) }}</p>
                
            </div>
        </div>
    </div>
    
    <div class="card">
        <!-- About Life Partner Profile Section -->
        <div>
            <h4 class="text-center" style="color: #FF3846;" >About Life Partner Profile</h4>
            <h5 class="text-center" style="border-top: 1px solid #ccc; padding-top: 10px;">Age / Height Information</h5>
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
                <p><strong>Partner Income:</strong> {{ ucfirst($user->partner_income) }} {{ ucfirst($user->partner_currency) }}</p>
                 <p><strong>Want to See Patrika:</strong> {{ ucfirst($user->want_to_see_patrika) ? 'Yes' : 'No' }}</p>
                {{-- <p><strong>Partner Sub-Cast:</strong> {{ ucfirst($user->partner_sub_cast) }}</p> --}}
                <p><strong>Partner Eating Habit:</strong> {{ ucfirst($user->partner_eating_habbit) }}</p>
                <p><strong>Partner City Preference:</strong> {{ ucfirst($user->partner_city_preference) }}</p>
                <p><strong>Partner Education:</strong> {{ ucfirst($user->partner_education) }}</p>
                <p><strong>Partner Job:</strong> {{ ucfirst($user->partner_job) }}</p>
                <p><strong>Partner Business:</strong> {{ ucfirst($user->partner_business) }}</p>
                <p><strong>Partner Foreign Resident:</strong> {{ ucfirst($user->partner_foreign_resident) ? 'Yes' : 'No' }}</p>
               
            </div>
        </div>
    </div>     
      </div>
    </div>

    <div class="sidebar">
        <x-common.usersidebar />
    </div>
     
      {{-- image display --}}
      <script>
        function imageLoader() {
            return {
                imageUrl: null,
        
                async fetchImage(filename) {
                    try {
                        const response = await fetch(`/api/images/${filename}`);
                        if (!response.ok) throw new Error('Image not found');
                        
                        // Create a blob URL for the image
                        const blob = await response.blob();
                        this.imageUrl = URL.createObjectURL(blob);
                    } catch (error) {
                        console.error('Error fetching image:', error);
                        this.imageUrl = null; // Handle error case
                    }
                }
            };
        }
       
        </script>
    
    
    
    
</x-layout.user_banner>
