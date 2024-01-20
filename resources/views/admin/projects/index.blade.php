@extends('layouts.admin')
@section('content')
    <section class="container mt-5">
        <h2 class="fs-1 sec-col">Projects</h2>

        @if (!empty(session('message')))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <table class="table table-striped mt-5 ">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Title</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <th scope="row">
                            <a href="{{ route('admin.projects.show', $project->slug) }}">
                                <i class="fa-regular fa-eye sec-col pt-3"></i>
                            </a>
                        </th>
                        <td class="text-white fw-bold text-sha fs-3"> {{ $project->title }}</td>
                        <td> <a href="{{ route('admin.projects.edit', $project->slug) }}"><i
                                    class="fa-solid fa-pen-to-square sec-col fs-3 pt-2"></i></a>
                            <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn cancel-button"><i
                                        class="fa-solid fa-trash fs-3 mb-2 sec-col "></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button class="btn btn-primary mt-3">
            <a class="text-white text-decoration-none" href="{{ route('admin.projects.create') }}">Create</a>
        </button>
    </section>
    @include('partials.modal_delete')
@endsection
