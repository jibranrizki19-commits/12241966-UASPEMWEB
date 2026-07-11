@extends('layouts.app')

@section('title','Tambah Peminjaman')

@section('content')

<h3 class="mb-4">

Tambah Peminjaman

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

<form
action="{{ route('peminjaman.store') }}"
method="POST">

@csrf

@include('peminjaman.form')

</form>

@endsection