@extends('layouts.app') {{-- . same as /, just different notation --}}

@section('content')
<div class="flex justify-center">
    <div class="w-full bg-white px-2 sm:rounded-lg md:max-w-screen-md xl:max-w-screen-lg dark:text-white dark:bg-transparent dark:border-solid border border-white border-opacity-40">
        {{-- <x-post :post="$post"/> --}}
        {{-- Temporary styling fix --}}

        <div class="bg-gray-200 p-3 flex items-center my-3 rounded dark:bg-black-gh-bg dark:text-white">
            <div class="w-full max-w-xs-2">
        
                <div style="width: calc(100% - 46px);" class="absolute flex justify-between">
                    <a href="{{ route('users.posts', $post->user) }}">
                        <div class="text-xs">
                            <span class="text-xl text-gray-500 mr-1 font-semibold dark:text-gray-400">{{ $post->likes->count() }}</span>
                            <span>by</span>
                            <span class="font-bold text-hacker-orange">{{ $post->user->name }}</span>
                            @can('update', $post)
                                <span class="text-opacity-60 text-hacker-orange">(You)</span>
                            @endcan
                            <span class="text-gray-600 text-bold text-xs"> - {{ $post->created_at->diffForHumans()}}</span>
                        </div>
                    </a>
        
                    {{-- <div class="flex">
                        @auth
                        @can('update', $post)
                            <a href="{{ route('posts.show', $post) }}">
                                <div class="ml-2 mt-0.5 flex flex-wrap items-center">
                                    <div class="w-full">
                                        <p class="text-hacker-orange text-sm opacity-80"><i class="fas fa-edit fa-lg"></i></p>
                                    </div>
                                </div>
                            </a>
                        @endcan
                    </div> --}}
                </div>
        
                <div class="mt-8">
                    <strong><p>{{ $post->title}}</p></strong>
                    <p class="font-light mt-2">{{ $post->body }}</p>
                    <a href="{{ $post->link }}" class="text-gray-400 text-xs hover:underline dark:text-blue-400">{{ $post->link }}</a>
                </div>
                
                @if (!$post->LikedBy(auth()->user()))
                <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                    @csrf
                    <button type="submit" class="text-gray-500"><i class="fas fa-angle-double-up"></i> <span class="font-light">{{ $post->likes->count() }}</span> <span class="mt-3 text-gray-500 text-xs opacity-80">(Like)</button>
                </form>
                @else
                <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-hacker-orange"><i class="fas fa-angle-double-up text-lg"></i> <span class="font-light">{{ $post->likes->count() }}</span> <span class="mt-3 text-gray-500 text-xs opacity-80">(Unlike)</span></button>
                </form>
                @endauth
            </div>
        
            @if ($post->user->avatar_filename)
                <a href="{{ route('posts.show', $post) }}">
                    <img class="w-28 h-auto max-h-28 p-2 rounded-xl" src="{{ $post->user->getAvatar() }}" alt="{{ $post->user->username }}'s avatar">
                </a>
            @endif
        </div>
        {{-- Temporary styling fix end --}}

        @can('update', $post)
        <div class="p-3 pb-2">
            <p> Edit post content </p>
            <form action="{{ route('posts.edit', $post) }}" method="post" class="w-full mt-2">
                @csrf
                @method('PATCH')
                <label for="edit body" class="sr-only">Edit body</label>
                <textarea 
                    name="body" 
                    id="body" 
                    {{-- cols="100"  --}}
                    rows="3" 
                    class="bg-gray-100 border border-solid border-gray-300 w-full p-2 rounded-sm @error('body') border-red-500 @enderror dark:border-gray-400 dark:bg-transparent" 
                    placeholder="Edit text"
                >{{ $post->body }}</textarea>

            @error('body') 
                <div class="text-red-500 mt-1 text-sm">
                    {{ $message }}
                </div>
            @enderror

            <button type="submit" class="bg-hacker-orange text-white py-1 mt-1 rounded-sm w-1/4">Edit <i class="ml-1 fas fa-pen"></i></button>
        </form>
        </div>
        @endcan

        <div id="app">
            {{-- Pass in post id as prop --}}
            {{-- <post-comments post-id={{ $post->id }}></post-comments> --}}
        </div>
        
    </div>
</div>
@endsection