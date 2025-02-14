@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-3xl font-bold text-gray-800">🎉 All Birthdays This Month</h2>
    <p class="text-lg text-gray-600 mt-2">Here are all the members celebrating their birthday this month.</p>

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
@endsection
