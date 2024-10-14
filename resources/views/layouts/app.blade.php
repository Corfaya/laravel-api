<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="http://www.yoursite.com/favicon.ico?v=<?php echo time() ?>" />
    <title>Laravel auth</title>
    @vite(['resources/js/app.js'])
</head>
<body>
    @include('partials.header')
    <main>
        <div id="sidebar">
            @include('partials.sidebar')
        </div>
        <div id="content">
            @yield('content')
        </div>

    </main>
</body>
</html>