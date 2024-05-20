@extends('layouts.app')

@section('content')
    <div class="container my-5" style="background-color: pink;">
        <div class="row">
            <!-- Colonne pour les articles -->
            <div class="col-md-8" style="background-color: yellow;">
                <h1 class="mb-4" style="color: blue; font-family: 'Comic Sans MS';">Nos Epices</h1>
                <div class="row" id="productsContainer">
                    @foreach ($products as $product)
                        <div class="col-md-6 col-lg-4 mb-4 product-card" data-category="{{ $product->categorie_id }}" data-popularity="{{ $product->total_orders }}">
                            <div class="card shadow-sm h-100" style="border: 2px solid red;">
                                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="card-img-top" style="height: 200px; object-fit: cover; border-bottom: 5px solid green;">
                                <div class="card-body d-flex flex-column" style="background-color: lightblue;">
                                    <h5 class='card-title pb-1' style="color: red;">{{ $product->name }}</h5>
                                    <p class="card-text mb-4" style="font-weight: bold;">Prix {{ $product->price }} €</p>
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-danger mt-auto">Détails</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center mt-5">{{ $products->links('vendors.pagination.custom') }}</div>
            </div>

            <!-- Colonne pour les filtres -->
            <div class="col-md-4" style="background-color: lime;">
                <div class="card shadow-sm mb-4" style="border: 2px solid purple;">
                    <div class="card-body" style="background-color: orange;">
                        <h2 class="card-title mb-4" style="color: white;">Filtres <i class="fas fa-filter"></i></h2>
                        
                        <div class="mb-4">
                            <input type="search" class="form-control" id="search" placeholder="Rechercher un produit" aria-label="Search" style="border: 2px solid red;"/>
                        </div>
                        
                        <h4 class="mb-3" style="color: darkblue;">Catégories</h4>
                        <select class="form-select mb-4" name="type" style="border: 2px solid green;">
                            <option value="All">Toutes les catégories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        
                        <h4 class="mb-3" style="color: darkblue;">Prix</h4>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Prix min" id="minPrice"
                                   aria-label="Prix min" aria-describedby="button-addon2"
                                   style="border: 2px solid red;"
                                   oninput="this.value = this.value.replace(/[^0-9]/g, ''); filterProducts();">
                            <span class="input-group-text" id="button-addon2" style="background-color: red; color: white;">€</span>
                        </div>
                        <div class="input-group mb-4">
                            <input type="text" class="form-control" placeholder="Prix max" id="maxPrice"
                                   aria-label="Prix max" aria-describedby="button-addon2"
                                   style="border: 2px solid red;"
                                   oninput="this.value = this.value.replace(/[^0-9]/g, ''); filterProducts();">
                            <span class="input-group-text" id="button-addon2" style="background-color: red; color: white;">€</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
