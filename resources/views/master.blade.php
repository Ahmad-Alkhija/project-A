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
    @include('include.linkCss')
    @yield('css')
    <title>@yield('title') </title>
</head>
<body class="ec-header-fixed ec-sidebar-fixed ec-sidebar-dark ec-header-light" id="body">



    <div class="wrapper"> @include('include.rigthSlideBar') 	<div class="ec-page-wrapper"> @include('include.navbar')  <div class="ec-content-wrapper">	<div class="content">@yield('content')</div> </div></div></div>



@include('include.linkJs')
@yield('js')
</body>
</html>
