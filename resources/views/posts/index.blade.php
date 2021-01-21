{{-- List of posts go here --}}
@extends('layouts.app') {{-- . same as /, just different notation --}}

@section('content')
<div class="flex justify-center">
    <div class="w-full bg-white p-2 sm:p-6 sm:rounded-lg md:max-w-screen-md xl:max-w-screen-lg dark:text-white dark:bg-black-gh-bg border border-white border-opacity-40">

        @auth
        <p class="pl-2 mt-4">Add post</p>
            <form action="{{ route('posts') }}" method="post" class="mt-2 px-2 dark:text-white">
                @csrf
                <div>
                    <div>
                        <label for="title" class="sr-only">Post title</label>
                        <input type="text" name="title" id="title" 
                        class="bg-gray-100 border border-solid border-gray-300 w-full mt-2 p-2 rounded-sm dark:border-gray-400 dark:bg-transparent @error('title') border-red-500 @enderror"
                        placeholder="Title"></textarea>

                        @error('title') 
                        <div class="text-red-500 mt-1 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label for="link" class="sr-only">Post link</label>
                        <input type="url" name="link" id="link"
                        class="bg-gray-100 border border-solid border-gray-300 w-full mt-2 p-2 rounded-sm dark:border-gray-400 dark:bg-transparent @error('link') border-red-500 @enderror"
                        value="{{ old('link') }}" placeholder="Link (optional)"></textarea>

                        @error('link') 
                        <div class="text-red-500 mt-1 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label for="body" class="sr-only">Post body</label>
                        <textarea name="body" id="body"
                        class="bg-gray-100 border border-solid border-gray-300 w-full mt-2 p-2 rounded-sm dark:border-gray-400 dark:bg-transparent @error('body') border-red-500 @enderror" placeholder="Content">{{ old('body') }}</textarea>

                        @error('body') 
                        <div class="text-red-500 mt-1 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                

                <div>
                    <button type="submit" class="bg-hacker-orange text-sm text-white text-semibold py-1 mt-2 rounded-sm w-1/4 opacity-90">Post</button>
                </div>

                @if (session()->has('body'))
                    <div class="text-red-500 my text-lg">
                        {{ session('body') }}
                    </div>
                @endif
            </form>
        @endauth

        @if ($posts->count()) 
            <p class="pt-6 pl-2"> We have a total of {{$posts->total()}} posts!</p>
                @foreach ($posts as $post)
                    <x-post :post="$post" :singlePost="$singlePost"/>
                @endforeach

                {{ $posts->links() }} {{-- Included tailwind view --}}
        @else
        <p>There are no posts yet</p>
        @endif
        
    </div>
</div>
@endsection