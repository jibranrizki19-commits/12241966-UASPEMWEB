@extends('layouts.app')

@section('title','Data Peminjaman')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">

    <h3 class="mb-0">Data Peminjaman</h3>

    <form action="{{ route('peminjaman.index') }}"

          method="GET"

          class="d-flex"

          style="width: 45%;">

        <input type="text"

               name="search"

               value="{{ $search }}"

               class="form-control me-2"

               placeholder="Cari nama anggota atau judul buku">

        <button type="submit" class="btn btn-primary">

            Cari

        </button>

        <a href="{{ route('peminjaman.index') }}"

           class="btn btn-secondary ms-2">

            Reset

        </a>

    </form>

    <a href="{{ route('peminjaman.create') }}"

       class="btn btn-success">

        + Tambah Peminjaman

    </a>

</div>

@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif

@if(session('error'))

<div class="alert alert-danger">

{{ session('error') }}

</div>

@endif

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>No</th>
<th>Anggota</th>
<th>Buku</th>
<th>Tgl Pinjam</th>
<th>Tgl Kembali</th>
<th>Status</th>
<th>Aksi</th>

</tr>

</thead>

<tbody>

@forelse($peminjamans as $peminjaman)

<tr>

<td>{{ ($peminjamans->currentPage() - 1) * $peminjamans->perPage() + $loop->iteration }}</td>

<td>{{ $peminjaman->anggota->nama }}</td>

<td>{{ $peminjaman->buku->judul }}</td>

<td>{{ $peminjaman->tgl_pinjam }}</td>

<td>{{ $peminjaman->tgl_kembali ?? '-' }}</td>

<td>

@if($peminjaman->status=='Dipinjam')

<span class="badge bg-warning">

Dipinjam

</span>

@else

<span class="badge bg-success">

Dikembalikan

</span>

@endif

</td>

<td>

<a
href="{{ route('peminjaman.edit',$peminjaman->id) }}"
class="btn btn-warning btn-sm">

Edit

</a>

<form
action="{{ route('peminjaman.destroy',$peminjaman->id) }}"
method="POST"
style="display:inline;">

@csrf
@method('DELETE')

<button
class="btn btn-danger btn-sm"
onclick="return confirm('Hapus data?')">

Hapus

</button>

</form>

</td>

</tr>

@empty

<tr>

<td colspan="7" class="text-center">

Belum ada data peminjaman

</td>

</tr>

@endforelse

</tbody>

</table>

<div class="mt-3">

{{ $peminjamans->links() }}

</div>

@endsection