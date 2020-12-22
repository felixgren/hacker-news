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
                <a href="" class="navbar-link dark:text-white">Home</a>
            </li>
            <li>
                <a href="" class="navbar-link dark:text-white">Comments</a>
            </li>
        </ul>

        <h1 class="font-mono font-bold order-first w-full sm:order-none sm:w-auto sm:text-xl dark:text-white">Hacker News</h1>

        <ul class="flex items-center">
            <li>
                <a href="" class="navbar-link dark:text-white">Login</a> {{-- Login / Username --}}
            </li>
            <li>
                <a href="" class="navbar-link dark:text-white">Register</a> {{-- Register / Logout --}}
            </li>
        </ul>
    </nav>
    @yield('content')
</body>

</html>