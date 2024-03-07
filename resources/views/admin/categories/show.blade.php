@extends('layouts.app')

@section('page-title', $category->title)

@section('main-content')
    <div class="row">
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
@endsection
