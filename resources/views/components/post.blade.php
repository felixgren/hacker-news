@props(['post' => $post])

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

            <div class="flex">
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
                @endauth
            </div>
        </div>

        <a href="{{ route('posts.show', $post) }}">
            <div class="mt-8">
                <strong><p>{{ $post->title}}</p></strong>
                <p class="text-gray-400 text-xs mt-2 dark:text-blue-300 mb-1">{{ $post->link }}</p>
            </div>
            
            @auth
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
            @endif
            @endauth
        </a>

        <div class="flex flex-wrap items-center">
            @auth
                @can('update', $post)
                <div class="w-full">
                    <form action="{{ route('posts.destroy', $post) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 text-sm">Delete</button>
                    </form>
                </div>
                @endcan
            @endauth
        </div>
    </div>

    @if ($post->user->avatar_filename)
        <a href="{{ route('posts.show', $post) }}">
            <img class="w-28 h-auto max-h-28 p-2 rounded-xl" src="{{ $post->user->getAvatar() }}" alt="{{ $post->user->username }}'s avatar">
        </a>
    @endif
</div>