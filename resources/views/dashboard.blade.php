@extends('layouts.app') {{-- . same as /, just different notation --}}

@section('content')
<div class="flex justify-center">
    <div
    class="w-full bg-white p-3 sm:p-6 sm:rounded-lg md:max-w-screen-md xl:max-w-screen-lg dark:text-white dark:bg-transparent dark:border-solid border border-white border-opacity-40">
    <h2 class="text-lg text-center font-light"><b>Welcome to your dashboard {{ $user->name }}!</b></h2>

        {{-- <div id='app'> --}}
            {{-- <form id="app" action="" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <avatar-upload></avatar-upload>
            <img src="{{ $user->getAvatar() }}" alt="Your avatar">
            
            <div class="my-4">
                <label for="image">Avatar image</label>
                <input type="file" name="image" id="image">
            </div>

            <div>
                <button type="submit" class="bg-hacker-orange text-white py-2 rounded-sm dark:bg-dark-gh-btn">Update avatar</button>
            </div>
        </form> --}}
        {{-- </div> --}}

        <div>
            <img class="border-2 border-gray-300 rounded-lg w-40 h-40 m-auto my-3 object-cover dark:border-transparent" src="{{ $user->getAvatar() }}" alt="{{ $user->username }}'s avatar">
        </div>

        <h3 mt-2>Update your settings</h3>

        <form action="" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="my-4">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="{{ old('username') ? old('username') : $user->username }}"
                class="bg-gray-100 border-solid border border-black border-opacity-40 w-full p-2 rounded-sm dark:bg-transparent dark:border-white @error('username') border-red-500 border-opacity-100  @enderror">

                @error('username') 
                <div class="text-red-500 mt-1 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="my-4">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="{{ old('email') ? old('email') : $user->email }}"
                class="bg-gray-100 border-solid border border-black border-opacity-40 w-full p-2 rounded-sm dark:bg-transparent dark:border-white @error('email') border-red-500 border-opacity-100  @enderror">

                @error('email') 
                <div class="text-red-500 mt-1 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="my-4">
                <label for="description" class="sr-only">Description</label>
                <textarea 
                    name="description" 
                    id="description" 
                    class="bg-gray-100 border-solid border border-black border-opacity-40 w-full p-2 rounded-sm dark:bg-transparent dark:border-white @error('description') border-red-500 border-opacity-100  @enderror"
                >{{ old('description') ? old('description') : $user->description }}</textarea>

                @error('description') 
                <div class="text-red-500 mt-1 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="my-4">
                <label for="image">Avatar image</label>
                <input type="file" name="image" id="image">
            </div>

            <div>
                <button type="submit" class="bg-hacker-orange text-white py-2 rounded-sm w-full">Update settings</button>
            </div>

            @if (session('status'))
                <div class="text-red-500 my text-lg">
                    {{ session('status') }}
                </div>
            @endif

            {{-- <div class="my-4">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Choose password"
                class="bg-gray-100 border-solid border border-black border-opacity-40 w-full p-1 rounded-sm dark:bg-transparent dark:border-white @error('name') border-red-500 border-opacity-100  @enderror">
                @error('password') 
                <div class="text-red-500 mt-1 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="my-4">
                <label for="password_confirmation" class="sr-only">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm password"
                class="bg-gray-100 border-solid border border-black border-opacity-40 w-full p-1 rounded-sm dark:bg-transparent dark:border-white @error('password') border-red-500 border-opacity-100  @enderror" value="">
            </div> --}}
        </form>
    </div>
</div>
@endsection