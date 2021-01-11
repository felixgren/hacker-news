@props(['post' => $post])

<div class="bg-gray-200 my-2 p-1 dark:bg-transparent dark:border-solid border border-white border-opacity-40">
    <div class="flex justify-between">
        <div class="text-xs">
            <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a>
            <span>says...</span>
        </div>
        <span class="text-xs">{{ $post->created_at->diffForHumans()}}</span> {{-- Carbon PHP API is used for DateTime --}}
    </div>

    <div>
        <a href="{{ route('posts.show', $post) }}"><b>title: {{ $post->title}}</b></a>
        <p>{{ $post->body }}</p>
        <a href="{{ $post->link }}">{{ $post->link }}</a>
    </div>

    <div class="flex flex-wrap items-center">
    @auth
        @can('update', $post)
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