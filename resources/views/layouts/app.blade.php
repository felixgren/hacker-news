<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hacker News</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-200">
    <nav class="bg-hacker-orange flex flex-wrap sm:flex-nowrap sm:justify-between p-2 mb-6">
        <ul class="flex items-center">
            <li>
                <a href="" class="text-sm pr-3 sm:text-base sm:p-3">Home</a>
            </li>
            <li>
                <a href="" class="text-sm pr-3 sm:text-base sm:p-3">Comments</a>
            </li>
        </ul>

        <h1 class="font-mono font-bold order-first sm:order-none w-full sm:w-auto sm:text-xl">Hacker News</h1>

        <ul class="flex items-center">
            <li>
                <a href="" class="text-sm pr-3 sm:text-base sm:p-3">Login</a> {{-- Login / Username --}}
            </li>
            <li>
                <a href="" class="text-sm pr-3 sm:text-base sm:p-3">Register</a> {{-- Register / Logout --}}
            </li>
        </ul>
    </nav>
    @yield('content')
</body>

</html>