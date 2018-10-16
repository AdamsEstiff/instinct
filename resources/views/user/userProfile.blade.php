@extends('layouts.app')
<div class="flex-center position-center full-height">
    @section('content')
        @include('user.search2')
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Dashboard</div>
                        <div class="card-body">
                            </br>

                            <?php
                            $un = \App\ModelsSave\Un::find(1);
                            $follow1 = \App\ModelsSave\Follow::where('follower_id', '=', Auth::user()->id)->first();
                            $follow2 = \App\ModelsSave\Follow::where('author_id', '=', $user->id)->first();
                            if ($follow1 == true && $follow2 == true) {
                                $var = $un->un;
                            } else {
                                $var = $un->blanco;
                            }
                            $contadorFollow = \App\ModelsSave\Follow::where('author_id', '=', $user->id)->count();
                            ?>
                            <div class="card-deck">
                                <div class="card">

                                    <img class="card-img-top" src="{{url($user->image) }}" alt="Card image cap">

                                    <div class="card-body">
                                        <h5 class="card-title">{{$user->name }}</h5>

                                        <p class="card-text">{{ $user->description }}</p>
                                        <div class="card text-center" style="width: 100%;">
                                            <div class="card-body">
                                                <form method="post" action="{{url('follow')}}" role="form">
                                                    {{csrf_field() }}

                                                    <button type="submit" class="btn follow">{{$var}}Follow</button>
                                                    <p class="card-text">
                                                        <small class="text-muted">
                                                    <p class="follower">Followers: {{$contadorFollow}}</p></small></p>
                                                    <input type="hidden" name="follower_id"
                                                           value="{{ Auth::user()->id }}">
                                                    <input type="hidden" name="author_id" value="{{$user->id}}">
                                                    <input type="hidden" name="photo_id" value="{{$user->id}}">
                                                </form>

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

    @endsection
    @section('script')
        <script src="{{asset('js/script.js')}}"></script>
@endsection
