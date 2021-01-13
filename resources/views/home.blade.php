@extends('layouts.app') {{-- . same as /, just different notation --}}

@section('content')
<div class="flex justify-center">
    <div class="w-10/12 bg-white p-3 sm:p-6 sm:rounded-lg md:max-w-screen-md xl:max-w-screen-lg dark:text-white dark:bg-transparent dark:border-solid border border-white border-opacity-40">
        Sweet home alabama
        It's vue time!
        <div id="app">
            <hello-world> </hello-world> 
        </div>
    </div>
</div>
@endsection