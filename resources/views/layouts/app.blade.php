<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hacker News</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>

        // console.log(window.Vue)
        // console.log('hhhdshfhdf')

        // Making user data accessible to vue by adding them to the global window object 
        window.hackernews = {
            url: '{{ 'config(app.url)' }}',
            user: {
                id: {{ Auth::check() ? Auth::user()->id : 'null' }},
                authenticated: {{ Auth::check() ? 'true' : 'false' }}
            }
        }
    </script>
</head>

<body class="bg-gray-200 dark:bg-black-gh-bg">
    <nav class="bg-hacker-orange dark:bg-dark-gh-banner flex flex-wrap p-4 sm:flex-nowrap sm:justify-between">
        <ul class="flex items-center">
            <li>
                <a href="{{ route('home') }}" class="navbar-link dark:text-white">Home</a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}" class="navbar-link dark:text-white">Settings</a>
            </li>
            <li>
                <a href="{{ route('posts') }}" class="navbar-link dark:text-white">Posts</a>
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
                    <a href="{{ route('users.posts', auth()->user()) }}" class="navbar-link dark:text-white">{{ auth()->user()->name }}</a>
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
    <script src="/js/app.js"></script>
</body>

</html>