@extends('layouts.app')

@section('page-title', $tag->title.' Edit')

@section('main-content')
<h1>
    {{ $tag->title }} Edit
</h1>

<div class="row">
    <div class="col py-4">
        <div class="mb-4">
            <a href="{{ route('admin.tags.index') }}" class="btn btn-primary">
                Torna all'index delle categorie
            </a>
        </div>

        <form action="{{ route('admin.tags.update', ['tag' => $tag->id]) }}" method="POST">
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
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $tag->title) }}" placeholder="Inserisci il titolo..." maxlength="255" required>
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
