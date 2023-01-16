<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Ekka - Admin Dashboard HTML Template.">
    @include('includeUser.linkCss')
    @yield('css')
    <title>@yield('title')

    </title>
</head>
<body class="shop_page">
    @include('includeUser.navbar')
    @include('includeUser.cart')
    @include('includeUser.slidebar')
    @yield('content')
    @include('includeUser.footer')
@include('includeUser.linkJs')
@yield('js')
</body>
</html>
