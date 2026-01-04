<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistem Monitoring</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets-admin/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets-admin/vendors/iconly/bold.css')}}">
    <link rel="stylesheet" href="{{asset('assets-admin/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets-admin/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets-admin/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('assets-admin/images/favicon.svg')}}" type="image/x-icon">
</head>

<body>
    <div id="app">
        @include('admin.layouts.sidebar')

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Dashboard Statistik</h3>
            </div>
            
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="bi bi-briefcase-fill"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Total Project</h6>
                                                <h6 class="font-extrabold mb-0">{{ $totalProjects ?? 0 }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="bi bi-hourglass-split"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Sedang Berjalan</h6>
                                                <h6 class="font-extrabold mb-0">{{ $ongoingProjects ?? 0 }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="bi bi-check-circle-fill"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Selesai</h6>
                                                <h6 class="font-extrabold mb-0">{{ $doneProjects ?? 0 }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                    <i class="bi bi-people-fill"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Total Staff</h6>
                                                <h6 class="font-extrabold mb-0">{{ $totalStaff ?? 0 }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Selamat Datang, {{ auth()->user()->name }}!</h4>
                                    </div>
                                    <div class="card-body">
                                        <p>Anda login sebagai <strong>{{ ucfirst(auth()->user()->getRoleNames()->first()) }}</strong>.</p>
                                        <p>Gunakan menu di samping untuk mengelola data project.</p>
                                        @role('admin')
                                            <a href="{{ route('admin.project.create') }}" class="btn btn-primary">Buat Project Baru</a>
                                        @endrole
                                        @role('staff')
                                            <a href="{{ route('admin.project.index') }}" class="btn btn-primary">Lihat Project Saya</a>
                                        @endrole
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-body py-4 px-5">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="{{asset('assets-admin/images/faces/1.jpg')}}" alt="Face 1">
                                    </div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold">{{ auth()->user()->name }}</h5>
                                        <h6 class="text-muted mb-0">{{ auth()->user()->email }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            </div>

            @include('admin.layouts.footer')
        </div>
    </div>

    <script src="{{asset('assets-admin/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets-admin/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets-admin/js/main.js')}}"></script>
</body>

</html>