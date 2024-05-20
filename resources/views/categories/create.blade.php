@extends('layouts.app')

@section('content')
    <div class="w-8/12 bg-white p-6 rounded-lg">
        <div class="mb-4 p-2">
            <h1 class="text-2xl font-medium mb-1">Créer une categorie</h1>
            <p class="text-gray-500">Créer</p>
            <a href="{{route('categories.index')}}">
                <button class="btn btn-primary">Retour</button>
            </a>
        </div>
        <form action="{{route('categories.store')}}" method="post">
            <div class="flex flex-col mb-4 p-4">
                @csrf
                <div class="form-group my-2">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                </div>
                <button type="submit" class="btn btn-primary">Créer</button>
            </div>
        </form>
    </div>
@endsection
