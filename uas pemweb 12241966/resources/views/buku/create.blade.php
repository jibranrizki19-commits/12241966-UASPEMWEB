@extends('layouts.app')

@section('title','Tambah Buku')

@section('content')

<h3 class="mb-4">Tambah Buku</h3>

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('buku.store') }}" method="POST">
    @csrf

    @include('buku.form')

</form>

@endsection