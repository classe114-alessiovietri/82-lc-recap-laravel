@extends('layouts.app')

@section('page-title', $post->title)

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        {{ $post->title }}
                    </h1>

                    <p>
                        {{ $post->content }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
