<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--<link rel="shortcut icon" type="image/png" href="{{   }}"/>--}}

    <title>@yield('title', 'Administración')</title>
    <!-- Stylesheets -->
    @include('templates.global_css')
    @stack('css')
</head>
<body>
<div id="wrapper" class="wrapper">
    @include('components.navbar')
    @yield('content')
    @include('components.footer')
</div>
<!-- Javascript -->
@include('templates.global_js')
@stack('scripts')
</body>
</html>