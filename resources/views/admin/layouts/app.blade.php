<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Dashboard')</title>

    <link rel="stylesheet" href="{{ asset('assets-admin/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/css/app.css') }}">
</head>

<body>
<div id="app">

    {{-- SIDEBAR --}}
    @include('admin.layouts.sidebar')

    {{-- MAIN --}}
    <div id="main">
        @include('admin.layouts.header')

        <div class="page-content">
            @yield('content')
        </div>

        @include('admin.layouts.footer')
    </div>

</div>

<script src="{{ asset('assets-admin/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets-admin/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets-admin/js/main.js') }}"></script>
</body>
</html>
