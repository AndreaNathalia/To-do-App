@extends('layouts.app')
@section('content')
<div class="uk-section uk-section-small uk-section-muted uk-flex uk-flex-center">
    <div class="uk-card uk-card-default uk-card-body uk-width-large">
        <img src="https://quilolatam.com/images/quilo-blue.png" alt="Qlogo" style="margin-bottom: 5%;">
        <h2 class="uk-card-title" style="color: #171735;">Registrarse</h2>
        <form method="POST" action="{{ route('register') }}" class="uk-form-stacked">
            @csrf
            <div class="uk-margin">
                <div class="uk-form-control">
                    <input class="uk-input @error('name') uk-form-danger @enderror" id="name" name="name" type="text" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre" style="border-radius: 8px;">
                    @error('name')
                        <span class="uk-text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="uk-margin">
                <div class="uk-form-control">
                    <input class="uk-input @error('email') uk-form-danger @enderror" id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email" style="border-radius: 8px;">
                    @error('email')
                        <span class="uk-text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="uk-margin">
                <div class="uk-form-control">
                    <input id="password" type="password" class="uk-input @error('password') uk-form-danger @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña" style="border-radius: 8px;">
                    @error('password')
                        <span class="uk-text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="uk-margin">
                <div class="uk-form-control">
                    <input id="password_confirmation" type="password" class="uk-input @error('password') uk-form-danger @enderror" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar Contraseña" style="border-radius: 8px;">
                    @error('password_confirmation')
                        <span class="uk-text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="uk-margin">
                <div class="uk-form-control">
                    <button type="submit" class="uk-button uk-button-primary" style="background-color: #1CCC88; border-radius: 8px; width:100%; margin-top:10%;">Registrarse</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection