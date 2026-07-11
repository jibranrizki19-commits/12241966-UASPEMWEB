@extends('layouts.app')

@section('title','Edit Buku')

@section('content')

<h3 class="mb-4">Edit Buku</h3>

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('buku.update', $buku->id) }}" method="POST">
    @csrf
    @method('PUT')

    @include('buku.form')

</form>

@endsection