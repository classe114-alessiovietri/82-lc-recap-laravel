@extends('layouts.app')

@section('page-title', $category->title)

@section('main-content')
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        {{ $category->title }}
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center text-success">
                        Tutti i post associati a questa categoria
                    </h2>

                    <ul>
                        @foreach ($category->posts as $post)
                            <li>
                                <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}">
                                    {{ $post->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
