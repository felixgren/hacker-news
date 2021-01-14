@extends('layouts.app') {{-- . same as /, just different notation --}}

@section('content')
<div class="flex justify-center">
    <div class="w-full bg-white p-3 sm:p-6 sm:rounded-lg md:max-w-screen-md xl:max-w-screen-lg dark:text-white dark:bg-transparent dark:border-solid border border-white border-opacity-20">
        <h2 class="">Log in</h2>

        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="my-4">
                <label for="email" class="sr-only">Email</label>
                <input type="text" name="email" id="email" placeholder="Email"
                class="bg-gray-100 border-solid border border-black border-opacity-40 w-full p-1 rounded-sm dark:bg-transparent dark:border-white @error('name') border-red-500 border-opacity-100  @enderror" value="{{ old('email') }}">

                @error('email') 
                <div class="text-red-500 mt-1 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="my-4">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="password" placeholder="Choose password"
                class="bg-gray-100 border-solid border border-black border-opacity-40 w-full p-1 rounded-sm dark:bg-transparent dark:border-white @error('name') border-red-500 border-opacity-100  @enderror" value="">

                @error('password') 
                <div class="text-red-500 mt-1 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="my-4">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember" class="text-sm select-none">Remember me</label>
                </div>
            </div>

            @if (session()->has('status'))
                <div class="text-red-500 -mt-2 mb-2 text-sm">
                    {{ session('status') }}
                </div>
            @endif

            <div>
                <button type="submit" class="bg-hacker-orange text-white py-2 rounded-sm w-full dark:bg-dark-gh-btn">Login</button>
            </div>
        </form>
    </div>
</div>
@endsection