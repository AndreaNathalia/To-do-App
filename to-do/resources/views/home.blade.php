@extends('layouts.app')
<head>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
   
    <!-- Styles -->
    <style>
        .home{
            color: #171735;
            font-family: Lato;
        }
        .cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .card {
            margin: 20px;
            padding: 20px;
            width: 500px;
            min-height: 200px;
            display: grid;
            grid-template-rows: 20px 50px 1fr 50px;
            border-radius: 10px;
            box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.25);
            transition: all 0.2s;
        }
        .card:hover {
            box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.4);
            transform: scale(1.01);
        }
        .card__title {
            grid-row: 3/4;
            font-weight: 400;
            color: white;
            text-align: center;
            text-decoration: none;
        }
        .card-1 {
            background: #1CCC88;
        }
        .card-2 {
            background: #FF4A4A;
        }
        .card-3 {
            background: #F4BB00;
        }
        .card-4 {
            background: #2C4AED;
        }
    </style>
</head>

@section('content')
<div class="uk-section uk-section-small" >
    <div class="uk-container">
        @if (session('status'))
            <div>
                {{ session('status') }}
            </div>
        @endif
        
        <h1 class="home">Home</h1>
        <div class="cards">
            <div class="card card-1">
                
                <h2 class="card__title">
                    <div style="display: inline; margin-right:3%;"><font-awesome-icon icon="fa-circle-plus" /></div>
                    <a href="/submitTodo" style="text-decoration: none; color: white; display: inline;">Crear to-do</a>
                </h2>
            </div>

            <div class="card card-2">
                <h2 class="card__title">
                    <div style="display: inline; margin-right:3%;"><font-awesome-icon icon="fa-solid fa-square-check" /></div>
                    <a href="/myTodos" style="text-decoration: none; color: white; display: inline;">Mis to-do's</a>
                </h2>
            </div>

            <div class="card card-3">
                <h2 class="card__title">
                    <div style="display: inline; margin-right:3%;"><font-awesome-icon icon="fa-solid fa-user-plus" /></div>
                    <a href="/assign" style="text-decoration: none; color: white; display: inline;">Asignar to-do</a>
                </h2>
            </div>

            <div class="card card-4">
                <h2 class="card__title">
                    <div style="display: inline; margin-right:3%;"><font-awesome-icon icon="fa-solid fa-rectangle-list" /></div>
                    <a href="/todos" style="text-decoration: none; color: white; display: inline;">To-do's</a>
                </h2>
            </div>
        </div>

    </div>
</div>
@endsection