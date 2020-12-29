{{-- List of posts go here --}}
@extends('layouts.app') {{-- . same as /, just different notation --}}

@section('content')
<div class="flex justify-center">
    <div class="w-10/12 bg-white p-3 sm:p-6 sm:rounded-lg md:max-w-screen-md xl:max-w-screen-lg dark:text-white dark:bg-transparent dark:border-solid border border-white border-opacity-40">
        Posts yes yes yes
        <form action="{{ route('posts') }}" method="post" class="mt-2">
            @csrf
            <div>
                <label for="body" class="sr-only">Post comment</label>
                <textarea name="body" id="body" cols="30" rows="2" class="bg-transparent
                border-2 w-full p-2 rounded-sm @error('body') border-red-500 @enderror"
                placeholder="Text here"></textarea>

                @error('body') 
                    <div class="text-red-500 mt-1 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-hacker-orange text-white py-1 mt-1 rounded-sm w-1/4 dark:bg-dark-gh-btn">Post</button>
            </div>

        </form>
    </div>
</div>
@endsection