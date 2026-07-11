@extends('layouts.app')

@section('title','Tambah Anggota')

@section('content')

<h3 class="mb-4">
    Tambah Anggota
</h3>

@if($errors->any())

<div class="alert alert-danger">

    <ul>

        @foreach($errors->all() as $error)

        <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

<form action="{{ route('anggota.store') }}" method="POST">

    @csrf

    @include('anggota.form')

</form>

@endsection