@extends('layouts.app')

@section('page-title', 'Tutti i post')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        Tutti i post
                    </h1>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Titolo</th>
                                <th scope="col">Creato il</th>
                                <th scope="col">Alle</th>
                                <th scope="col">Azioni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <th scope="row">{{ $post->id }}</th>
                                    <td>{{ $post->title }}</td>
                                    {{-- Come formattare una data: https://www.php.net/manual/en/datetime.format.php --}}
                                    <td>{{ $post->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $post->created_at->format('H:i') }}</td>
                                    <td>
                                        <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}" class="btn btn-xs btn-primary">
                                            Vedi
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
