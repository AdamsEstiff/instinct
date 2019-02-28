@extends('layouts.app')
@section('content')
    <!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Inicio</title>

    <!-- Fonts -->

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

<div class="content">
    @guest
        <img src="{{asset("images/atey-ghailan-173.jpg")}}">

    @else
        <div class="container" id="content">
            <div class="row justify-content-center">
                <div class="col-md-11">

                    <div class="card-deck">

                        @foreach($publicaciones as $publicacion)

                            <span>
                                <a href="photo/{{ $publicacion->id }}">
                                     <div class="card" style="width: 30rem;">
                                        <img class="card-img-top" src="{{ $publicacion->imagen }}" alt="Card image cap">
                                            <div class="card-body">
                                                 <h5 class="card-title"><strong>{{ $publicacion->user->name }}</strong></h5>
                                                 <p class="card-text">{{ $publicacion->comment }}</p>

                                             </div>
                                    </div>
                              </a>
                                </br>
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    @endguest
</div>

@include('user.search2')
</body>
</html>
@endsection
@section('script')
    <script src="{{ asset('js/script.js') }}"></script>
@endsection
