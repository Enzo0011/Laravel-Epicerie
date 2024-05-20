@extends('layouts.app')

@section('content')
<div class="w-8/12 bg-white p-6 rounded-lg">
    <div class="mb-4 p-2">
        <h1 class="text-2xl font-medium mb-1">Commande</h1>
        <p class="text-gray-500">Détails de la commande n°{{$order->id}}</p>
        @if(Request::is('admin/*'))
            <a href="{{ route('orders.index') }}">
                <button class="btn btn-primary">Retour</button>
            </a>
        @else
            <a href="{{ route('profil.index') }}">
                <button class="btn btn-primary">Retour</button>
            </a>
        @endif
    </div>
    <div class="d-flex flex-row p-2">
        <div class="w-50 border border-dark rounded m-2 p-2">
            <h4>Informations Utilisateur</h4>
            <p>Identifiant utilisateur : {{$order->user_id}}</p>
            <p>Nom utilisateur : {{$order->user->name}}</p>
            <p>Email utilisateur : {{$order->user->email}}</p>
            <p>Créé le : {{$order->user->created_at}}</p>
        </div>
        <div class="w-50 border border-dark rounded m-2 p-2">
            <h4>Informations de la Commande</h4>
            <p>Identifiant de la commande : {{$order->id}}</p>
            <p>Total : {{$order->total}}</p>
            <p>Statut : {{$order->status}}</p>
            <p>Créé le : {{$order->created_at}}</p>
            <p>Mis à jour le : {{$order->updated_at}}</p>
        </div>
    </div>
    @if(Request::is('admin/*'))
        <div class="border border-dark rounded m-3 p-4">
            <h4>Modifier le Statut</h4>
            <form action="{{route('orders.update', $order->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group my-2">
                    <label for="status">Statut</label>
                    <select class="form-control" id="status" name="status">
                        <option value="pending" {{$order->status == 'pending' ? 'selected' : ''}}>En Attente</option>
                        <option value="processing" {{$order->status == 'processing' ? 'selected' : ''}}>En Traitement</option>
                        <option value="completed" {{$order->status == 'completed' ? 'selected' : ''}}>Terminée</option>
                        <option value="declined" {{$order->status == 'declined' ? 'selected' : ''}}>Refusée</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Mettre à Jour</button>
            </form>
        </div>
    @endif
    <div class="text-center">
        <h4>Articles de la Commande</h4>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Image</th>
                <th scope="col">Nom du Produit</th>
                <th scope="col">Quantité</th>
                <th scope="col">Prix</th>
                <th scope="col">Total</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->orderItems as $product)
                <tr>
                    <th scope="row" class="align-middle">{{$product->product_id}}</th>
                    <td><img src="{{"../".$product->product->image}}" alt="RIEN A VOIR"
                             class='img-fluid mx-auto d-inline-block rounded rounded-5'
                             style="height: 100px;"></td>
                    <td class="align-middle">{{$product->product->name}}</td>
                    <td class="align-middle">{{$product->quantity}}</td>
                    <td class="align-middle">{{$product->price}}</td>
                    <td class="align-middle">{{$product->quantity * $product->price}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
