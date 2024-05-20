@extends('layouts.app')

@section('content')
    <div class="container my-5" style="background-color: lightyellow;">
        <div class="card shadow-lg mx-auto" style="max-width: 900px; border: 5px solid red;">
            <div class="card-body" style="background-color: lightblue;">
                <h1 class="text-center mb-5" style="font-family: 'Comic Sans MS'; color: darkred;">Posez Votre Question</h1>
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label for="object" class="form-label" style="font-weight: bold; font-size: 1.2rem; color: purple;">Objet</label>
                        <input type="text" class="form-control" id="object" name="object" placeholder="Objet de votre question" required style="border: 3px solid green; background-color: lightpink;">
                    </div>
                    <div class="mb-5">
                        <label for="description" class="form-label" style="font-weight: bold; font-size: 1.2rem; color: purple;">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="7" placeholder="Décrivez votre question" required style="border: 3px solid green; background-color: lightpink;"></textarea>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-warning btn-lg" style="font-size: 1.5rem; font-family: 'Courier New';">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
        <a href="{{ route('contact.index') }}" class="btn btn-warning" style="font-size: 1.1rem;">Retour</a>
    </div>
@endsection
