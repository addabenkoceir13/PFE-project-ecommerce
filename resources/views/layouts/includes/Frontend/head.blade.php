<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- icon page  --}}
    <link rel="icon" type="image/png"  sizes="96X96" href="{{asset('assets/Frontend/icon/logo33.png')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Googlr Fonts famille -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ropa+Sans:ital@0;1&display=swap" rel="stylesheet">
    {{-- font famille 2 --}}
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    {{-- Style Link Bootstrap and Icon Sidebar  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('bootstrap513/css/bootstrap.min.css')}}">
    {{-- Path CSS Style --}}
    <link rel="stylesheet" href="{{ asset('front-css/css/style.css')}}">

    <link rel="stylesheet" href="{{ asset('front-css/css/custom.css')}}">
    {{-- Path css owl Carousel 2 --}}
    <link rel="stylesheet" href="{{ asset('owl/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owl/css/owl.theme.default.min.css') }}">

    {{-- jQ --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    {{-- cnd sweet alert style --}}
    <link rel="stylesheet" href="{{ asset('sweetalert/sweetalert2.min.css') }}" integrity="sha256-sWZjHQiY9fvheUAOoxrszw9Wphl3zqfVaz1kZKEvot8=" crossorigin="anonymous">
    {{-- Title Page --}}
    <title>@yield('title', 'Unknow Title')</title>

    <style>
        a{
            text-decoration: none !important;
        }
    </style>
</head>
