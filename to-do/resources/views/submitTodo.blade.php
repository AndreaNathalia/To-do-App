@extends('layouts.app')
<head>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
   
    <!-- Styles -->
   <style>
        .header{
            color: #171735;
            font-family: Lato;
        }
        .select-dropdown{
            width: 100%;
            height: 40px;
            outline: none;
            border-color: #F2F2F2;
            border-radius: 8px;
            color: #a1a1a1;
        }
    </style>
</head>
@section('content')
<div class="container">
    <div class="uk-section uk-section-small" >
        <div class="uk-container">
            <h1 class="header">Crear to-do</h1>
                <div class="uk-section uk-section-small uk-section-muted uk-flex uk-flex-center" style="background-color: white;">
                    <div class="uk-card uk-card-default uk-card-body uk-width-large">
                    <div style="text-align: center;"><font-awesome-icon icon="fa-regular fa-square-check" style="font-size: 80; color: #2C4AED; margin-bottom:7%;" /></div>

                    <form action="/todo" method="post">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                Please fix the following errors
                            </div>
                        @endif
                        <div class="uk-margin">
                            <div class="uk-form-control">
                                <input type="text" class="uk-input @error('email') uk-form-danger @enderror" id="title" name="title" placeholder="Titulo" value="{{ old('title') }}" style="border-radius: 8px;">
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="uk-margin">
                            <div class="uk-form-control">
                                <input type="text" class="uk-input @error('password') uk-form-danger @enderror" id="description" name="description" placeholder="Descripción" value="{{ old('description') }}" style="border-radius: 8px;">
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="uk-margin">
                            <div class="uk-form-control">
                                <label for="title" style="color: #a1a1a1">Estado</label>
                                <select type="text" class="select-dropdown" id="completed" name="completed">
                                    <option value="0">To-do</option>
                                    <option value="1">Completed</option>
                                </select>

                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="uk-margin">
                            <div class="uk-form-control">
                                <button type="submit" class="uk-button uk-button-primary" style="background-color: #1CCC88; border-radius: 8px; width:100%; margin-top:10%;">Crear</button>
                            </div>
                        </div>

                    </form>
                </div>
        </div>
    </div>
</div>
@endsection