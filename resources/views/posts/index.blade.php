{{-- List of posts go here --}}
@extends('layouts.app') {{-- . same as /, just different notation --}}

@section('content')
<div class="flex justify-center">
    <div class="w-full bg-white p-2 sm:p-6 sm:rounded-lg md:max-w-screen-md xl:max-w-screen-lg dark:text-white dark:bg-black-gh-bg border border-white border-opacity-40">
        @auth
            <p class="pl-2 pt-4">Add post</p>
            <form action="{{ route('posts') }}" method="post" class="mt-2 px-2 dark:text-white">
                @csrf
                <div>
                    <div>
                        <label for="title" class="sr-only">Post title</label>
                        <input 
                            type="text" 
                            name="title" 
                            id="title" 
                            class="bg-gray-100 border border-solid border-gray-300 w-full mt-2 p-2 rounded-sm @error('body') border-red-500 @enderror dark:border-gray-400 dark:bg-transparent" 
                            placeholder="Title"
                        />

                        @error('title')
                        <div class="text-red-500 mt-1 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label for="link" class="sr-only">Post link</label>
                        <input 
                            type="url" 
                            name="link" 
                            id="link" 
                            class="bg-gray-100 border border-solid border-gray-300 w-full mt-2 p-2 rounded-sm @error('body') border-red-500 @enderror dark:border-gray-400 dark:bg-transparent" 
                            value="{{ old('link') }}" 
                            placeholder="Link (optional)"
                        />

                        @error('link') 
                        <div class="text-red-500 mt-1 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label for="body" class="sr-only">Post body</label>
                        <textarea 
                            name="body"
                            id="body"
                            placeholder="Content (optional)"
                            rows="4"
                            class="bg-gray-100 border border-solid border-gray-300 w-full mt-2 p-2 rounded-sm @error('body') border-red-500 @enderror dark:border-gray-400 dark:bg-transparent" 
                        >{{ old('body') }}</textarea>

                        @error('body') 
                        <div class="text-red-500 mt-1 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                
                <div>
                    <button type="submit" class="mt-2 bg-hacker-orange text-sm text-white text-semibold py-1 mt-1 rounded-sm w-1/4 opacity-90">POST</button>
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
                    <x-post :post="$post" />
                @endforeach

                {{ $posts->links() }} {{-- Included tailwind view --}}
        @else
        <p>Nope no posts up in here :(</p>
        @endif
        
    </div>
</div>
@endsection