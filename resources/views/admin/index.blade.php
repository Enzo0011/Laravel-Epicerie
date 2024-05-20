@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="card shadow rounded-lg">
        <div class="card-body">
            <h1 class="card-title text-center mb-4">Dashboard Admin</h1>
            <p class="card-text text-center text-muted">Bon retour, {{ auth()->user()->name }}</p>
            <div class="text-center">
                @foreach($elementToManage as $category)
                <a href="{{ route($category['route']) }}" class="btn btn-primary mx-2">{{ $category['name'] }}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
