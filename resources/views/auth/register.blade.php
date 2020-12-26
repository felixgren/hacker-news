@extends('layouts.app') {{-- . same as /, just different notation --}}

@section('content')
<div class="flex justify-center">
    <div class="w-10/12 bg-white p-3 sm:p-6 sm:rounded-lg md:max-w-screen-md xl:max-w-screen-lg dark:text-white dark:bg-transparent dark:border-solid border border-white border-opacity-40">
        <h2 class="">Registration</h2>

        <form action="">
            <div class="my-2">
                <label for="name"></label>
                <input type="text" name="name" id="name" placeholder="Name"
                class="bg-gray-200 w-full p-1" value="">
            </div>

            <div class="my-2">
                <label for="username"></label>
                <input type="text" name="username" id="username" placeholder="Username"
                class="bg-gray-200 w-full p-1" value="">
            </div>

            <div class="my-2">
                <label for="email"></label>
                <input type="text" name="email" id="email" placeholder="Email"
                class="bg-gray-200 w-full p-1" value="">
            </div>

            <div class="my-2">
                <label for="password"></label>
                <input type="password" name="password" id="password" placeholder="Choose password"
                class="bg-gray-200 w-full p-1" value="">
            </div>

            <div class="my-2">
                <label for="password_confirmation"></label>
                <input type="text" name="password_confirmation" id="password_confirmation" placeholder="Confirm password"
                class="bg-gray-200 w-full p-1" value="">
            </div>
        </form>
    </div>
</div>
@endsection