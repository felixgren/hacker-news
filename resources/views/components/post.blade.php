@props(['post' => $post])

<div class="bg-gray-200 my-2 p-1 dark:bg-transparent dark:border-solid border border-white border-opacity-40">
    <div class="flex justify-between">
        <div class="">
            <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a>
            <span>says...</span>
        </div>
        <span class="text-xs">{{ $post->created_at->diffForHumans()}}</span> {{-- Carbon PHP API is used for DateTime --}}
    </div>

    <p>{{ $post->body}}</p>

    <div class="flex flex-wrap items-center">
    @auth
        @can('update', $post)
        <div class="w-full flex ">
            <form action="{{ route('posts.edit', $post) }}" method="post" class="mt-2">
                @csrf
                @method('PATCH')
                <div>
                    <label for="edit body" class="sr-only">Edit comment</label>
                    <textarea name="body" id="body" cols="30" rows="1" class="bg-transparent
                    border-2 border-gray-300 w-full p-2 rounded-sm text-opacity-50 @error('body') border-red-500 @enderror"
                    placeholder="Edit comment">{{ $post->body }}</textarea>

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