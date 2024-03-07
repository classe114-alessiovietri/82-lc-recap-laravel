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

                    <div class="mb-3">
                        <a href="{{ route('admin.posts.create') }}" class="btn btn-success w-100">
                            + Aggiungi
                        </a>
                    </div>

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
                                        <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}" class="btn btn-xs btn-warning">
                                            Modifica
                                        </a>
                                        <form class="d-inline-block" action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare questo post?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                Elimina
                                            </button>
                                        </form>
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
