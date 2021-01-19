@extends('layouts.app') {{-- . same as /, just different notation --}}

@section('content')
<div class="flex justify-center">
    <div
        class="w-full bg-white p-3 sm:p-6 sm:rounded-lg md:max-w-screen-md xl:max-w-screen-lg dark:text-white dark:bg-transparent dark:border-solid border border-white border-opacity-40">
        <h1 class="text-lg underline text-center"><b>{{ $user->username }}</b> posts</h1>
        <div>
            <img class="border-2 border-gray-300 rounded-lg w-40 h-40 m-auto my-3 object-cover dark:border-transparent" src="{{ $user->getAvatar() }}" alt="{{ $user->username }}s avatar">
        </div>

        @if ($posts->count()) 
            <p class="text-center"> {{ $user->name }} has {{ $posts->total() }} {{ Str::plural('post', $posts->total())}} 
                and {{ $user->receivedLikes->count() }} karma</p>
                @foreach ($posts as $post)
                    <x-post :post="$post" />
                @endforeach

                {{ $posts->links() }} {{-- Included tailwind view --}}
        @else
        <p class="text-center">{{ $user->name }} hasn't posted anything yet.</p>
        @endif
    </div>
</div>
@endsection