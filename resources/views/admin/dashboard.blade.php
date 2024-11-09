<x-layout.admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Single Card for Registered Users -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <div class="flex items-center justify-between">
                        <h3 class="text-2xl font-semibold text-gray-800">Registered Users</h3>
                        {{-- <span class="bg-blue-100 text-blue-800 text-sm font-medium py-1 px-3 rounded-full">
                            {{ $registeredUsers }} Users
                        </span> --}}

 < 
                    </div>
                    <div class="mt-4 text-gray-600">
                        <p class="text-lg">The total number of registered users on your platform. You can track growth and engagement through this number.</p>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('users.index') }}" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
                            View All Users
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.admin>
