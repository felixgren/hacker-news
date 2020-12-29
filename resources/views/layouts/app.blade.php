<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hacker News</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-200 dark:bg-black-gh-bg">
    <nav class="bg-hacker-orange dark:bg-dark-gh-banner flex flex-wrap p-2 mb-6 sm:flex-nowrap sm:justify-between">
        <ul class="flex items-center">
            <li>
                <a href="{{ route('home') }}" class="navbar-link dark:text-white">Home</a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}" class="navbar-link dark:text-white">Dashboard</a>
            </li>
            <li>
                <a href="/posts" class="navbar-link dark:text-white">Posts</a>
            </li>
        </ul>

        <h1 class="font-mono font-bold order-first w-full sm:order-none sm:w-auto sm:text-xl dark:text-white">Hacker News</h1>

        <ul class="flex items-center">
            @guest
                <li>
                    <a href="{{ route('login') }}" class="navbar-link dark:text-white">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="navbar-link dark:text-white">Register</a>
                </li>
            @endguest

            @auth
                <li>
                    <a href="" class="navbar-link dark:text-white">{{ auth()->user()->name }}</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="post" class="inline navbar-link dark:text-white">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            @endauth
        </ul>
    </nav>
    @yield('content')
</body>

</html>