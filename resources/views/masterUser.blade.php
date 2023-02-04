<!DOCTYPE html>
<html lang="en">
<head>
    @include('includeUser.linkCss')

    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="keywords" content="apparel, catalog, clean, ecommerce, ecommerce HTML, electronics, fashion, html eCommerce, html store, minimal, multipurpose, multipurpose ecommerce, online store, responsive ecommerce template, shops" />
    <meta name="description" content="Best ecommerce html template for single and multi vendor store.">
    <meta name="author" content="ashishmaraviya">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
</head>
<body class="@yield('class')">'
    @include('includeUser.tools')
    <div id="ec-overlay"><span class="loader_img"></span></div>
    @include('includeUser.navbar')
    @include('includeUser.cart')
    {{-- @include('includeUser.slidebar') --}}
    @yield('content')
    @include('includeUser.footer')
    @include('includeUser.footerNevigation')

    @include('includeUser.modal')



@include('includeUser.linkJs')
@yield('js')

</body>
</html>
