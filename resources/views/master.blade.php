<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Moul&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Battambang&family=Koulen&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css\style.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome-free-5.13.0-web/css/all.min.css')}}">
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <title>@yield("title")</title>
</head>
<body>
    @include('include.header')
    @section('body')
    @show
    <script src="{{asset('js/js.js')}}"></script>
    @section('script')
    @show

</body>
</html>