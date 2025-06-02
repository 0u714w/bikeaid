<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BikeAid - Your Cycling Companion</title>
    <meta property="og:title" content="BikeAid - Your Cycling Companion">
    <meta property="og:description" content="BikeAid helps cyclists with tools, routes, and community support.">
    <meta property="og:url" content="https://bikeaid.co">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('images/preview.jpg') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
