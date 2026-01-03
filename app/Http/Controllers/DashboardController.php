<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function public()
    {
        return view('admin.dashboard', [
            'mode' => 'guest'
        ]);
    }

    public function admin()
    {
        return view('admin.dashboard', [
            'mode' => 'admin'
        ]);
    }
}
