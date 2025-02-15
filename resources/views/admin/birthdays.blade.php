<x-layout.admin>
    <div class="container mx-auto p-6">
        <!-- Flex container for heading and search -->
        <div class="flex justify-between items-center">
            <div>
            <h2 class="text-3xl font-bold text-gray-800">🎉 All Birthdays This Month</h2>
            <p class="text-lg text-gray-600 mt-2">Here are all the members celebrating their birthday this month.</p>
        </div>

            
            <!-- Search Form -->
            <form method="GET" action="{{ route('admin.birthdays') }}" class="flex">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}"
                    placeholder="Search by name..." 
                    class="border rounded-lg p-2 w-60"
                >
                <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-lg">Search</button>
            </form>
        </div>


        @if($birthdayUsers->isEmpty())
            <p class="text-gray-500 mt-4">No birthdays this month.</p>
        @else
            <ul class="mt-4 space-y-4">
                @foreach($birthdayUsers as $user)
                    <li class="flex justify-between bg-gray-100 p-3 rounded-lg mb-2">
                        <span class="font-semibold text-gray-800">
                            {{ $user->first_name }} 
                            {{ $user->middle_name ? $user->middle_name . ' ' : '' }} 
                            {{ $user->last_name }}
                        </span>
                        <span class="text-gray-600">{{ \Carbon\Carbon::parse($user->date_of_birth)->format('M d') }}</span>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</x-layout.admin>
