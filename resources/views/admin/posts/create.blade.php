@extends('layouts.app')

@section('page-title', 'Posts Create')

@section('main-content')
<h1>
    Posts Create
</h1>

<div class="row">
    <div class="col py-4">
        <div class="mb-4">
            <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">
                Torna all'index dei post
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger mb-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            {{--
                C   Cross
                S   Site
                R   Request
                F   Forgery
            --}}
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Titolo <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Inserisci il titolo..." maxlength="255" required>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Categoria</label>
                <select name="category_id" id="category_id" class="form-select">
                    <option
                        value=""
                        {{ old('category_id') == null ? 'selected' : '' }}>
                        Seleziona una categoria...
                    </option>
                    @foreach ($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="cover_img" class="form-label">Cover image</label>
                <input class="form-control" type="file" id="cover_img" name="cover_img">
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Contenuto <span class="text-danger">*</span></label>
                <textarea class="form-control" id="content" name="content" rows="3" placeholder="Inserisci il contenuto..." maxlength="10000" required>{{ old('content') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Tag</label>

                <div>
                    @foreach ($tags as $tag)
                        <div class="form-check form-check-inline">
                            <input
                                {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}
                                class="form-check-input"
                                type="checkbox"
                                id="tag-{{ $tag->id }}"
                                name="tags[]"
                                value="{{ $tag->id }}">
                            <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->title }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-success w-100">
                    + Aggiungi
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
