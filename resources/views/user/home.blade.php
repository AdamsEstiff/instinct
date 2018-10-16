@extends('layouts.app')
<div class="flex-center position-center full-height">

    @section('content')

        <div class="content">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Dashboard</div>
                        <div class="card-body">
                            </br>
                            <div class="card-deck">
                                <div class="card">
                                    <img class="card-img-top" src="{{ Auth::user()->image }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ Auth::user()->name }}</h5>

                                        <p class="card-text">{{ Auth::user()->description }}</p>
                                        <div class="card text-center" style="width: 100%;">
                                            <div class="card-body">
                                                <form action=" publication" method="get">
                                                    <input type="submit" value="Hacer una publicación "
                                                           class="btn btn-primary">
                                                    <a href="information" class="btn btn-info">Editar datos del
                                                        perfil</a>

                                                </form>

                                            </div>

                                        </div>
                                        <p class="card-text">
                                            <small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $publicaciones = \App\ModelsSave\Publicacion::where('user_id', '=', Auth::user()->id)->get();
                ?>
            </div>
            <br>
            <div class="content">
                <div class="container">
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
                              </a></br>
                            </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
</div>
@include('user.search2')
@endsection
@section('script')
    <script src="{{ asset('js/script.js') }}"></script>
@endsection
