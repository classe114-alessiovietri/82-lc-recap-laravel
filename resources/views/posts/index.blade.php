@extends('layouts.guest')

@section('page-title', 'I nostri articoli')

@section('main-content')
    <div class="row">
        <div class="col-12 mb-4">
            <h1 class="text-center text-primary">
                I nostri articoli
            </h1>

            @if ($stringaSalutaUtente != null)
                <h3 class="text-success">
                    {{ $stringaSalutaUtente }}
                </h3>
            @endif
        </div>

        @foreach ($posts as $post)
            <div class="col-12 col-xs-6 col-sm-4 col-md-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h4>
                            {{ $post->title }}
                        </h4>

                        <a href="{{ route('posts.show', ['post' => $post->slug]) }}" class="btn btn-primary">
                            Leggi tutto
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
