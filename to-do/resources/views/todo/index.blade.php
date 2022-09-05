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
            text-align: center;
            margin-bottom: 4%;
        }
        .container {
            max-width: 1000px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 10px;
            padding-right: 10px;
        }
        h2 {
            font-size: 26px;
            margin: 20px 0;
            text-align: center;
        }
        h2 small {
            font-size: 0.5em;
        }
        .responsive-table li {
            border-radius: 3px;
            padding: 25px 30px;
            display: flex;
            justify-content: space-between;
            margin-bottom: 25px;
        }
        .responsive-table .table-header {
            background-color: #F4BB00;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }
        .responsive-table .table-row {
            background-color: #fff;
            box-shadow: 0px 0px 9px 0px rgba(0, 0, 0, 0.1);
        }
        .responsive-table .col-1 {
            flex-basis: 10%;
        }
        .responsive-table .col-2 {
            flex-basis: 40%;
        }
        .responsive-table .col-3 {
            flex-basis: 25%;
        }
        .responsive-table .col-4 {
            flex-basis: 25%;
        }
        @media all and (max-width: 767px) {
            .responsive-table .table-header {
                display: none;
            }
            .responsive-table li {
                display: block;
            }
            .responsive-table .col {
                flex-basis: 100%;
            }
            .responsive-table .col {
                display: flex;
                padding: 10px 0;
            }
            .responsive-table .col:before {
                color: #6c7a89;
                padding-right: 10px;
                content: attr(data-label);
                flex-basis: 50%;
                text-align: right;
            }
        }
    </style>
</head>
@section('content')
    @if (count($todos) > 0)
    <div class="container">
        <div class="uk-section uk-section-small" >
            <div class="uk-container">
                <h1 class="header">To-do's</h1>

                <div class="container">
                    <ul class="responsive-table">
                        <li class="table-header">
                        <div class="col col-1"> </div>
                        <div class="col col-2">To-do</div>
                        <div class="col col-3">Descripción</div>
                        <div class="col col-4" style="text-align: center;">Estado</div>
                        </li>

                        @foreach ($todos as $todo)
                        <li class="table-row">
                        <div class="col col-1" data-label="Job Id"><font-awesome-icon icon="fa-solid fa-square-check" style="color: #2C4AED"/></div>
                        <div class="col col-2" data-label="Customer Name">{{ $todo->title }}</div>
                        <div class="col col-3" data-label="Amount">{{ $todo->description }}</div>
                        <div class="col col-4" data-label="Payment Status" style="text-align: center;">{{ $todo->completed }}</div>
                        <!-- <div class="col col-4" data-label="Payment Status">{{ $todo->users }}</div> -->
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection