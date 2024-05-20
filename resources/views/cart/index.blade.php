@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="bg-danger p-4 shadow-lg rounded-3" style="color: white;">
            <h1 class="text-center" style="font-family: Comic Sans MS;">Votre Panier</h1>
            @if (session('success'))
                <div class="alert alert-warning">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <hr/>

            <div class="table-responsive">
                <table class="table table-striped" style="background-color: #FFA07A;">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($cart as $item)
                        <tr>
                            <td class="align-middle">
                                <img src="{{ $item['product']->image }}" alt="{{ $item['product']->name }}"
                                     style="width: 70%"/>
                            </td>
                            <td class="align-middle">
                                <h4>{{ $item['product']->name }}</h4>
                                <p>{{ $item['product']->description }}</p>
                            </td>
                            <td class="align-middle" style="width: 10%">
                                <h4>{{$item['price']}} $</h4>
                                <p>{{ $item['product']->price }} $</p>
                            </td>
                            <td class="align-middle">
                                <form action="{{ route('cart.update', $item['id']) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}"
                                           class="form-control" style="width: 100px; background-color: #FF6347;" onfocusout="this.form.submit()">
                                </form>
                            </td>
                            <td class="align-middle">
                                <form action="{{ route('cart.destroy', $item['id']) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-dark">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <h4 class="text-center">Le panier est vide</h4>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <hr/>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <form action="{{ route('cart.promo') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="promo" class="form-control" placeholder="Code promo" style="background-color: #FF6347; color: white;">
                        <button class="btn btn-outline-dark" type="submit" style="background-color: #FF6347; color: white;">Appliquer</button>
                    </div>
                </form>
            </div>

            @if(session('promo'))
                <div>
                    <h4 style="font-family: Arial, sans-serif;">Code promo: {{ session('promo')['code'] }}
                        <form action="{{ route('cart.promo') }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="background-color: #FF6347;">Supprimer</button>
                        </form>
                    </h4>
                    <p>Promo: {{ session('promo')['discount'] }}%</p>
                    <p>Prix après promo: {{ session('promo')['priceAfterDiscount'] }} $</p>
                    <p>Prix avant promo: {{session('total')}} $</p>
                </div>
            @endif
            <hr/>

            <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                <h4>Total: @if(session('promo'))
                        {{ session('promo')['priceAfterDiscount'] }}
                    @else
                        {{ session('total') }}
                    @endif$</h4>
                <div>
                    <a href="{{ route('products.index') }}" class="btn btn-danger">Continuer vos achats</a>
                </div>
                @if(count($cart) > 0)
                    <div>
                        <a href="{{ route('cart.checkout') }}" class="btn btn-dark">Passer la commande</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
