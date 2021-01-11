@extends('layouts.app') {{-- . same as /, just different notation --}}

@section('content')
<div class="flex justify-center">
    <div
        class="w-10/12 bg-white p-3 sm:p-6 sm:rounded-lg md:max-w-screen-md xl:max-w-screen-lg dark:text-white dark:bg-transparent dark:border-solid border border-white border-opacity-40">
        <h1 class="text-lg underline"><b>{{ $user->username }}</b> posts</h1>
        <div>
            <img src="{{ $user->getAvatar() }}" alt="{{ $user->username }}s avatar">
        </div>

        @if ($posts->count()) 
            <p> {{ $user->name }} has {{ $posts->total() }} {{ Str::plural('post', $posts->total())}} 
                and {{ $user->receivedLikes->count() }} karma</p>
                @foreach ($posts as $post)
                    <x-post :post="$post" />
                @endforeach

                {{ $posts->links() }} {{-- Included tailwind view --}}
        @else
        <p>{{ $user->name }} hasn't posted anything yet.</p>
        @endif
    </div>
</div>
@endsection