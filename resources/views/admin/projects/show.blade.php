@extends('layouts.admin')
@section('content')
    <section class="container mt-5">
        <h2 class="sec-col text-sha">{{ $project->title }}</h2>
        <div class="row" class="height-row border">
            <div class=" mt-5 col-12 col-lg-6 d-flex flex-column justify-content-between ">
                <section id="show-body">
                    <p class="text-white fw-bold">{!! $project->body !!}</p>
                    <h4 class="d-inline fw-bold">Type: </h4>
                    <a href="{{ route('admin.categories.show', $project->category->slug) }}"
                        class="badge rounded-pill prim-bg mx-2 box-s fs-5">{{ $project->category ? $project->category->name : 'Uncategorized' }}</a>
                    {{-- tecnologie --}}
                    <div class="my-3">
                        <h4 class="d-inline fw-bold">Technologies:</h4>
                        @foreach ($project->technologies as $tech)
                            <a href="{{ route('admin.technologies.show', $tech->slug) }}"
                                class="badge rounded-pill sec-bg fs-4 box-s text-black mx-2 ">{{ $tech->name }}</a>
                        @endforeach
                    </div>
                </section>
                {{-- URL GITHUB --}}
                <h6><a href="{{ $project->url }}" class="sec-col fs-2 ">Github</a></h6>
                {{-- BUTTONS --}}
                <div class="buttons mt-5">
                    <button class="btnnn btnnn-edit  d-inline-block">
                        <a class=" text-decoration-none" href="{{ route('admin.projects.edit', $project->slug) }}">Edit</a>
                    </button>
                    <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btnnn btnnn-delete cancel-button mx-3">Delete</button>
                    </form>
                </div>
            </div>

            {{--  --}}
            <section id="show-images" class="col-12 col-lg-6">
                <div class="box-image">
                    <img class="" src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                </div>
                @if ($project->gif)
                    <div class="box-image mt-4">
                        <img class="" src="{{ asset('storage/' . $project->gif) }}" alt="{{ $project->title }}">
                    </div>
                @endif
            </section>
    </section>
    </div>
    </div>


    @include('partials.modal_delete')
@endsection
