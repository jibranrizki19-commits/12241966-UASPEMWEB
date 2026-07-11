@extends('layouts.app')

@section('title','Edit Peminjaman')

@section('content')

<h3 class="mb-4">

Edit Peminjaman

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
action="{{ route('peminjaman.update',$peminjaman->id) }}"
method="POST">

@csrf
@method('PUT')

@include('peminjaman.form')

</form>

@endsection