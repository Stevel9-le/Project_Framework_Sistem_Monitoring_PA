<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Publik</title>
    <link rel="stylesheet" href="{{ asset('assets-admin/css/bootstrap.css') }}">
</head>
<body>

<nav class="navbar navbar-light bg-white shadow-sm px-4">
    <span class="navbar-brand">Monitoring Project</span>
    <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
</nav>

@yield('content')

</body>
</html>
