<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project; 
class PublicController extends Controller
{
    public function index(Request $request) {
        $query = Project::with('category');
        
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        
        $projects = $query->paginate(9);
        return view('welcome', compact('projects')); // This uses your welcome.blade.php
    }
}
