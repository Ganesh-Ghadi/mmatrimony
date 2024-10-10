<x-layout.admin>
    <div>
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="{{ route('user_profiles.index') }}" class="text-primary hover:underline">Profile Details</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Add</span>
            </li>
        </ul>
        <div class="pt-5">        
            <form class="space-y-5" action="{{ route('castes.store') }}" method="POST">
                @csrf
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Personal Information</h5>
                    </div>               
                    <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-3">     
                        <x-text-input name="first_name" class="bg-gray-200" value="{{ $profile->first_name }}" :label="__('first Name')" :require="true" :disabled="true" :messages="$errors->get('first_name')"/>   
                        <x-text-input name="middle_name" class="bg-gray-200" value="{{ $profile->middle_name }}" :label="__('middle Name')" :require="true" :disabled="true" :messages="$errors->get('middle_name')"/>                       
                        <x-text-input name="last_name" class="bg-gray-200" value="{{ $profile->last_name }}" :label="__('last Name')" :require="true" :disabled="true" :messages="$errors->get('last_name')"/>                                           
                    </div>
                    <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-3">     
                            <div>
                                <label>Mother Tongue</label>
                                <select class="form-input" name="mother_tongue" x-model="mother_tongue" id="mother_tongue">
                                   <option value="" selected>select an option</option>
                                    {{-- @foreach ($gaf_code as $id => $code)
                                        <option value="{{$id}}">{{ $code }}</option>
                                    @endforeach --}}
                                    <option value="marathi">marathi</option>
                                    <option value="hindi">hindi</option>
                                    <option value="english">english</option>
                                </select> 
                                <x-input-error :messages="$errors->get('mother_tongue')" class="mt-2" /> 
                            </div> 
                        <x-text-input name="native_place" value="{{ old('native_place') }}" :label="__('Native Place')" :require="false" :messages="$errors->get('native_place')"/>                       
                        <x-text-input name="gender" class="bg-gray-200" value="{{$profile->gender}}" :label="__('Gender')" :require="true" :messages="$errors->get('gender')" :disabled="true"/>                                           
                    </div>
                    <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-3">     
                        <div>
                            <label>Marital Status <span class="text-red-500">*</span></label>
                            <select class="form-input" name="marital_status" x-model="marital_status" id="marital_status">
                               <option value="" selected>select an option</option>
                                {{-- @foreach ($gaf_code as $id => $code)
                                    <option value="{{$id}}">{{ $code }}</option>
                                @endforeach --}}
                                <option value="divorced">Divorced</option>
                                <option value="never married">Never Married</option>
                                <option value="seperated">Seperated</option>
                            </select> 
                            <x-input-error :messages="$errors->get('mother_tongue')" class="mt-2" /> 
                        </div>                         
                            <div>
                                <label>Living With <span class="text-red-500">*</span></label>
                                <select class="form-input" name="living_with" x-model="living_with" id="living_with">
                                   <option value="" selected>select an option</option>
                                    {{-- @foreach ($gaf_code as $id => $code)
                                        <option value="{{$id}}">{{ $code }}</option>
                                    @endforeach --}}
                                    <option value="family">Family</option>
                                    <option value="individual">Individual</option>
                                </select> 
                                <x-input-error :messages="$errors->get('mother_tongue')" class="mt-2" /> 
                            </div>  
                       </div>
                   
                </div>               
        </div>


        <div class="pt-5">        
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Health Information</h5>
                    </div>               
                    <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-3">  
                        <div>
                            <label>Blood Group <span class="text-red-500">*</span></label>
                            <select class="form-input" name="blood_group" x-model="blood_group" id="blood_group">
                               <option value="" selected>select an option</option>
                                <option value="A+">A+</option>
                                <option value="B+">B+</option>
                                <option value="C+">C+</option>
                            </select> 
                            <x-input-error :messages="$errors->get('blood_group')" class="mt-2" /> 
                        </div> 
                        <div>
                            <label>Height <span class="text-red-500">*</span></label>
                            <select class="form-input" name="height" x-model="height" id="height">
                               <option value="" selected>select an option</option>
                                {{-- @foreach ($gaf_code as $id => $code)
                                    <option value="{{$id}}">{{ $code }}</option>
                                @endforeach --}}
                                <option value="6'1">6'1</option>
                                <option value="4'1">4'1</option>
                                <option value="5'1">5'1</option>
                            </select> 
                            <x-input-error :messages="$errors->get('height')" class="mt-2" /> 
                        </div>    
                        <x-text-input name="weight" value="" :label="__('Weight')" :require="false"  :messages="$errors->get('weight')"/>   
                    </div>
                    <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-3">     
                            <div>
                                <label>Body Type <span class="text-red-500">*</span></label>
                                <select class="form-input" name="body_type" x-model="body_type" id="body_type">
                                   <option value="" selected>select an option</option>
                                    {{-- @foreach ($gaf_code as $id => $code)
                                        <option value="{{$id}}">{{ $code }}</option>
                                    @endforeach --}}
                                    <option value="slim">Slim</option>
                                    <option value="average">Average</option>
                                    <option value="heavey">Heavey</option>
                                </select> 
                                <x-input-error :messages="$errors->get('body_type')" class="mt-2" /> 
                            </div> 
                            <div>
                                <label>Complexion <span class="text-red-500">*</span></label>
                                <select class="form-input" name="complexion" x-model="complexion" id="complexion">
                                   <option value="" selected>select an option</option>
                                    <option value="white">white</option>
                                    <option value="brown">brown</option>
                                    <option value="dark">dark</option>
                                </select> 
                                <x-input-error :messages="$errors->get('complexion')" class="mt-2" /> 
                            </div> 
                            <div>
                                <label>Physical Abnormality <span class="text-red-500">*</span></label>
                                <select class="form-input" name="physical_abnormality" x-model="physical_abnormality" id="physical_abnormality">
                                   <option value="" selected>select an option</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select> 
                                <x-input-error :messages="$errors->get('physical_abnormality')" class="mt-2" /> 
                            </div> 
                    </div>
                    <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-3">     
                      <div class="flex items-center">
                        <input type="checkbox" name="spectacles" id="spectacles" class="form-checkbox text-primary rounded border-gray-300 focus:ring-primary">
                        <label for="checkbox" class="ml-2">Spectacles</label>
                      </div>  
                      <div class="flex items-center">
                        <input type="checkbox" name="lens" id="lens" class="form-checkbox text-primary rounded border-gray-300 focus:ring-primary">
                        <label for="checkbox" class="ml-2">Lens</label>
                      </div>                     
                 </div>
                </div>            
        </div>

        <div class="pt-5">        
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Food Habits</h5>
                </div>               
                <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-3">  
                    <div>
                        <label>Eating Habits</label>
                        <select class="form-input" name="eating_habits" x-model="eating_habits" id="eating_habits">
                           <option value="" selected>select an option</option>
                            <option value="veg">Veg</option>
                            <option value="non-veg">Non-Veg</option>
                            <option value="both">Both</option>
                        </select> 
                        <x-input-error :messages="$errors->get('eating_habits')" class="mt-2" /> 
                    </div> 
                    <div>
                        <label>Drinking Habits</label>
                        <select class="form-input" name="drinking_habits" x-model="drinking_habits" id="drinking_habits">
                           <option value="" selected>select an option</option>
                            <option value="yes">Yes</option>
                            <option value="no">no</option>
                        </select> 
                        <x-input-error :messages="$errors->get('drinking_habits')" class="mt-2" /> 
                    </div>    
                    <div>
                        <label>Smoking Habits</label>
                        <select class="form-input" name="smoking_habits" x-model="smoking_habits" id="smoking_habits">
                           <option value="" selected>select an option</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select> 
                        <x-input-error :messages="$errors->get('smoking_habits')" class="mt-2" /> 
                    </div> 
                </div>    
             </div>
            </div>     
            
            <div class="pt-5">        
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">About Self</h5>
                    </div>               
                    <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-3">  
                        <div>
                            <label for="about_self">About Myself:</label>
                            <textarea 
                                id="description" 
                                class="mt-1 block w-full h-32 p-2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                            ></textarea>
                            <x-input-error :messages="$errors->get('about_self')" class="mt-2" /> 
                        </div> 
                    </div>    
                 </div>
                </div>  

                <div class="pt-5">        
                    <div class="panel">
                        <div class="flex items-center justify-between mb-5">
                            <h5 class="font-semibold text-lg dark:text-white-light">Upload Photo</h5>
                        </div>               
                        <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-3">  
                            <div>
                                <label for="file-upload" class="block text-sm font-medium text-gray-700">
                                    Upload File:
                                </label>
                            
                                <input 
                                    type="file" 
                                    id="file-upload" 
                                    class="mt-1 block w-full text-sm text-gray-500 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" 
                                >
                            </div>
                            <div>
                                <label for="file-upload" class="block text-sm font-medium text-gray-700">
                                    Upload File:
                                </label>
                            
                                <input 
                                    type="file" 
                                    id="file-upload" 
                                    class="mt-1 block w-full text-sm text-gray-500 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" 
                                >
                            </div>
                            <div>
                                <label for="file-upload" class="block text-sm font-medium text-gray-700">
                                    Upload File:
                                </label>
                            
                                <input 
                                    type="file" 
                                    id="file-upload" 
                                    class="mt-1 block w-full text-sm text-gray-500 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" 
                                >
                            </div>
                        </div>    
                     </div>
                      
                    </div>  
                    <div class="pt-5" x-data="{ religion: '', castes: '', subcastes: '', gotra: '' }">        
                        <div class="panel">
                            <div class="flex items-center justify-between mb-5">
                                <h5 class="font-semibold text-lg dark:text-white-light">Religious Information</h5>
                            </div>               
                            <div class="grid grid-cols-2 gap-4 mb-4 md:grid-cols-3">  
                                <div>
                                    <label>Religion</label>
                                    <select class="form-input" name="religion" x-model="religion" id="religion">
                                        <option value="" selected>select an option</option>
                                        <option value="hindu">Hindu</option>
                                    </select> 
                                    <x-input-error :messages="$errors->get('religion')" class="mt-2" /> 
                                </div> 
                                
                                
                                <template x-if="religion === 'hindu'">
                                    <div>
                                        <label>Castes</label>
                                        <select class="form-input" name="castes" x-model="castes" id="castes">
                                            <option value="" selected>select an option</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select> 
                                        <x-input-error :messages="$errors->get('castes')" class="mt-2" /> 
                                    </div>    
                                </template>
                    
                                <template x-if="religion === 'hindu'">
                                    <div>
                                        <label>Subcastes</label>
                                        <select class="form-input" name="subcastes" x-model="subcastes" id="subcastes">
                                            <option value="" selected>select an option</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select> 
                                        <x-input-error :messages="$errors->get('subcastes')" class="mt-2" /> 
                                    </div>
                                </template>
                    
                                <template x-if="religion === 'hindu'">
                                    <x-text-input name="gotra" value="{{ old('gotra') }}" :label="__('Gotra')" :require="false" :messages="$errors->get('gotra')"/>                       
                                </template>
                            </div>    
                        </div>
                    </div> 
                    {{-- Family Profile --}}

                    
                    <div class="pt-5" x-data="{ isAlive: '', fullName: '', occupation: '', jobType: '', organizationName:'' }">     
                        
                        <div class="panel">
                           <h8>Family Details</h8>
                            <div class="flex items-center justify-between mb-5">
                                <h5 class="font-semibold text-lg dark:text-white-light">Father Details</h5>
                            </div>               
                            <div class="grid grid-cols-2 gap-4 mb-4 md:grid-cols-3">  
                                <div>
                                    <label>Is Alive</label>
                                    <select class="form-input" name="isAlive" x-model="isAlive" id="isAlive">
                                        <option value="" selected>select an option</option>
                                        <option value="yes">yes</option>
                                        <option value="no">no</option>
                                    </select> 
                                    <x-input-error :messages="$errors->get('isAlive')" class="mt-2" /> 
                                </div> 
                                <template x-if="isAlive === 'yes'">
                                    <x-text-input name="fullName" value="{{ old('fullName') }}" :label="__('Full Name')" :require="false" :messages="$errors->get('fullName')"/>                       
                                </template>
                                
                                
                                <template x-if="isAlive === 'yes'">
                                    <div>
                                        <label>Occupation</label>
                                        <select class="form-input" name="occupation" x-model="occupation" id="occupation">
                                            <option value="" selected>select an option</option>
                                            <option value="retired">Retired</option>
                                            <option value="inService">In Service</option>
                                            <option value="business">Business</option>
                                        </select> 
                                        <x-input-error :messages="$errors->get('occupation')" class="mt-2" /> 
                                    </div>    
                                </template>
                    
                                <template x-if="isAlive === 'yes'">
                                    <div>
                                        <label>Job Type</label>
                                        <select class="form-input" name="jobType" x-model="jobType" id="jobType">
                                            <option value="" selected>select an option</option>
                                            <option value="government">Government</option>
                                            <option value="semiGovernment">Semi Government</option>
                                            <option value="private">Private</option>
                                         </select> 
                                        <x-input-error :messages="$errors->get('jobType')" class="mt-2" /> 
                                    </div>
                                </template>
                    
                                <template x-if="isAlive === 'yes'">
                                    <x-text-input name="organizationName" value="{{ old('organizationName') }}" :label="__('Organization Name')" :require="false" :messages="$errors->get('organizationName')"/>                       
                                </template>
                            </div>    
                            {{-- mother details --}}
                            <div class="pt-5" x-data="{ isAlive: '', fullName: '', occupation: '', jobType: '', organizationName:'' }"> 
                            <div class="flex items-center justify-between mb-5">
                                <h5 class="font-semibold text-lg dark:text-white-light">Mother Details</h5>
                            </div>               
                            <div class="grid grid-cols-2 gap-4 mb-4 md:grid-cols-3">  
                                <div>
                                    <label>Is Alive</label>
                                    <select class="form-input" name="isAlive" x-model="isAlive" id="isAlive">
                                        <option value="" selected>select an option</option>
                                        <option value="yes">yes</option>
                                        <option value="no">no</option>
                                    </select> 
                                    <x-input-error :messages="$errors->get('isAlive')" class="mt-2" /> 
                                </div> 
                                <template x-if="isAlive === 'yes'">
                                    <x-text-input name="fullName" value="{{ old('fullName') }}" :label="__('Full Name')" :require="false" :messages="$errors->get('fullName')"/>                       
                                </template>
                                
                                
                                <template x-if="isAlive === 'yes'">
                                    <div>
                                        <label>Occupation</label>
                                        <select class="form-input" name="occupation" x-model="occupation" id="occupation">
                                            <option value="" selected>select an option</option>
                                            <option value="retired">Retired</option>
                                            <option value="inService">In Service</option>
                                            <option value="business">Business</option>
                                        </select> 
                                        <x-input-error :messages="$errors->get('occupation')" class="mt-2" /> 
                                    </div>    
                                </template>
                    
                                <template x-if="isAlive === 'yes'">
                                    <div>
                                        <label>Job Type</label>
                                        <select class="form-input" name="jobType" x-model="jobType" id="jobType">
                                            <option value="" selected>select an option</option>
                                            <option value="government">Government</option>
                                            <option value="semiGovernment">Semi Government</option>
                                            <option value="private">Private</option>
                                         </select> 
                                        <x-input-error :messages="$errors->get('jobType')" class="mt-2" /> 
                                    </div>
                                </template>
                    
                                <template x-if="isAlive === 'yes'">
                                    <x-text-input name="organizationName" value="{{ old('organizationName') }}" :label="__('Organization Name')" :require="false" :messages="$errors->get('organizationName')"/>                       
                                </template>
                            </div>  
                            </div>  
                            {{-- brother details --}}
                           <div>
                            <div class="flex items-center justify-between mb-5">
                                <h5 class="font-semibold text-lg dark:text-white-light">Brother Details</h5>
                            </div>
                            <div class="grid grid-cols-2 gap-4 mb-4 md:grid-cols-2">  
                                {{-- <x-text-input name="residentPlace" value="{{ old('residentPlace') }}" :label="__('Resident Place')" :require="false" :messages="$errors->get('residentPlace')"/>                        --}}
                                    <div>
                                        <label>Married</label>
                                        <select class="form-input" name="married" x-model="married" id="married">
                                            <option value="" selected>select an option</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                         </select> 
                                        <x-input-error :messages="$errors->get('married')" class="mt-2" /> 
                                    </div>
                                    <div>
                                        <label>UnMarried</label>
                                        <select class="form-input" name="unmarried" x-model="unmarried" id="unmarried">
                                            <option value="" selected>select an option</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                         </select> 
                                        <x-input-error :messages="$errors->get('unmarried')" class="mt-2" /> 
                                    </div>
                                    </div>
                                    <div class="pt-5">        
                                                     
                                            <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-1">  
                                               
                                                <div>
                                                    <label for="resident">Resident:</label>
                                                    <textarea 
                                                        id="description" 
                                                        class="mt-1 block w-full h-32 p-2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                                                    ></textarea>
                                                    <x-input-error :messages="$errors->get('resident')" class="mt-2" /> 
                                                </div> 
                                            </div>    
                                        
                                        </div> 
                                        </div> 
                                        {{-- sister details --}}
                           <div>
                            
                            <div class="flex items-center justify-between mb-5">
                                <h5 class="font-semibold text-lg dark:text-white-light">Sister Details</h5>
                            </div>
                            <div class="grid grid-cols-2 gap-4 mb-4 md:grid-cols-2">  
                                {{-- <x-text-input name="residentPlace" value="{{ old('residentPlace') }}" :label="__('Resident Place')" :require="false" :messages="$errors->get('residentPlace')"/>                        --}}
                                    <div>
                                        <label>Married</label>
                                        <select class="form-input" name="married" x-model="married" id="married">
                                            <option value="" selected>select an option</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                         </select> 
                                        <x-input-error :messages="$errors->get('married')" class="mt-2" /> 
                                    </div>
                                    <div>
                                        <label>UnMarried</label>
                                        <select class="form-input" name="unmarried" x-model="unmarried" id="unmarried">
                                            <option value="" selected>select an option</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                         </select> 
                                        <x-input-error :messages="$errors->get('unmarried')" class="mt-2" /> 
                                    </div>
                                    </div>
                                    <div class="pt-5">        
                                                   
                                            <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-1">  
                                               
                                                <div>
                                                    <label for="resident">Resident:</label>
                                                    <textarea 
                                                        id="description" 
                                                        class="mt-1 block w-full h-32 p-2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                                                    ></textarea>
                                                    <x-input-error :messages="$errors->get('resident')" class="mt-2" /> 
                                                </div> 
                                         </div>
                                        </div> 
                                        </div> 

                                        {{-- about parents --}}
                                        <div class="pt-5">        
                                            <div class="panel">
                                                <div class="flex items-center justify-between mb-5">
                                                    <h5 class="font-semibold text-lg dark:text-white-light">About Parents</h5>
                                                </div>               
                                                <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-3">  
                                                    <div>
                                                        <label for="about_parents">About Parents:</label>
                                                        <textarea 
                                                            id="description" 
                                                            class="mt-1 block w-full h-32 p-2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                                                        ></textarea>
                                                        <x-input-error :messages="$errors->get('about_parents')" class="mt-2" /> 
                                                    </div> 
                                                </div>    
                                             </div>
                                            </div>
                                            </div>

{{-- astromony --}}
<div class="pt-5">     
    <div class="panel">
        
        <div class="flex items-center justify-between mb-5">
            <h5 class="font-semibold text-lg dark:text-white-light">Astronomy Details</h5>
        </div>

        
        <div class="grid grid-cols-2 gap-4 mb-4 md:grid-cols-3">
            
            <div>
                <label for="birth_place">Birth Place</label>
                <input type="text" id="birth_place" name="birth_place" class="form-input" value="{{ old('birth_place') }}">
                <x-input-error :messages="$errors->get('birth_place')" class="mt-2" />
            </div>

          
            <div>
                <label for="birth_date">Birth Date</label>
                <input type="date" id="birth_date" name="birth_date" class="form-input" value="{{ old('birth_date') }}">
                <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
            </div>

            
            <div>
                <label for="birth_time">Birth Time</label>
                <input type="time" id="birth_time" name="birth_time" class="form-input" value="{{ old('birth_time') }}">
                <x-input-error :messages="$errors->get('birth_time')" class="mt-2" />
            </div>
        </div>


        {{-- info --}}


        <div class="pt-5" x-data="{ agree: false }">     
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Astronomy Information</h5>
                    
                    <div class="col-span-2 md:col-span-3">
                        <label class="flex items-center">
                            <input type="checkbox" name="agree" class="form-checkbox" id="agree" x-model="agree">
                            <span class="ml-2">Will show when meet.</span>
                        </label>
                        <x-input-error :messages="$errors->get('agree')" class="mt-2" />
                    </div>
                </div>
        
                
                <template x-if="!agree">
                    <div class="grid grid-cols-2 gap-4 mb-4 md:grid-cols-3">
                        <div>
                            <label for="raashee">raashee</label>
                            <select id="raashee" name="raashee" class="form-input">
                                <option value="" selected>Select an option</option>
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                            </select>
                        </div>
        
                        <div>
                            <label for="nakshatra">nakshatra</label>
                            <select id="nakshatra" name="nakshatra" class="form-input">
                                <option value="" selected>Select an option</option>
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                            </select>
                        </div>
        
                        <div>
                            <label for="mangala">Mangala</label>
                            <select id="mangala" name="mangala" class="form-input">
                                <option value="" selected>Select an option</option>
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                            </select>
                        </div>
                        <div>
                            <label for="caraṇa">Caraṇa</label>
                            <select id="caraṇa" name="caraṇa" class="form-input">
                                <option value="" selected>Select an option</option>
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                            </select>
                        </div>
                        <div>
                            <label for="gan">Gan</label>
                            <select id="gan" name="gan" class="form-input">
                                <option value="" selected>Select an option</option>
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                            </select>
                        </div>
                        <div>
                            <label for="nadi">Nadi</label>
                            <select id="nadi" name="nadi" class="form-input">
                                <option value="" selected>Select an option</option>
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                            </select>
                        </div>
                    </div>
                </template>
            </div> 
        </div>
        </div>

        {{-- educational --}}
        <div class="pt-5">        
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Educational Information</h5>
                </div>               
                <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-3">  
                    <div>
                        <label>Highest Education</label>
                        <select class="form-input" name="highest_education" x-model="highest_education" id="highest_education">
                            <option value="" selected>Select an option</option>
                            <option value="option1">Option 1</option>
                            <option value="option2">Option 2</option>
                        </select> 
                        <x-input-error :messages="$errors->get('eating_habits')" class="mt-2" /> 
                    </div> 
                    <div>
                        <label for="education_in_detail">Education in Detail </label>
                        <input type="text" id="education_in_detail" name="education_in_detail" class="form-input" value="{{ old('education_in_detail') }}">
                        <x-input-error :messages="$errors->get('education_in_detail')" class="mt-2" />
                    </div>  
                    <div>
                        <label>Education in Detail</label>
                        <select class="form-input" name="education_in_details" x-model="education_in_details" id="education_in_details">
                            <option value="" selected>Select an option</option>
                            <option value="option1">Option 1</option>
                            <option value="option2">Option 2</option>
                        </select> 
                        <x-input-error :messages="$errors->get('education_in_details')" class="mt-2" /> 
                    </div> 
                     
                    
                </div>    
             </div>
            </div>     
        <div class="pt-5">        
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Occupational Information</h5>
                </div>               
                <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-3">  
                    <div>
                        <label>Occupation</label>
                        <select class="form-input" name="highest_education" x-model="highest_education" id="highest_education">
                            <option value="" selected>Select an option</option>
                            <option value="government">Government</option>
                            <option value="semi-government">Semi-Government</option>
                            <option value="private">Private</option>
                            <option value="inSearch">In Search</option>
                            <option value="business">Business</option>
                            <option value="businessAndServices">Business and Services</option>
                            
                        </select> 
                        <x-input-error :messages="$errors->get('eating_habits')" class="mt-2" /> 
                    </div> 
                    <div>
                        <label for="organisation">Organization</label>
                        <input type="text" id="organisation" name="organisation" class="form-input" value="{{ old('organisation') }}">
                        <x-input-error :messages="$errors->get('organisation')" class="mt-2" />
                    </div>  
                    <div>
                        <label for="designation">Designation</label>
                        <input type="text" id="designation" name="designation" class="form-input" value="{{ old('designation') }}">
                        <x-input-error :messages="$errors->get('designation')" class="mt-2" />
                    </div>  
                    <div>
                        <label for="job_location">Job Location</label>
                        <input type="text" id="job_location" name="job_location" class="form-input" value="{{ old('job_location') }}">
                        <x-input-error :messages="$errors->get('job_location')" class="mt-2" />
                    </div>  
                     
                     
                    
                </div>    
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Experience / Income Information</h5>
                </div>               
                <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-3">  
                    <div>
                        <label>Currency</label>
                        <select class="form-input" name="currency" x-model="currency" id="currency">
                            <option value="" selected>Select an option</option>
                            <option value="inr">INR</option> 
                            <option value="usd">USD</option>
                            <option value="aed">AED</option>
                        </select> 
                        <x-input-error :messages="$errors->get('eating_habits')" class="mt-2" /> 
                    </div> 
                    <div>
                        <label for="job_experience">Job Experience</label>
                        <input type="text" id="job_experience" name="job_experience" class="form-input" value="{{ old('job_experience') }}">
                         <x-input-error :messages="$errors->get('job_experience')" class="mt-2" />
                    </div>  
                    <div>
                        <label for="income">Income</label>
                        <input type="text" id="income" name="income" class="form-input" value="{{ old('income') }}">
                        <x-input-error :messages="$errors->get('income')" class="mt-2" />
                    </div>  
                </div>    
             </div>
            </div>     
        <div class="pt-5">        
            <div class="panel">
                <h1>Contact Details</h1>
                <div class="flex items-center justify-between mb-5">
                   
                    <h5 class="font-semibold text-lg dark:text-white-light">Location Information</h5>
                </div>               
                <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-3">  
                    <div>
                        <label>Country</label>
                        <select class="form-input" name="country" x-model="country" id="country">
                            <option value="" selected>Select an option</option>
                            <option value="india">India</option>
                            <option value="option">Option</option> 
                        </select> 
                        <x-input-error :messages="$errors->get('eating_habits')" class="mt-2" /> 
                    </div> 
                    <div>
                        <label>State</label>
                        <select class="form-input" name="state" x-model="state" id="state">
                            <option value="" selected>Select an option</option>
                            <option value="maharashtra">Maharashtra</option>
                            <option value="option">Option</option>
                        </select> 
                        <x-input-error :messages="$errors->get('eating_habits')" class="mt-2" /> 
                    </div> 
                    <div>
                        <label>City</label>
                        <select class="form-input" name="city" x-model="city" id="city">
                            <option value="" selected>Select an option</option>
                            <option value="mumbai">Mumbai</option>
                            <option value="option">Option</option>
                        </select> 
                        <x-input-error :messages="$errors->get('eating_habits')" class="mt-2" /> 
                    </div> 
                     
                </div>    
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Address / Contact Information</h5>
                </div>               
                <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-3">  
                    
                    <div>
                        <label for="address_line_1">Address Line 1</label>
                        <input type="text" id="address_line_1" name="address_line_1" class="form-input" value="{{ old('address_line_1') }}">
                         <x-input-error :messages="$errors->get('address_line_1')" class="mt-2" />
                    </div>  
                    <div>
                        <label for="address_line_2">Address Line 2</label>
                        <input type="text" id="address_line_2" name="address_line_2" class="form-input" value="{{ old('address_line_2') }}">
                         <x-input-error :messages="$errors->get('address_line_2')" class="mt-2" />
                    </div>  
                    <div>
                        <label for="landmark">Landmark</label>
                        <input type="text" id="landmark" name="landmark" class="form-input" value="{{ old('landmark') }}">
                         <x-input-error :messages="$errors->get('landmark')" class="mt-2" />
                    </div>  
                    <div>
                        <label for="pincode">Pincode</label>
                        <input type="text" id="pincode" name="pincode" class="form-input" value="{{ old('pincode') }}">
                         <x-input-error :messages="$errors->get('pincode')" class="mt-2" />
                    </div>  
                    <div>
                        <label for="mobile">Mobile</label>
                        <div class="flex items-center">
                            <span class="mr-2">+91</span>
                            <input type="text" id="mobile" name="mobile" class="form-input" value="{{ old('mobile', '+91') }}" 
                                   placeholder="Enter mobile number" pattern="^\+91[0-9]{10}$" 
                                   oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
                                   required>
                        </div>
                        <x-input-error :messages="$errors->get('mobile')" class="mt-2" />
                    </div>
                    <div>
                        <label for="landline">Landline</label>
                        <input type="text" id="landline" name="landline" class="form-input" value="{{ old('landline') }}">
                         <x-input-error :messages="$errors->get('landline')" class="mt-2" />
                    </div>  
                    <div>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-input" value="{{ old('email') }}" required>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    
                    
                </div>    
             </div>
            </div>     
        <div class="pt-5">        
            <div class="panel">
                <h1>About Life Partner Profile</h1>
                <div class="flex items-center justify-between mb-5">
                   
                    <h5 class="font-semibold text-lg dark:text-white-light">Age / Height Information</h5>
                </div>               
                <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-4">  
                    <div>
                        <label>Min Age</label>
                        <select class="form-input" name="min_age" x-model="min_age" id="min_age">
                            <option value="" selected>Select an option</option>
                            <option value="option">Option</option>
                            <option value="option">Option</option> 
                        </select> 
                        <x-input-error :messages="$errors->get('min_age')" class="mt-2" /> 
                    </div> 
                    <div>
                        <label>Max Age</label>
                        <select class="form-input" name="max_age" x-model="max_age" id="max_age">
                            <option value="" selected>Select an option</option>
                            <option value="option">Option</option>
                            <option value="option">Option</option>
                        </select> 
                        <x-input-error :messages="$errors->get('max_age')" class="mt-2" /> 
                    </div> 
                    <div>
                        <label>Min Height</label>
                        <select class="form-input" name="min_height" x-model="min_height" id="min_height">
                            <option value="" selected>Select an option</option>
                            <option value="option">Option</option>
                            <option value="option">Option</option>
                        </select> 
                        <x-input-error :messages="$errors->get('min_height')" class="mt-2" /> 
                    </div> 
                    <div>
                        <label>Max Height</label>
                        <select class="form-input" name="max_height" x-model="max_height" id="max_height">
                            <option value="" selected>Select an option</option>
                            <option value="option">Option</option>
                            <option value="option">Option</option>
                        </select> 
                        <x-input-error :messages="$errors->get('max_height')" class="mt-2" /> 
                    </div> 
                     
                </div>   
                 
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Expected Information About Partners</h5>
                </div>               
                <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-3">  
                    
                    <div>
                        <label for="income">Income</label>
                        <input type="text" id="income" name="income" class="form-input" value="{{ old('income') }}">
                         <x-input-error :messages="$errors->get('income')" class="mt-2" />
                    </div>  
                    <div>
                        <label for="city_preference">City Preference</label>
                        <input type="text" id="city_preference" name="city_preference" class="form-input" value="{{ old('city_preference') }}">
                         <x-input-error :messages="$errors->get('city_preference')" class="mt-2" />
                    </div>  
                    <div>
                        <label for="education_specialisation">Education Specialisation</label>
                        <input type="text" id="education_specialisation" name="education_specialisation" class="form-input" value="{{ old('education_specialisation') }}">
                         <x-input-error :messages="$errors->get('education_specialisation')" class="mt-2" />
                    </div>  
                    <div>
                        <label>Currency</label>
                        <select class="form-input" name="currency" x-model="currency" id="currency">
                            <option value="" selected>Select an option</option>
                            <option value="inr">INR</option> 
                            <option value="usd">USD</option>
                            <option value="aed">AED</option>
                        </select> 
                        <x-input-error :messages="$errors->get('eating_habits')" class="mt-2" /> 
                    </div> 
                    <div>
                        <label>Want To See Patrika</label>
                        <select class="form-input" name="patrika" x-model="patrika" id="patrika">
                            <option value="" selected>Select an option</option>
                            <option value="yes">Yes</option> 
                            <option value="no">No</option>
                         </select> 
                        <x-input-error :messages="$errors->get('eating_habits')" class="mt-2" /> 
                    </div> 
                    <div>
                        <label>Subcastes</label>
                        <select class="form-input" name="subcastes" x-model="subcastes" id="subcastes">
                            <option value="" selected>select an option</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select> 
                        <x-input-error :messages="$errors->get('subcastes')" class="mt-2" /> 
                    </div>
                    <div>
                        <label>Education in Detail</label>
                        <select class="form-input" name="education_in_details" x-model="education_in_details" id="education_in_details">
                            <option value="" selected>Select an option</option>
                            <option value="option1">Option 1</option>
                            <option value="option2">Option 2</option>
                        </select> 
                        <x-input-error :messages="$errors->get('education_in_details')" class="mt-2" /> 
                    </div> 
                    <div>
                        <label>Job</label>
                        <select class="form-input" name="job" x-model="job" id="job">
                            <option value="" selected>Select an option</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                            <option value="other">Other</option>
                        </select> 
                        <x-input-error :messages="$errors->get('job')" class="mt-2" /> 
                    </div> 
                    <div>
                        <label>Business</label>
                        <select class="form-input" name="business" x-model="business" id="business">
                            <option value="" selected>Select an option</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                            <option value="other">Other</option>
                        </select> 
                        <x-input-error :messages="$errors->get('business')" class="mt-2" /> 
                    </div> 
                    <div>
                        <label>Foreign Residents</label>
                        <select class="form-input" name="foreign_resident" x-model="business" id="business">
                            <option value="" selected>Select an option</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                            <option value="other">Other</option>
                        </select> 
                        <x-input-error :messages="$errors->get('business')" class="mt-2" /> 
                    </div> 
                     
                    
                    
                    
                    
                </div>    
             </div>
            </div>     



                        </div>
                    </div> 
                    
                        {{-- submit --}}
                        <div class="flex justify-end mt-4">
                            <x-success-button>
                                {{ __('Submit') }}
                            </x-success-button>                    
                            &nbsp;&nbsp;
                            <x-cancel-button :link="route('castes.index')">
                                {{ __('Cancel') }}
                            </x-cancel-button>
                        </div> 
        </form>         
       </div>
    </div> 
    </div> 
    </x-layout.admin>
    