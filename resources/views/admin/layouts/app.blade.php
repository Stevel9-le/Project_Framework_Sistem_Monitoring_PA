<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Dashboard')</title>

    <link rel="stylesheet" href="{{ asset('assets-admin/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/css/app.css') }}">
</head>

<body>
<div id="app">

    @include('admin.layouts.sidebar')

    <div id="main">
        @include('admin.layouts.header')

        <div class="page-content">
            @yield('content')
        </div>

        @include('admin.layouts.footer')
    </div>

</div>

@include('admin.layouts.script')
</body>
</html>
