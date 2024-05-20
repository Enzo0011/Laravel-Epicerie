@extends('layouts.app')

@section('content')
<div class="container mt-5" style="background-color: lavender;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" style="border: 3px solid lime; background-color: lightyellow;">
                <div class="card-header text-center" style="font-family: 'Comic Sans MS'; font-size: 2rem; color: darkred;">{{ __('Connexion') }}</div>

                <div class="card-body" style="font-family: 'Courier New'; color: darkblue;">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4 row">
                            <label for="email" class="col-md-3 col-form-label text-md-end" style="color: orange;">{{ __('Adresse e-mail') }}</label>

                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="border: 2px solid red; background-color: lightgrey;">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: purple;">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="col-md-3 col-form-label text-md-end" style="color: orange;">{{ __('Mot de passe') }}</label>

                            <div class="col-md-7">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="border: 2px solid red; background-color: lightgrey;">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: purple;">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <div class="col-md-9 offset-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="margin-left: 0;">

                                    <label class="form-check-label" for="remember" style="color: darkgreen;">
                                        {{ __('Se souvenir de moi') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-0 row">
                            <div class="col-md-9 offset-md-3">
                                <button type="submit" class="btn btn-danger" style="font-size: 1.2rem;">
                                    {{ __('Connexion') }}
                                </button>
                                <br><br>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" style="color: darkred; font-size: 1.2rem;">
                                        {{ __('Mot de passe oublié ?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
