@extends('layouts.admin')
@section('content')
    <section class="container mt-5">
        <h1>{{ $technology->name }}</h1>
        <ul class="mt-5">
            @foreach ($technology->projects as $project)
                <li class="list-unstyled border-bottom pb-2 d-flex align-items-center ">
                    <div id="circle-image">
                        <a href="{{ route('admin.projects.show', $project->slug) }}">
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                        </a>
                    </div>
                    <a href="{{ route('admin.projects.show', $project->slug) }}" class="mx-3">{{ $project->title }}</a>
                </li>
            @endforeach
        </ul>
    </section>
@endsection
