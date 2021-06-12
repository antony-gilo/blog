<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body{
            background-color: #bdc7c9;
        }
        .mainbox {
        margin: auto;
        padding-top: auto;
        height: 600px;
        width: 600px;
        position: relative;
        top: 50%;
        }

        .err {
            color: #ffffff;
            font-family: 'Zilla Slab', serif;
            font-size: 11rem;
            position:absolute;
            left: 20%;
            top: 8%;
        }

        .farr {
        position: absolute;
        font-size: 8.5rem;
        left: 42%;
        top: 20%;
        color: #ffffff;
        }

        .err2 {
            color: #ffffff;
            font-family: 'Zilla Slab', serif;
            font-size: 11rem;
            position:absolute;
            left: 68%;
            top: 8%;
        }

        .msg {
            text-align: center;
            font-family: 'Zilla Slab', serif;
            font-size: 1.6rem;
            position:absolute;
            left: 16%;
            top: 45%;
            width: 75%;
        }

        a {
        text-decoration: none;
        color: blueviolet;
        }

        a:hover {
        text-decoration: underline;
        }

    </style>
</head>
<body>

    <div class="container">
        <div class="mainbox mt-auto text-center">
            <div class="err">4</div>
            <i class=" farr fas fa-question-circle fa-spin"></i>
            <div class="err2">4</div>
            <div class="msg">
                Maybe this page moved? Got deleted?<p>Let's go <a href="{{ route('admin.home') }}">home</a> and try from there.</p>
            </div>
        </div>
    </div>
</body>
</html>



