@extends('layouts.app')

@section('content')
    <div class="container my-5" style="background-color: lightyellow;">
        <div class="card shadow-lg mx-auto" style="max-width: 900px; border: 5px solid blue;">
            <div class="card-body" style="background-color: lightgreen;">
                <h3 class="text-center mb-4" style="font-family: 'Comic Sans MS'; color: darkred;">{{ $question->object }}</h3>
                <h4 class="text-center mb-3" style="font-family: 'Courier New'; color: purple;">{{ $question->description }}</h4>
                <p class="text-muted text-center" style="font-weight: bold; font-size: 1.2rem;">Créé à : {{ $question->created_at->format('H:i:s') }} le {{ $question->created_at->format('d-m-Y') }}</p>
                <div class="text-center mb-4">
                    <a href="{{ route('contact.index') }}" class="btn btn-warning" style="font-size: 1.1rem;">Retour</a>
                    @if (isset(Auth::user()->is_admin) && Auth::user()->is_admin == 1)
                        <form action="{{ route('contact.destroy', $question->id) }}" method="post" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mx-2" style="font-size: 1.1rem;">Supprimer</button>
                        </form>
                    @endif
                </div>

                @foreach ($answers as $answer)
                    <div class="border rounded mt-3 p-4" style="background-color: lightblue; border: 3px dashed red;">
                        <div class="card-body">
                            <p class="lead mb-1" style="font-size: 1.1rem; color: green;">{{ $answer->user->name }} - <small class="text-muted" style="font-size: 0.9rem;">{{ $answer->created_at->format('H:i:s d-m-Y') }}</small></p>
                            <p style="font-size: 1.2rem; font-family: 'Comic Sans MS';">{{ $answer->answer }}</p>
                            @if (isset(Auth::user()->is_admin) && Auth::user()->is_admin == 1)
                                <form action="{{ route('faqAnswer.destroy', $answer->id) }}" method="post" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" style="font-size: 0.8rem;">Supprimer</button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
