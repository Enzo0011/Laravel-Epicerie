@extends('layouts.app')

@section('content')
    <div class="container-fluid m-0 p-0" style="background-color: #ffcccb;">
        <div class="row justify-content-start">
            <h1 class="text-left py-5" style="color: blue; font-family: 'Comic Sans MS';">Bienvenue dans notre épicerie !</h1>
            <div class="row col-sm d-flex justify-content-center mt-2">
                <div class="col-xl-3 col-sm-8 shadow shadow-lg rounded-0 p-1" style="background-color: lightblue;">
                    <p class="h5 text-left text-danger">Rejoingnez nos {{ $users }} client</p>
                </div>
            </div>
            <h4 class="text-left py-3" style="color: purple;">Nos Produits</h4>
            <div class="row col-sml d-flex justify-content-center mt-2">
                @foreach($randomProducts as $product)
                    <div class="col-xl-3 col-sm-8 shadow shadow-lg rounded-0 p-1" style="background-color: orange;">
                        <div class="text-left">
                            <img src="{{ $product->image }}" alt="IMAGE MANQUANTE"
                                 class='img-fluid mx-auto d-inline-block rounded-circle'
                                 style="height: 50px; width: 50px;">
                            <h5 style="color: red;">{{ $product->name }}</h5>
                            <p style="font-size: 0.8em;">{{ $product->description }}</p>
                            <p style="font-size: 0.8em;">{{ $product->price }} €</p>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-danger btn-sm">Voir</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex" style="height:50px;"></div>
            <div class="mx-auto text-right pb-2">
                <a href="{{ route('products.index') }}" class="btn btn-danger btn-lg">Découvrez nos épices</a>
            </div>
        </div>
    </div>
@endsection
