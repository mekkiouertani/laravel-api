@extends('layouts.admin')
@section('content')
    <section class="container mt-5 ">
        <h2 class="sec-col mb-3">Projects Create</h2>
        <form action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            {{-- TITLE --}}
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                    placeholder="name@example.com" required maxlength="200" minlength="3">
                <label for="floatingInput">Title</label>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- URL --}}
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('url') is-invalid @enderror" name="url" id="url"
                    placeholder="name@example.com">
                @error('url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="url">Link Github</label>
            </div>
            {{-- FORM GROUP --}}
            <div class="mb-3">
                <div class="form-group mt-5">
                    <h5>Select Technologies:</h5>
                    <div class="row mt-3">
                        @foreach ($technologies as $tech)
                            <div class="col"> <!-- Colonna per ogni checkbox -->
                                <div class="form-check @error('technologies') is-invalid @enderror">
                                    <input type="checkbox" class="form-check-input" name="technologies[]"
                                        value="{{ $tech->id }}"
                                        {{ in_array($tech->id, old('technologies', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label fw-bold ">
                                        {{ $tech->name }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @error('technologies')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- BODY --}}
            <div class="form-floating mb-3">
                <textarea class="form-control @error('body') is-invalid @enderror" placeholder="Leave a comment here" id="body"
                    style="height: 100px" name="body">
                    {{ old('body') }}
                </textarea>
                <label for="body">Description</label>
                @error('body')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- CATEGORIES --}}
            <div class="form-floating mb-3">
                <select type="text" class="form-control @error('category_id') is-invalid @enderror" name="category_id"
                    id="category_id" aria-label="Floating label select example">
                    <option value=""></option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <label for="category_id">Select a category</label>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- IMAGE --}}
            <div class="mb-3 d-flex align-items-center justify-content-between">
                <label for="image" class="fs-5 fw-semibold pb-1">Insert an image:</label>
                <input type="file" class="form-control  w-75 @error('image') is-invalid @enderror" name="image"
                    id="image" accept="image/*">
                <img id="uploadPreview" class="rounded" width="100" src="https://via.placeholder.com/300x200"
                    alt="preview">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- GIF --}}
            <div class="mb-3 d-flex align-items-center justify-content-between">
                <label for="gif" class="fs-5 fw-semibold w-10 pb-1">Insert a gif: </label>
                <input type="file" class="form-control mx-4 @error('gif') is-invalid @enderror" name="gif"
                    id="gif" accept="image/*">
                <img id="uploadPreview" class="" width="100" alt="">
                @error('gif')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- BUTTONS --}}
            <div class="mt-5">
                <button type="submit" class="btnnn btnnn-edit">Submit</button>
                <button type="reset" class="btnnn btnnn-delete mx-3">Reset</button>
            </div>
        </form>
    </section>
@endsection
