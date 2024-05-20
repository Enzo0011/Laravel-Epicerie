@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded-lg">
        <div class="card-body">
            <div class="mb-4">
                <h1 class="h3 mb-3">Modifier un produit</h1>
                <a href="{{ route('admin.index') }}" class="btn btn-secondary mb-4">Retour</a>
            </div>
            <form action="{{ route('admin.products.update', $product) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <div class="form-floating">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nom du produit" value="{{ $product->name }}">
                        <label for="name">Nom du produit</label>
                    </div>
                    @error('name')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <textarea name="description" id="description" class="form-control" placeholder="Description du produit" style="height: 100px">{{ $product->description }}</textarea>
                        <label for="description">Description du produit</label>
                    </div>
                    @error('description')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <select name="category" id="category" class="form-select">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="category">Catégorie</label>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <input type="text" name="price" id="price" class="form-control" placeholder="Prix du produit" value="{{ $product->price }}">
                        <label for="price">Prix</label>
                    </div>
                    @error('price')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <input type="text" name="stock" id="stock" class="form-control" placeholder="Stock du produit" value="{{ $product->stock }}">
                        <label for="stock">Stock</label>
                    </div>
                    @error('stock')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <input type="file" name="image" id="image" class="form-control">
                        <label for="image">Image du produit</label>
                    </div>
                    @error('image')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
