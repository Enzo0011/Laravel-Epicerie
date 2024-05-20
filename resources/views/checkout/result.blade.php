@extends('layouts.app')

@section('content')
<div style="background-color: #90EE90; padding: 20px; margin: 50px auto; width: 50%; border-radius: 10px; text-align: center;">
    <h1 style="font-size: 36px; color: #006400;">Merci pour votre achat !</h1>
    <p style="font-size: 18px;">Votre numéro de commande est : <strong style="color: #006400;">{{ $order->id }}</strong></p>
</div>
<div style="text-align: center; margin-top: 20px;">
    <a href="{{ route('products.index') }}" style="background-color: #4169E1; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-size: 18px;">Continuer vos achats</a>
</div>

@endsection
