@extends('admin.layouts.app')

@section('content')
<h4>Data Kategori</h4>

<form method="POST" action="{{ route('admin.categories.store') }}" class="mb-3">
    @csrf
    <input type="text" name="name" class="form-control mb-2" placeholder="Nama kategori">
    <button class="btn btn-primary">Tambah</button>
</form>

<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <th>Aksi</th>
    </tr>
    @foreach($categories as $cat)
    <tr>
        <td>{{ $cat->name }}</td>
        <td>
            <form method="POST" action="{{ route('admin.categories.destroy', $cat->id) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $categories->links() }}
@endsection

