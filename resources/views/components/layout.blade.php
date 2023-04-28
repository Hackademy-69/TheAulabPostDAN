<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <title>The Aulab Post</title>
</head>
<body class="bg-main">

    <x-navbar />
    <x-pages.header headerTitle={{$headerTitle}} />   

    {{ $slot }}

    <x-footer />

    <script src="{{asset('js/app.js')}}"></script>
    
</body>
</html>