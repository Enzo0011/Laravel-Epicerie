@extends('layouts.app')

@section('content')
    <div class="container my-5" style="background-color: lightyellow;">
        <div class="card shadow-lg mx-auto" style="max-width: 900px; border: 5px solid blue;">
            <div class="card-body" style="background-color: lightgreen;">
                <h1 class="text-center mb-4" style="font-family: 'Comic Sans MS'; color: darkred;">Répondre</h1>
                <form action="{{ route('faqAnswer.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <p><b style="font-size: 1.2rem;">Question:</b> <span style="color: blue;">{{ $faq->object }}</span></p>
                        <p><b style="font-size: 1.2rem;">Description:</b> <span style="color: green;">{{ $faq->description }}</span></p>
                        <input type="hidden" name="faq_id" value="{{ $faq->id }}">
                    </div>
                    <div class="mb-4">
                        <label for="answer" class="form-label" style="font-size: 1.2rem;">Réponse</label>
                        <textarea class="form-control" id="answer" name="answer" rows="5" placeholder="Répondez" style="font-family: 'Courier New';"></textarea>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-danger btn-lg">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
        <a href="{{ route('contact.index') }}" class="btn btn-warning" style="font-size: 1.1rem;">Retour</a>
    </div>
@endsection
