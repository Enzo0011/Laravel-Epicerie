@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow rounded-lg">
            <div class="card-body">
                <div class="mb-4">
                    <h1 class="text-2xl font-medium mb-1">Tous les produits</h1>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <a href="{{ route('admin.index') }}" class="btn btn-secondary">Retour</a>
                        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Créer un produit</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Description</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-info">Modifier</a>
                                            <form action="{{ route('admin.products.destroy', $product) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </form>
                                        </div>
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
