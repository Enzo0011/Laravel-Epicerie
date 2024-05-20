@extends('layouts.app')

@section('content')
<div class="w-8/12 bg-white p-6 rounded-lg">
    <div class="mb-4 p-2">
        <h1 class="text-2xl font-medium mb-1">Commandes</h1>
        <p class="text-gray-500">Toutes les commandes</p>
        <a href="{{ route('admin.index') }}">
            <button class="btn btn-primary">Retour</button>
        </a>
    </div>
    <div class="text-center">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Identifiant</th>
                <th scope="col">Identifiant de l'utilisateur</th>
                <th scope="col">Total</th>
                <th scope="col">Statut</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <th scope="row">{{$order->id}}</th>
                    <td>{{$order->user_id}}</td>
                    <td>{{$order->total}}</td>
                    <td>{{$order->status}}</td>
                    <td>
                        <a href="{{route('admin.orders.show', $order->id)}}">
                            <button class="btn btn-primary">Afficher</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
