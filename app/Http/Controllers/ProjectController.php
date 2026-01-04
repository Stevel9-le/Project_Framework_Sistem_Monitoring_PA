<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Wajib import ini

class ProjectController extends Controller
{
    public function index()
    {
        // Eager load relasi agar query ringan
        $projects = Project::with(['category', 'user'])->latest()->paginate(10);

        // LOGIKA PEMBEDAAN TAMPILAN (Admin vs Staff)
        if (auth()->user()->hasRole('staff')) {
            // Jika Staff, load tampilan CARD
            return view('admin.project.index_staff', compact('projects'));
        }

        // Jika Admin, load tampilan TABLE
        return view('admin.project.index', compact('projects'));
    }

    public function create()
    {
        $categories = Category::all();
        // Ambil user yang role-nya staff untuk assign project
        // Asumsi kamu menggunakan Spatie, cara ambil usernya:
        $users = User::role('staff')->get(); 

        return view('admin.project.create', compact('categories', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'user_id' => 'required',
            'status' => 'required',
            'file' => 'nullable|mimes:pdf,doc,docx,jpg,png|max:2048' // Validasi File
        ]);

        $data = $request->all();

        // Logika Upload File
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/projects', $filename); // Simpan di storage/app/public/projects
            $data['file_path'] = $filename;
        }

        Project::create($data);

        return redirect()->route('admin.project.index')
            ->with('success', 'Project berhasil ditambahkan');
    }

    public function edit(Project $project)
    {
        $categories = Category::all();
        $users = User::role('staff')->get();

        return view('admin.project.edit', compact('project', 'categories', 'users'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'user_id' => 'required',
            'status' => 'required',
            'file' => 'nullable|mimes:pdf,doc,docx,jpg,png|max:2048'
        ]);

        $data = $request->all();

        // Logika Update File
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($project->file_path && Storage::exists('public/projects/' . $project->file_path)) {
                Storage::delete('public/projects/' . $project->file_path);
            }

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/projects', $filename);
            $data['file_path'] = $filename;
        }

        $project->update($data);

        return redirect()->route('admin.project.index')
            ->with('success', 'Project berhasil diperbarui');
    }

    public function destroy(Project $project)
    {
        // Hapus file saat data dihapus
        if ($project->file_path && Storage::exists('public/projects/' . $project->file_path)) {
            Storage::delete('public/projects/' . $project->file_path);
        }
        
        $project->delete();

        return redirect()->route('admin.project.index')
            ->with('success', 'Project berhasil dihapus');
    }
}