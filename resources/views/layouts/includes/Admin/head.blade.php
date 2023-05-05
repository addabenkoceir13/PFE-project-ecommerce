<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    {{-- Style Link Bootstrap and Icon Sidebar  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('bootstrap513/css/bootstrap.min.css')}}">
    {{-- Path CSS Sidebar --}}
    <link rel="stylesheet" href="{{asset('admin-css/css/styles.css')}}">
    {{-- cnd sweet alert style --}}
    <link rel="stylesheet" href="{{ asset('sweetalert/sweetalert2.min.css') }}" integrity="sha256-sWZjHQiY9fvheUAOoxrszw9Wphl3zqfVaz1kZKEvot8=" crossorigin="anonymous">

    {{-- Title Page --}}
    <title>@yield('title', 'Unknow Title')</title>
</head>
