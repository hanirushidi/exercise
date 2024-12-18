@extends('layouts.app')

@section('content')
<div class="container p-6 mx-auto">
    <h1 class="mb-6 text-3xl font-bold text-gray-800">Users</h1>
    <div class="p-6 bg-white rounded-lg shadow-md">
        <ul class="divide-y divide-gray-200">
            @foreach($users as $user)
                <li class="flex items-center py-4">
                    <div class="flex-shrink-0 w-10 h-10">
                        <img class="w-10 h-10 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random" alt="{{ $user->name }}">
                    </div>
                    <div class="ml-4">
                        <p class="text-lg font-medium text-gray-900">{{ $user->name }}</p>
                        <p class="text-sm text-gray-500">{{ $user->email }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
