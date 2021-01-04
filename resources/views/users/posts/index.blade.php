@extends('layouts.app') {{-- . same as /, just different notation --}}

@section('content')
<div class="flex justify-center">
    <div
        class="w-10/12 bg-white p-3 sm:p-6 sm:rounded-lg md:max-w-screen-md xl:max-w-screen-lg dark:text-white dark:bg-transparent dark:border-solid border border-white border-opacity-40">
        {{ $user->name }}'s posts very fancy yes yes

        @if ($count = $posts->count())
        <p> We have {{$count}} posts!</p>
        @foreach ($posts as $post)
        <div class="bg-gray-200 my-2">
            <div class="flex justify-between">
                <div class="">
                    <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a>
                    <span>says...</span>
                </div>
                <span class="text-xs">{{ $post->created_at->diffForHumans()}}</span>
                {{-- Carbon PHP API is used for DateTime --}}
            </div>

            <p>{{ $post->body}}</p>

            <div class="flex flex-wrap items-center">
                @auth
                @can('delete', $post)
                <div class="w-full">
                    <form action="{{ route('posts.destroy', $post) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-blue-500 text-sm">Delete</button>
                    </form>
                </div>
                @endcan

                @if (!$post->LikedBy(auth()->user()))
                <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                    @csrf
                    <button type="submit" class="text-blue-500 text-sm">Like</button>
                </form>
                @else
                <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500 text-sm">Unlike</button>
                </form>
                @endif
                @endauth

                <span class="text-sm">{{ $post->likes->count() }}</span>
            </div>
        </div>
        @endforeach

        {{ $posts->links() }} {{-- Included tailwind view --}}
        @else
        <p>nope no posts up in here</p>
        @endif
    </div>
</div>
@endsection