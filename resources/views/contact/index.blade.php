@extends('layouts.app')

@section('content')
    <div class="container my-5" style="background-color: pink;">
        <div class="card shadow-lg mx-auto" style="max-width: 800px; border: 3px solid red;">
            <div class="card-body" style="font-family: 'Comic Sans MS'; color: blue;">
                <h1 class="text-center mb-4" style="font-size: 3rem; color: green;">Nous Contacter</h1>
                <div class="row">
                    <div class="input-group mb-4">
                        <a href="{{ route('contact.create') }}" class="btn btn-warning w-100" style="font-size: 1.5rem;">Poser une Question</a>
                    </div>
                    <div class="accordion mt-3" id="accordionExample">
                        @foreach ($questions as $key => $question)
                            <div class="accordion-item mb-3 shadow-sm rounded" data-category="{{ $question->category }}" style="border: 2px solid purple;">
                                <h2 class="accordion-header">
                                    <button class="accordion-button {{ $key !== 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $question->id }}"
                                        aria-expanded="{{ $key === 0 ? 'true' : 'false' }}"
                                        aria-controls="collapse{{ $question->id }}"
                                        style="background-color: orange; color: black;">
                                        {{ $question->object }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $question->id }}" class="accordion-collapse collapse {{ $key === 0 ? 'show' : '' }}"
                                    data-bs-parent="#accordionExample" style="background-color: lightblue;">
                                    <div class="accordion-body">
                                        <p class="small text-muted" style="font-size: 1.2rem;">Créé à : {{ $question->created_at->format('H:i:s') }} le {{ $question->created_at->format('d-m-Y') }}</p>
                                        <p class="lead" style="font-size: 1.8rem; color: teal;">{{ $question->description }}</p>
                                    </div>
                                    <div class="d-flex justify-content-around m-2">
                                        @php
                                            $hasAnswer = $answers->where('faq_id', $question->id)->isNotEmpty();
                                        @endphp
                                        @if ($hasAnswer)
                                            <form action="{{ route('contact.show', $question->id) }}" method="get">
                                                @csrf
                                                <button type="submit" class="btn btn-danger" style="font-size: 1.2rem;">Voir les Réponses</button>
                                            </form>
                                        @else
                                            <div class="text-center text-muted" style="font-size: 1.2rem;">Aucune Réponse</div>
                                        @endif
                                        <form action="{{ route('faqAnswer.create', $question->id) }}" method="get">
                                            @csrf
                                            <button type="submit" class="btn btn-danger" style="font-size: 1.2rem;">Répondre</button>
                                        </form>
                                        @if (isset(Auth::user()->is_admin) && Auth::user()->is_admin == 1)
                                            <form action="{{ route('contact.destroy', $question->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" style="font-size: 1.2rem;">Supprimer</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-5">
                    {{ $questions->links('vendors.pagination.custom') }}
                </div>
            </div>
        </div>
        <div class="text-center mt-5">
            <a href="/" class="btn btn-warning btn-lg" style="font-size: 1.5rem; background-color: cyan; color: black;">Retour à la page d'accueil</a>
        </div>
    </div>
@endsection
