<x-layout.admin>
    {{-- <x-add-button :link="route('sub_castes.create')" /> --}}
    @role(['admin'])
        {{-- <x-excel-button :link="route('sub_castes.import')" /> --}}
        <x-excel-button :link="route('user_profiles.import')" />
    @endrole    
    <br><br>
    <div x-data="form"> 
        <div class="panel">
            <div class="flex items-center justify-between mb-5">
                <h5 class="font-semibold text-lg dark:text-white-light">Profiles</h5>
                <div class="flex items-center">
                    <form action="{{ route('user_profiles.index') }}" method="GET" class="flex items-center">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search profiles" 
                            class="mr-2 px-2 py-1 border border-gray-300 rounded-md">
                        <button class="btn btn-primary px-4 py-2 mr-2" type="submit">Search</button>
                        
                        @if(request('search'))
                            <a href="{{ route('user_profiles.index') }}" class="btn btn-secondary px-4 py-2">Reset</a>
                        @endif
                    </form>
                </div>
                

            </div>
            <div class="mt-6">
                <div class="table-responsive">
                    <table class="table-hover">
                        <thead>
                            <tr>
                                 <th>Full Name</th>
                                <th>Mobile</th>
                                <th>Gender</th>
                                <th>Marital Status</th>
                                <th>Email</th>
                                <th>Status</th>


                                <th style="text-align:right;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profiles as $profile)
                            <tr>                    
                                {{-- <td>{{ $profile->id }}</td> --}}
                                <td> {{$profile->first_name. " ". $profile->middle_name. " ".$profile->last_name }}</td>
                                <td > {{$profile->mobile }}</td>
                                <td > {{$profile->gender }}</td>
                                <td > {{ucfirst($profile->marital_status) }}</td>
                                <td > {{$profile->email}}</td>
                                <td>
                                    @if(optional($profile->user)->active)
                                        <span class="text-green-600 font-bold">Active</span>
                                    @else
                                        <span class="text-red-600 font-bold">Inactive</span>
                                    @endif
                                </td>
                                                                <td class="float-right">
                                    <ul class="flex items-center gap-2" >
                                        <li style="display: inline-block;vertical-align:top;">
                                            <x-edit-button :link=" route('user_profiles.edit', $profile->id)" />                               
                                        </li>
                                        <li style="display: inline-block;vertical-align:top;">
                                            <x-delete-button :link=" route('user_profiles.destroy',$profile->id)" />  
                                        </li>   
                                    </ul>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $profiles->links() }}
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("form", () => ({
                // highlightjs
                codeArr: [],
                toggleCode(name) {
                    if (this.codeArr.includes(name)) {
                        this.codeArr = this.codeArr.filter((d) => d != name);
                    } else {
                        this.codeArr.push(name);

                        setTimeout(() => {
                            document.querySelectorAll('pre.code').forEach(el => {
                                hljs.highlightElement(el);
                            });
                        });
                    }
                }
            }));
        });
    </script>
</x-layout.admin>
