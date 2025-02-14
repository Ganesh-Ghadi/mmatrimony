<x-layout.admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Total Registered Users -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h3 class="text-2xl font-semibold text-gray-800">Registered Users</h3>
                    <p class="text-lg text-gray-600 mt-2">Total users on the platform.</p>
                    <p class="text-4xl font-bold text-blue-500 mt-4">{{ $totalUsers }}</p>
                </div>

                <!-- Active Users -->
                <div class="bg-green-100 shadow-lg rounded-lg p-6">
                    <h3 class="text-2xl font-semibold text-gray-800">Active Users</h3>
                    <p class="text-lg text-gray-600 mt-2">Users currently active.</p>
                    <p class="text-4xl font-bold text-green-500 mt-4">{{ $activeUsers }}</p>
                </div>

                <!-- Inactive Users -->
                <div class="bg-red-100 shadow-lg rounded-lg p-6">
                    <h3 class="text-2xl font-semibold text-gray-800">Inactive Users</h3>
                    <p class="text-lg text-gray-600 mt-2">Users not active.</p>
                    <p class="text-4xl font-bold text-red-500 mt-4">{{ $inactiveUsers }}</p>
                </div>

                <div class="bg-pink-100 shadow-lg rounded-lg p-6">
                    <h3 class="text-2xl font-semibold text-gray-800">Total Brides</h3>
                    <p class="text-lg text-gray-600 mt-2">Number of registered brides.</p>
                    <p class="text-4xl font-bold text-pink-500 mt-4">{{ $brideCount }}</p>
                </div>
            
                <!-- Groom Count -->
                <div class="bg-blue-100 shadow-lg rounded-lg p-6">
                    <h3 class="text-2xl font-semibold text-gray-800">Total Grooms</h3>
                    <p class="text-lg text-gray-600 mt-2">Number of registered grooms.</p>
                    <p class="text-4xl font-bold text-blue-500 mt-4">{{ $groomCount }}</p>
                </div>
            </div>

            <!-- Birthday Users -->
            <div class="mt-8 bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-2xl font-semibold text-gray-800">🎂 Members with Birthdays This Month</h3>
                <p class="text-lg text-gray-600 mt-2">Celebrate with these members!</p>

                @if($birthdayUsers->isEmpty())
                    <p class="text-gray-500 mt-4">No birthdays this month.</p>
                @else
                    <ul class="mt-4 space-y-2">
                        @foreach($birthdayUsers as $user)
                            <li class="flex justify-between bg-gray-100 p-3 rounded-lg">
                                <span class="font-semibold text-gray-800">{{ $user->first_name }}</span>
                                <span class="text-gray-600">{{ \Carbon\Carbon::parse($user->date_of_birth)->format('M d') }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</x-layout.admin>
