@extends('layouts.admin')
@section('content')
    <section class="container">
        <h1>Edit {{ $project->title }} </h1>
        <form action="{{ route('admin.projects.update', $project->slug) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            {{-- TITLE --}}
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                    required value="{{ old('title', $project->title) }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- URL --}}
            <div class="mb-3">
                <label for="url">Link Github</label>
                <input type="text" class="form-control @error('url') is-invalid @enderror" name="url" id="url"
                    value="{{ old('url', $project->url) }}">
                @error('url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- FORM GROUP --}}
            <div class="mb-3">
                <div class="form-group">
                    <h6>Select Technologies</h6>
                    @foreach ($technologies as $tech)
                        <div class="form-check @error('technologies') is-invalid @enderror">
                            <input type="checkbox" class="form-check-input" name="technologies[]"
                                value="{{ $tech->id }}"
                                {{ in_array($tech->id, old('technologies', $project->technologies->pluck('id')->toArray())) ? 'checked' : '' }}>
                            <label class="form-check-label">
                                {{ $tech->name }}
                            </label>
                        </div>
                    @endforeach
                    @error('technologies')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- DESCRIPTION --}}
            <div class="mb-3">
                <label for="body">Body</label>
                <textarea type="text" class="form-control @error('body') is-invalid @enderror" name="body" id="body"
                    required>
                    {{ old('body', $project->body) }}
                </textarea>
                @error('body')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- CATEGORY --}}
            <div class="mb-3">
                <label for="category_id">Select Category</label>
                <select type="text" class="form-control @error('category_id') is-invalid @enderror" name="category_id"
                    id="category_id">
                    <option value="">Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $project->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            {{-- PREVIEW  --}}
            <div class="mt-5">
                <img id="uploadPreview" width="100"
                    src="{{ old('image', $project->image ? asset('storage/' . $project->image) : 'https://via.placeholder.com/300x200') }}"
                    alt="preview">
            </div>
            {{-- IMAGE --}}
            <div class="mb-3">
                <label for="image">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                    id="image" value="{{ old('image', $project->image) }}">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- GIF --}}
            <div class="mb-3">
                <label for="gif">GIF</label>
                <input type="file" class="form-control @error('gif') is-invalid @enderror" name="gif" id="gif"
                    accept="image/*">
                @error('gif')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- BUTTONS --}}
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </form>
    </section>
@endsection
