<x-layout.default>
<div>
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="{{ route('packages.index') }}" class="text-primary hover:underline">Packages</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Add</span>
        </li>
    </ul>
    <div class="pt-5">        
        <form class="space-y-5" action="{{ route('packages.store') }}" method="POST">
            @csrf
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Add Package</h5>
                </div>               
                <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-3">     
                    <x-text-input name="name" value="{{ old('name') }}" :label="__('package Name')" :require="true" :messages="$errors->get('name')"/>                       
                </div>
                <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-3">     
                    <x-text-input name="description" value="{{ old('description') }}" :label="__('package description')" :require="true" :messages="$errors->get('description')"/>                       
                </div>
                <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-3">     
                    <x-text-input name="price" value="{{ old('price') }}" :label="__('package price')" :require="true" :messages="$errors->get('price')"/>                       
                </div>
                <div class="flex justify-end mt-4">
                    <x-success-button>
                        {{ __('Submit') }}
                    </x-success-button>                    
                    &nbsp;&nbsp;
                    <x-cancel-button :link="route('packages.index')">
                        {{ __('Cancel') }}
                    </x-cancel-button>
                </div>
            </div>            
        </form>         
    </div>
</div> 
</x-layout.default>
