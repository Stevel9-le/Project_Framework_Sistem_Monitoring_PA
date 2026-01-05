<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // GUEST (belum login)
        if (!Auth::check()) {
            return view('guest.dashboard');
        }

        // ADMIN
        if (auth()->user()->hasRole('admin')) {
            return view('admin.dashboard');
        }

        // STAFF
        if (auth()->user()->hasRole('staff')) {
            return view('admin.dashboard');
        }

        abort(403);
    }
}
