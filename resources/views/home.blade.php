@extends('layouts.admin')
@section('content')
    <section class="container mt-5">
        <h1 class="sec-col mb-5">Home</h1>
        <a class="btnnn btnnn-edit text-black" href="{{ route('admin.projects.index') }}">Visualizza i Progetti</a>
    </section>
@endsection
