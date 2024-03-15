@extends('layouts.app')

@section('page-title', 'Messaggio da '.$contact->name)

@section('main-content')
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        Messaggio da {{ $contact->name }}
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <ul>
                        <li>
                            Email: {{ $contact->email }}
                        </li>
                        <li>
                            Messaggio:
                            <blockquote>
                                {!! nl2br( $contact->message) !!}
                            </blockquote>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
