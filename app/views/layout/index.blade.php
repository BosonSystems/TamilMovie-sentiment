<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Market</title>
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/layout.css') }}" rel="stylesheet">
    <script src="{{ URL::asset('js/jquery-1.10.2.js') }}"></script>
</head>

<body>
<div id="wrapper">
<!--    <div id="menu">-->
<!--        <a href="{{url('/market/top')}}">Top</a>-->
<!--        |-->
<!--        <a href="{{url('/market/top1')}}">Top(+)</a>-->
<!--        |-->
<!--        <a href="{{url('/market/lasttop')}}">Last Day Top</a>-->
<!--    </div>-->
    @yield('content');
</div>

<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
