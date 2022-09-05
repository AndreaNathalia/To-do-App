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
</head>

@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Assign') }}</div>

                <div class="card-body">
                    
                <div>
                <div>
                  <example-component></example-component>
                  <users-list></users-list>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection        

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html> 