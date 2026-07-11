@extends('layouts.app')

@section('title','Dashboard')

@section('content')

<div class="card mb-4">

    <div class="card-body">

        <form action="{{ route('buku.index') }}" method="GET" class="d-flex">

            <input type="text"

                   name="search"

                   class="form-control me-2"

                   placeholder="Cari judul, penulis, atau kode buku...">

            <button type="submit" class="btn btn-primary">

                Cari Buku

            </button>

        </form>

    </div>

</div>
<div class="row">

    <div class="col-md-3 mb-3">

        <div class="card bg-primary text-white">

            <div class="card-body">

                <h6>Total Buku</h6>

                <h2>{{ $totalBuku }}</h2>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-3">

        <div class="card bg-success text-white">

            <div class="card-body">

                <h6>Total Anggota</h6>

                <h2>{{ $totalAnggota }}</h2>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-3">

        <div class="card bg-warning text-white">

            <div class="card-body">

                <h6>Sedang Dipinjam</h6>

                <h2>{{ $bukuDipinjam }}</h2>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-3">

        <div class="card bg-dark text-white">

            <div class="card-body">

                <h6>Total Stok</h6>

                <h2>{{ $bukuTersedia }}</h2>

            </div>

        </div>

    </div>

</div>

@endsection