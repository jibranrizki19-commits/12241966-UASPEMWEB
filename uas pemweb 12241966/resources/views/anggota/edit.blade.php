@extends('layouts.app')

@section('title','Edit Anggota')

@section('content')

<h3 class="mb-4">
    Edit Anggota
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

<form action="{{ url('anggota/'.$anggota->id) }}" method="POST">
    @csrf
    @method('PUT')

    @include('anggota.form')

</form>

@endsection