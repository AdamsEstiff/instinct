@extends('layouts.app')
<div class="flex-center position-center full-height">
    @section('content')
        @include('user.search2')
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">Dashboard</div>
                        <div class="card-body">
                            </br>
                            <div class="card-deck">
                                <div class="card">

                                    <img class="img-thumbnail" src=" {{url($user->image) }}" alt="Card image cap">

                                    <div class="card-body">
                                        <h5 class="card-title">{{$user->name }}</h5>

                                        <div class="card text-center" style="width: 100%;">


                                            <div class="card-body">
                                                <h2>Descripcion:</h2>
                                                <h6> {{$user->description}}</h6>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    </br>
                </div>

            </div>
        </div>
        <?php
        $publicaciones = \App\ModelsSave\Publicacion::where('user_id', '=', $user->id)->get();
        ?>
            <div class="content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-11">

                            <div class="card-deck">

                                @foreach($publicaciones as $publicacion)
                                    <span>
                                <a href="{{url('photo')}}/{{ $publicacion->id }}">
                                     <div class="card" style="width: 30rem;">
                                        <img class="card-img-top" src="{{ url($publicacion->imagen) }}" alt="Card image cap">
                                            <div class="card-body">
                                                 <h5 class="card-title"><strong>{{ $publicacion->user->name }}</strong></h5>
                                             </div>
                                    </div>
                              </a></br>
                            </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

    @endsection
    @section('script')
        <script src="{{asset('js/script.js')}}"></script>
            </div>
</div>
@endsection
