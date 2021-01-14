@extends('layouts.app') {{-- . same as /, just different notation --}}

@section('content')
<div class="flex justify-center">
    <div class="w-10/12 bg-white p-3 sm:p-6 sm:rounded-lg md:max-w-screen-md xl:max-w-screen-lg dark:text-white dark:bg-transparent dark:border-solid border border-white border-opacity-40">
        <x-post :post="$post"/>

        @can('update', $post)
        <div class="w-full flex ">
            <form action="{{ route('posts.edit', $post) }}" method="post" class="mt-2">
                @csrf
                @method('PATCH')
                <div>
                    <label for="edit body" class="sr-only">Edit body</label>
                    <textarea name="body" id="body" cols="30" rows="1" class="bg-transparent
                    border-2 border-gray-300 w-full p-2 rounded-sm text-opacity-50 @error('body') border-red-500 @enderror"
                    placeholder="Edit text">{{ $post->body }}</textarea>

                    @error('body') 
                        <div class="text-red-500 mt-1 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-hacker-orange text-white py-1 mt-1 rounded-sm w-1/4 dark:bg-dark-gh-btn">Edit</button>
                </div>
            </form>
        </div>
        @endcan

        <div id="app">
            {{-- Pass in post id as prop --}}
            <post-comments post-id={{ $post->id }}></post-comments>
        </div>
        
    </div>
</div>
@endsection