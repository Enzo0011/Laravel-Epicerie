@extends('layouts.app')

@section('content')
<div class="container my-5" style="background-color: #ff00ff;">
    <div class="row">
        <!-- User Info Section -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-lg h-100" style="background-color: #ffff00;">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4" style="color: #ff0000;">Votre Profil</h2>
                    <div class="border rounded p-3 mb-4" style="background-color: #00ffff;">
                        <h4 style="color: #ff00ff;">Informations de l'utilisateur</h4>
                        <p><b style="color: #0000ff;">Identifiant :</b> {{ Auth::user()->id }}</p>
                        <p><b style="color: #0000ff;">Nom :</b> {{ Auth::user()->name }}</p>
                        <p><b style="color: #0000ff;">Email :</b> {{ Auth::user()->email }}</p>
                        <p><b style="color: #0000ff;">Date de création :</b> {{ Auth::user()->created_at->format('d-m-Y H:i:s') }}</p>
                    </div>
                    <div class="border rounded p-3" style="background-color: #00ffff;">
                        <h4 style="color: #ff00ff;">Changer le mot de passe</h4>
                        <form action="{{ route('profil.update', Auth::user()) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="password" class="form-label" style="color: #0000ff;">Nouveau mot de passe</label>
                                <input type="password" name="password" id="password" class="form-control" required style="background-color: #ffff00;">
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label" style="color: #0000ff;">Confirmer le nouveau mot de passe</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required style="background-color: #ffff00;">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-block" style="background-color: #ff00ff;">Confirmer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Orders Section -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-lg h-100" style="background-color: #ffff00;">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4" style="color: #ff0000;">Vos Commandes</h2>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Statut</th>
                                    <th scope="col">Créé le</th>
                                    <th scope="col">Mis à jour le</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->total }}€</td>
                                        <td>{{ $order->status }}</td>
                                        <td>{{ $order->created_at->format('d-m-Y H:i:s') }}</td>
                                        <td>{{ $order->updated_at->format('d-m-Y H:i:s') }}</td>
                                        <td>
                                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary btn-sm" style="background-color: #ff00ff;">Afficher</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if($orders->isEmpty())
                        <p class="text-center" style="color: #ff00ff;">Vous n'avez aucune commande.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
