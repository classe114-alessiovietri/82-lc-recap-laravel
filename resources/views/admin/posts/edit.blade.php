@extends('layouts.app')

@section('page-title', $post->title.' Edit')

@section('main-content')
<h1>
    {{ $post->title }} Edit
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

        <form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="POST" enctype="multipart/form-data">
            {{--
                C   Cross
                S   Site
                R   Request
                F   Forgery
            --}}
            @csrf

            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Titolo <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" placeholder="Inserisci il titolo..." maxlength="255">
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Categoria</label>
                <select name="category_id" id="category_id" class="form-select">
                    <option
                        {{ old('category_id', $post->category_id) == null ? 'selected' : '' }}
                        value="">
                        Seleziona una categoria...
                    </option>
                    @foreach ($categories as $category)
                        <option
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                            value="{{ $category->id }}">
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="cover_img" class="form-label">Cover image</label>
                <input class="form-control" type="file" id="cover_img" name="cover_img">

                @if ($post->cover_img != null)
                    <div class="mt-2">
                        <h4>
                            Copertina attuale:
                        </h4>
                        <img src="/storage/{{ $post->cover_img }}" style="max-width: 400px;">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="delete_cover_img" name="delete_cover_img">
                            <label class="form-check-label" for="delete_cover_img">
                                Rimuovi immagine
                            </label>
                        </div>
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Contenuto <span class="text-danger">*</span></label>
                <textarea class="form-control" id="content" name="content" rows="3" placeholder="Inserisci il contenuto..." maxlength="10000" required>{{ old('content', $post->content) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Tag</label>

                <div>
                    @foreach ($tags as $tag)
                        <div class="form-check form-check-inline">
                            <input
                                {{-- Se c'è l'old, vuol dire che c'è stato un errore --}}
                                @if ($errors->any())
                                    {{-- Faccio le verifiche sull'old --}}
                                    {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}
                                @else
                                    {{-- Faccio le verifiche sulla collezione --}}
                                    {{ $post->tags->contains($tag->id) ? 'checked' : '' }}
                                @endif
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
                <button type="submit" class="btn btn-warning w-100">
                    Aggiorna
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
