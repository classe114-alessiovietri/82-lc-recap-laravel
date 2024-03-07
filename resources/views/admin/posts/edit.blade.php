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
                Torna all'index delle paste
            </a>
        </div>

        <form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="POST">
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
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" placeholder="Inserisci il titolo..." maxlength="255" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Contenuto <span class="text-danger">*</span></label>
                <textarea class="form-control" id="content" name="content" rows="3" placeholder="Inserisci il contenuto..." maxlength="10000" required>{{ old('content', $post->content) }}</textarea>
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
