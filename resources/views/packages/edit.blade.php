<x-layout.default>
<div>
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="{{ route('packages.index') }}" class="text-primary hover:underline">Packages</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Edit</span>
        </li>
    </ul>
    <div class="pt-5">        
        <form class="space-y-5" action="{{ route('packages.update', ['package' => $package->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Edit Package</h5>
                </div>
                <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-3">               
                    <x-text-input name="name" value="{{ old('name', $package->name) }}" :label="__('Package Name')" :require="true" :messages="$errors->get('name')"/>              
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
