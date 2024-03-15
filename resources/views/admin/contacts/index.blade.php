@extends('layouts.app')

@section('page-title', 'Tutti i contatti')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        Tutti i contatti
                    </h1>

                    <div class="mb-3">
                        <form action="{{ route('admin.contacts.index') }}" method="GET" class="row g-2">
                            <div class="col">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Cerca per nome..." value="{{ request()->input('name') }}">
                            </div>
                            <div class="col">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Cerca per email..." value="{{ request()->input('email') }}">
                            </div>
                            <div class="col-auto d-flex align-items-end">
                                <button type="submit" class="btn btn-primary">
                                    Cerca
                                </button>
                            </div>
                        </form>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Ricevuto il</th>
                                <th scope="col">Alle</th>
                                <th scope="col">Azioni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <th scope="row">{{ $contact->id }}</th>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    {{-- Come formattare una data: https://www.php.net/manual/en/datetime.format.php --}}
                                    <td>{{ $contact->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $contact->created_at->format('H:i') }}</td>
                                    <td>
                                        <a href="{{ route('admin.contacts.show', ['contact' => $contact->id]) }}" class="btn btn-xs btn-primary">
                                            Vedi
                                        </a>
                                        <form
                                            class="d-inline-block"
                                            action="{{ route('admin.contacts.destroy', ['contact' => $contact->id]) }}"
                                            method="post"
                                            onsubmit="return confirm('Sei sicuro di voler eliminare questo contatto?');">
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
