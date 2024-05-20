@extends('layouts.app')

@section('content')
<div class="container mt-5" style="background-color: lightpink;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" style="border: 3px solid purple; background-color: lightcyan;">
                <div class="card-header text-center" style="font-family: 'Comic Sans MS'; font-size: 2rem; color: darkgreen;">{{ __('Inscription') }}</div>

                <div class="card-body" style="font-family: 'Courier New'; color: darkred;">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-4 row">
                            <label for="name" class="col-md-3 col-form-label text-md-end" style="color: darkblue;">{{ __('Nom') }}</label>

                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus style="border: 2px solid orange; background-color: lightgrey;">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="email" class="col-md-3 col-form-label text-md-end" style="color: darkblue;">{{ __('Adresse e-mail') }}</label>

                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" style="border: 2px solid orange; background-color: lightgrey;">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="col-md-3 col-form-label text-md-end" style="color: darkblue;">{{ __('Mot de passe') }}</label>

                            <div class="col-md-7">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" style="border: 2px solid orange; background-color: lightgrey;">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password-confirm" class="col-md-3 col-form-label text-md-end" style="color: darkblue;">{{ __('Confirmer mot de passe') }}</label>

                            <div class="col-md-7">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" style="border: 2px solid orange; background-color: lightgrey;">
                            </div>
                        </div>

                        <div class="mb-0 row">
                            <div class="col-md-7 offset-md-3">
                                <button type="submit" class="btn btn-warning" style="font-size: 1.5rem;">
                                    {{ __('Inscription') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
