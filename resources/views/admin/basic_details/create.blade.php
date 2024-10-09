<x-layout.default>
    <div>
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="{{ route('basic_details.create') }}" class="text-primary hover:underline">Basic Details</a>
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
                        <x-text-input name="first_name" class="bg-gray-200" value="{{ $user->first_name }}" :label="__('first Name')" :require="true" :disabled="true" :messages="$errors->get('first_name')"/>   
                        <x-text-input name="middle_name" class="bg-gray-200" value="{{ $user->middle_name }}" :label="__('middle Name')" :require="true" :disabled="true" :messages="$errors->get('middle_name')"/>                       
                        <x-text-input name="last_name" class="bg-gray-200" value="{{ $user->last_name }}" :label="__('last Name')" :require="true" :disabled="true" :messages="$errors->get('last_name')"/>                                           
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
                        <x-text-input name="gender" class="bg-gray-200" value="{{$user->gender}}" :label="__('Gender')" :require="true" :messages="$errors->get('gender')" :disabled="true"/>                                           
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
                                <label>Physical Abnomality <span class="text-red-500">*</span></label>
                                <select class="form-input" name="physical_abnomality" x-model="physical_abnomality" id="physical_abnomality">
                                   <option value="" selected>select an option</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select> 
                                <x-input-error :messages="$errors->get('physical_abnomality')" class="mt-2" /> 
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
                        <div class="flex justify-end mt-4">
                            <x-success-button>
                                {{ __('Submit') }}
                            </x-success-button>                    
                            &nbsp;&nbsp;
                            <x-cancel-button :link="route('castes.index')">
                                {{ __('Cancel') }}
                            </x-cancel-button>
                        </div>
                    </div>  
        </form>         
       </div>
    </div> 
    </x-layout.default>
    