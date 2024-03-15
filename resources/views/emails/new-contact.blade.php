@extends('layouts.email-template')

@section('content')
    <h1>
        Ciao Alessio!
    </h1>

    <p>
        Hai ricevuto un nuovo messaggio dal frontend in Vue:
    </p>

    <ul>
        <li>
            Nome: {{ $contact->name }}
        </li>
        <li>
            Email: {{ $contact->email }}
        </li>
        <li>
            Messaggio:
            <p>
                {{ $contact->message }}
            </p>

            Messaggio con a capo:
            <p>
                {!! nl2br( $contact->message) !!}
            </p>
        </li>
    </ul>
@endsection
