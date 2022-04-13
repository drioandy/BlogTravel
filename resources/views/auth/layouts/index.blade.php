<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog Travel | @yield('title')</title>
   @include('auth.layouts.header')
</head>
<body class="hold-transition @yield('body-class')">
@yield('content')
<!-- /.login-box -->
@include('auth.layouts.script')
</body>
</html>
