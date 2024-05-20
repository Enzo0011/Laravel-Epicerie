@extends('layouts.app')

@section('content')
    <div class="container my-5" style="background-color: pink;">
        <div class="card shadow-lg mx-auto" style="max-width: 1000px; border: 3px solid red;">
            <div class="row g-0">
                <div class="col-md-6" style="background-color: yellow;">
                    <img src="{{ $product->image }}" class="img-fluid rounded-start" alt="{{ $product->name }}" style="height: 100%; width: 100%; object-fit: cover; border: 5px solid green;">
                </div>
                <div class="col-md-6" style="background-color: orange;">
                    <div class="card-body" style="font-family: 'Comic Sans MS'; color: blue;">
                        <h1 class="card-title" style="font-size: 2.5rem;">{{ $product->name }}</h1>
                        @if ($product->stock > 0)
                            <p class="text-success" style="font-size: 1.5rem;">Disponible</p>
                        @else
                            <p class="text-danger" style="font-size: 1.5rem;">Indisponible</p>
                        @endif
                        <p class="lead" style="font-size: 2rem; color: purple;">Prix: <b>{{ $product->price }}€</b></p>
                        <hr>
                        <h3 class="text-dark" style="color: darkred;">Description</h3>
                        <p class="lead" style="font-size: 1.8rem; color: teal;">{{ $product->description }}</p>
                        <hr>
                        @if (session('success'))
                            <div class="alert alert-success" style="background-color: lime; color: black;">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger" style="background-color: magenta; color: white;">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('cart.store') }}" method="post" class="mt-4">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="mb-3">
                                <label for="quantity" class="form-label" style="color: brown;">Quantité</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" value="1" max="{{ $product->stock }}" min="1" style="border: 2px solid red;">
                            </div>
                            <button type="submit" class="btn btn-danger btn-lg w-100" style="font-size: 1.5rem;">Ajouter au panier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-5">
            <a href="/" class="btn btn-danger btn-lg" style="font-size: 1.5rem; background-color: cyan; color: black;">Retour à la page d'accueil</a>
        </div>
    </div>
@endsection
