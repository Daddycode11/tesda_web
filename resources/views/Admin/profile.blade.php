@extends('layouts.app')

@section('content')
<div class="p-8">
    <h1 class="text-3xl font-bold mb-4">Admin Profile</h1>

    <div class="bg-white p-6 rounded shadow-md max-w-md mx-auto">
        <div class="flex items-center space-x-4">
            <img src="{{ asset('images/admin_avatar.png') }}" alt="Admin" class="w-16 h-16 rounded-full border">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">Admin Name</h2>
                <p class="text-gray-500">admin@example.com</p>
            </div>
        </div>

        <div class="mt-6">
            <h3 class="font-semibold text-gray-700 mb-2">Profile Settings</h3>
            <form>
                <div class="mb-4">
                    <label class="block text-gray-600 mb-1">Name</label>
                    <input type="text" class="w-full border px-3 py-2 rounded" value="Admin Name">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-600 mb-1">Email</label>
                    <input type="email" class="w-full border px-3 py-2 rounded" value="admin@example.com">
                </div>
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update Profile</button>
            </form>
        </div>
    </div>
</div>
@endsection
