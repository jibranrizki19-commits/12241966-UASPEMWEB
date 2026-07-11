@extends('layouts.app')

@section('title','Data Buku')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">

    <h3 class="mb-0">Data Buku</h3>

    <form action="{{ route('buku.index') }}"

          method="GET"

          class="d-flex"

          style="width: 45%;">

        <input type="text"

               name="search"

               value="{{ $search }}"

               class="form-control me-2"

               placeholder="Cari judul, penulis, atau kode buku">

        <button type="submit" class="btn btn-primary">

            Cari

        </button>

        <a href="{{ route('buku.index') }}"

           class="btn btn-secondary ms-2">

            Reset

        </a>

    </form>

    <a href="{{ route('buku.create') }}"

       class="btn btn-success">

        + Tambah Buku

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
            <th>Kode</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th width="100">Stok</th>
            <th width="180">Aksi</th>        
        </tr>

    </thead>

    <tbody>

    @forelse($bukus as $buku)

    <tr>

        <td>{{ ($bukus->currentPage() - 1) * $bukus->perPage() + $loop->iteration }}</td>

        <td>{{ $buku->kode_buku }}</td>

        <td>{{ $buku->judul }}</td>

        <td>{{ $buku->penulis }}</td>

        <td>{{ $buku->penerbit }}</td>

        <td>{{ $buku->tahun }}</td>

        <td>

            @if($buku->stok <= 5)

                <span class="badge bg-danger">{{ $buku->stok }}</span>

            @else

                <span class="badge bg-success">{{ $buku->stok }}</span>

            @endif

        </td>

        <td class="text-nowrap">

            <a href="{{ route('buku.edit',$buku->id) }}"

            class="btn btn-warning btn-sm me-1">

                Edit

            </a>

            <form action="{{ route('buku.destroy',$buku->id) }}"

                method="POST"

                style="display:inline;">

                @csrf

                @method('DELETE')

                <button class="btn btn-danger btn-sm"

                        onclick="return confirm('Hapus buku ini?')">

                    Hapus

                </button>

            </form>

        </td>

    </tr>

    @empty

    <tr>

        <td colspan="8" class="text-center">

            Belum ada data buku

        </td>

    </tr>

    @endforelse

    </tbody>
    

</table>

<div class="mt-3">
    {{ $bukus->links() }}
</div>

@endsection