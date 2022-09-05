@extends('layouts.app')
@section('content')
<div class="uk-section uk-section-small uk-section-muted uk-flex uk-flex-center" style="background-color: white;">
    <div class="uk-card uk-card-default uk-card-body uk-width-large">
        <img src="https://quilolatam.com/images/quilo-blue.png" alt="Qlogo" style="margin-bottom: 5%;">
        <h2 class="uk-card-title" style="color: #171735;">Iniciar sesión</h2>
        <form method="POST" action="{{ route('login') }}" class="uk-form-stacked">
            @csrf
            <div class="uk-margin">
                <div class="uk-form-control">
                    <input class="uk-input @error('email') uk-form-danger @enderror" name="email" id="email" type="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email" style="border-radius: 8px;">
                    @error('email')
                    <span class="uk-text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="uk-margin">
                <div class="uk-form-control">
                    <input id="password" type="password" class="uk-input @error('password') uk-form-danger @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña" style="border-radius: 8px;">
                    @error('password')
                    <span class="uk-text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="uk-margin">
                <div class="uk-form-control">
                    <input class="uk-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember" style="color: #939393;"> Recuérdame</label>
                </div>
            </div>

            <div class="uk-margin">
                <div class="uk-form-control">
                    <button type="submit" class="uk-button uk-button-primary" style="background-color: #1CCC88; border-radius: 8px; width:100%; margin-top:10%;">Iniciar Sesión</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection