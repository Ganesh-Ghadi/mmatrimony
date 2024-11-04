<x-layout.user>
   
   
          <style>
            .panel {
                border: 1px solid #ddd;
                padding: 20px;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                max-width: 900px; /* Optional: Limit the width of the card */
                margin: 20px auto; /* Center the card on the page */
            }
            .panel h2 {
                margin-bottom: 15px;
                text-align: center;
                color: #333;
            }
            .form-row {
                display: flex;
                justify-content: space-between;
                gap: 20px; /* Space between input boxes */
                margin-bottom: 10px;
            }
            .form-group {
                flex: 1; /* Make each input field take up equal space */
             }
            .form-group label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
                color: #555;
            }
            .form-group input, .form-group select, .form-group textarea {
                width: 100%;
                padding: 8px;
                box-sizing: border-box;
                border: 1px solid #ccc;
                border-radius: 4px;
                background-color: #f7f7f7;
            }
            .form-group textarea {
                height: 100px; /* Adjust height for the textarea */
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
 /* Decrease width by 20% */
 .profile-completion {
        width: 80%; /* 100% - 20% */
        margin: 0 auto; /* Center the container */

    }
    .progress {
        height: 30px; /* Set the width to 100% */
    }
           
        </style>
    </head>
    <body>

        <form action="{{ route('profiles.store') }}" method="POST">
            @csrf
    
  
        <div class="l">
            <div class="profile-completion">
                <h2>Profile Completion</h2>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" 
                         style="width: {{ $profileCompletion }}%;" 
                         aria-valuenow="{{ $profileCompletion }}" 
                         aria-valuemin="0" 
                         aria-valuemax="100">
                        {{ $profileCompletion }}%
                    </div>
                </div>
            </div>
<div class="panel">
    <h2>Educational Profile</h2>
        <div class="container mt-3" id="dropdowns">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="highest_education">Highest Education</label>
                        <select name="highest_education" class="form-input" id="highest_education">
                            <option value="" selected>Select an option</option>
                            @foreach (config('data.highest_education', []) as $category => $options)
                                <optgroup label="{{ ucwords(str_replace('_', ' ', $category)) }}">
                                    @foreach ($options as $value => $name)
                                        @if(is_array($name))
                                            @foreach ($name as $subValue => $subName)
                                                <option value="{{ $subValue }}" {{ ($user->highest_education === $subValue) ? 'selected' : '' }}>
                                                    {{ $subName }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="{{ $value }}" {{ ($user->highest_education === $value) ? 'selected' : '' }}>
                                                {{ $name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                        @if ($errors->has('highest_education'))
                        <span class="text-danger small">{{ $errors->first('highest_education') }}</span>
                        @endif  
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="education_in_detail">Education in Detail</label> 
                      <input type="text" name="education_in_detail" value="{{$user->education_in_detail}}" id="education_in_detail" placeholder="Enter education in detail" >
                      @if ($errors->has('education_in_detail'))
                      <span class="text-danger small">{{ $errors->first('education_in_detail') }}</span>
                      @endif  
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="additional_degree">Additional Degree</label> 
                      <input type="text" name="additional_degree" value="{{$user->additional_degree}}" id="additional_degree" placeholder="Enter education in detail" >
                      @if ($errors->has('additional_degree'))
                      <span class="text-danger small">{{ $errors->first('additional_degree') }}</span>
                      @endif  
                    </div>
                   
                </div>
                
            </div><div class=""></div>
        </div>
        
    </div>
    <div class="text-end">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
    </div>
</form>

    <div class="sidebar">
        <x-common.usersidebar />
    </div>
    
     
 
 
    
    </body>
    </html>

{{-- end --}}
</x-layout.user>
