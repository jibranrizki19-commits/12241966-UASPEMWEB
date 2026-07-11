@extends('layouts.app')

@section('title','Data Anggota')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">

    <h3 class="mb-0">Data Anggota</h3>

    <form action="{{ route('anggota.index') }}"

          method="GET"

          class="d-flex"

          style="width: 45%;">

        <input type="text"

               name="search"

               value="{{ $search }}"

               class="form-control me-2"

               placeholder="Cari nama, email, atau nomor HP">

        <button type="submit" class="btn btn-primary">

            Cari

        </button>

        <a href="{{ route('anggota.index') }}"

           class="btn btn-secondary ms-2">

            Reset

        </a>

    </form>

    <a href="{{ route('anggota.create') }}"

       class="btn btn-success">

        + Tambah Anggota

    </a>

</div>

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>No</th>
<th>Nama</th>
<th>Alamat</th>
<th>No HP</th>
<th>Email</th>
<th width="180">Aksi</th>

</tr>

</thead>

<tbody>

@forelse($anggotas as $anggota)

<tr>

<td>{{ ($anggotas->currentPage() - 1) * $anggotas->perPage() + $loop->iteration }}</td>

<td>{{ $anggota->nama }}</td>

<td>{{ $anggota->alamat }}</td>

<td>{{ $anggota->no_hp }}</td>

<td>{{ $anggota->email }}</td>

<td>

<a href="{{ route('anggota.edit',$anggota->id) }}"
class="btn btn-warning btn-sm">

Edit

</a>

<form
action="{{ route('anggota.destroy',$anggota->id) }}"
method="POST"
style="display:inline;">

@csrf
@method('DELETE')

<button
class="btn btn-danger btn-sm"
onclick="return confirm('Hapus anggota ini?')">

Hapus

</button>

</form>

</td>

</tr>

@empty

<tr>

<td colspan="6" class="text-center">

Belum ada data anggota

</td>

</tr>

@endforelse

</tbody>

</table>

<div class="mt-3">

{{ $anggotas->links() }}

</div>

@endsection