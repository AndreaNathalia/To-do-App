<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Qüilo Todo</title>
  <link rel="shortcut icon" href="https://quilolatam.com/assets/icon-blue.85ed0bd0.png">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://unpkg.com/vue-multiselect@2.1.0"></script>
  <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">

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
    </style>
</head>

@extends('layouts.app')
@section('content')
<div class="container">
    <div class="uk-section uk-section-small" >
        <div class="uk-container">
            <h1 class="header">Asignar to-do</h1>
            <div class="uk-section uk-section-small uk-section-muted uk-flex uk-flex-center" style="background-color: white;">
                <div class="uk-card uk-card-default uk-card-body uk-width-large">
                    <div style="text-align: center;"><font-awesome-icon icon="fa-solid fa-users" style="font-size: 80; color: #2C4AED; margin-bottom:7%;" /></div>

                    <form action="/assignTodo" method="post">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                Please fix the following errors
                            </div>
                        @endif

                        <div class="uk-margin">
                            <div class="uk-form-control">
                                <todos-list :options="{{$todos->toJson()}}" :multiple="false" />                          
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="uk-margin">
                            <div class="uk-form-control">
                                <users-list :options="{{$users->toJson()}}" />
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="uk-margin">
                            <div class="uk-form-control">
                                <button type="submit" class="uk-button uk-button-primary" style="background-color: #1CCC88; border-radius: 8px; width:100%; margin-top:10%;">Asignar</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection        
</html> 