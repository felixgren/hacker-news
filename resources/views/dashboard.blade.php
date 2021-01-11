@extends('layouts.app') {{-- . same as /, just different notation --}}

@section('content')
<div class="flex justify-center">
    <div
        class="w-10/12 bg-white p-3 sm:p-6 sm:rounded-lg md:max-w-screen-md xl:max-w-screen-lg dark:text-white dark:bg-transparent dark:border-solid border border-white border-opacity-40">
        <h1 class="text-lg"><b>Welcome to your dashboard {{ $user->username }}</b></h1>
        <h2 class="text-md font-opacity-50">Your name: {{$user->name}}</h2>

        <div>
            <img src="{{ $user->getAvatar() }}" alt="Your avatar">
        </div>

        <h2>Update your settings</h2>

        <form action="" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="my-4">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="{{ old('username') ? old('username') : $user->username }}"
                class="bg-gray-100 border-solid border border-black border-opacity-40 w-full p-1 rounded-sm dark:bg-transparent dark:border-white @error('username') border-red-500 border-opacity-100  @enderror">

                @error('username') 
                <div class="text-red-500 mt-1 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="my-4">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="{{ old('email') ? old('email') : $user->email }}"
                class="bg-gray-100 border-solid border border-black border-opacity-40 w-full p-1 rounded-sm dark:bg-transparent dark:border-white @error('email') border-red-500 border-opacity-100  @enderror">

                @error('email') 
                <div class="text-red-500 mt-1 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="my-4">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="bg-gray-100 border-solid border border-black border-opacity-40 w-full p-1 rounded-sm dark:bg-transparent dark:border-white @error('description') border-red-500 border-opacity-100  @enderror">{{ old('description') ? old('description') : $user->description }}</textarea>

                @error('description') 
                <div class="text-red-500 mt-1 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="my-4">
                <label for="description">Avatar image</label>
                <input type="file" name="image" id="image">
            </div>

            <div>
                <button type="submit" class="bg-hacker-orange text-white py-2 rounded-sm w-full dark:bg-dark-gh-btn">Update settings</button>
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


        @if ($posts->count()) 
            <p> You have {{ $posts->total() }} {{ Str::plural('post', $posts->total())}} 
                and {{ $user->receivedLikes->count() }} karma</p>
                @foreach ($posts as $post)
                    <x-post :post="$post" />
                @endforeach

                {{ $posts->links() }} {{-- Included tailwind view --}}
        @else
        <p>You haven't posted anything yet.</p>
        @endif
    </div>
</div>
@endsection