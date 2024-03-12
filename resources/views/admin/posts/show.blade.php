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
                    @if ($post->category != null)
                        <h2>
                            Categoria:
                            <a href="{{ route('admin.categories.show', ['category' => $post->category->id]) }}">
                                {{ $post->category->title }}
                            </a>
                        </h2>
                    @endif

                    @if ($post->cover_img != null)
                        <div class="my-3">
                            <img src="{{ asset('storage/'.$post->cover_img) }}" style="max-width: 400px;">
                        </div>
                    @endif

                    <div>
                        Tag:
                        @forelse ($post->tags as $tag)
                            <a href="{{ route('admin.tags.show', ['tag' => $tag->id]) }}" class="badge rounded-pill text-bg-primary">
                                {{ $tag->title }}
                            </a>
                        @empty
                            -
                        @endforelse
                    </div>

                    <p>
                        {{ $post->content }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
