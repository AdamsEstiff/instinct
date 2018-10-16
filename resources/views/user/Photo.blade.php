@extends("layouts.app")

@section('content')
    <div class="content">
        <div class="row justify-content-lg-start">
            <div class="col-md-20">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                                    </br>
                                    <div class="card-deck">
                                        <div class="col-md-9">
                                            <div class="card ">
                                    <img class="card-img-top" src="{{ url($publicacion->imagen) }}"
                                         alt="Card image cap">
                                    <p>{{ $publicacion->updated_at }}</p>
                                </div>
                            </div>


                            <div class="card">

                                <div class="card-body">
                                    <a href="{{ url('user') }}/{{ $publicacion->user_id }}">
                                        <p><img src="{{ url($publicacion->user->image) }}" width="90" height="90"
                                                class="d-inline-block align-content-lg-end" alt=""></p>
                                        <h3>{{ $publicacion->user->name}}</h3>
                                    </a>
                                    <div class="card-body">

                                        <table class="table table-borderless">

                                            <?php
                                            $un = \App\ModelsSave\Un::find(1);
                                            $follow1 = \App\ModelsSave\Follow::where('follower_id', '=', Auth::user()->id)->first();
                                            $follow2 = \App\ModelsSave\Follow::where('author_id', '=', $publicacion->id)->first();
                                            if ($follow1 == true && $follow2 == true) {
                                                $var = $un->un;
                                            } else {
                                                $var = $un->blanco;
                                            }
                                            $like1 = \App\ModelsSave\Like::where('user_id', '=', Auth::user()->id)->first();
                                            $like2 = \App\ModelsSave\Like::where('post_id', '=', $publicacion->id)->first();
                                            if ($like1 == true && $like2 == true) {
                                                $var2 = $un->dis;
                                            } else {
                                                $var2 = $un->blanco;
                                            }
                                            $contador = \App\ModelsSave\Like::where('post_id', '=', $publicacion->id)->count();

                                            $contadorFollow = \App\ModelsSave\Follow::where('author_id', '=', $publicacion->user_id)->count();
                                            ?>


                                            <tr>
                                                <th scope="row">
                                                    <form method="post" action="{{ url('like') }}" role="form">

                                                        {{csrf_field() }}

                                                        <span><button type="submit" id="like" class="btn btn-primary">{{$var2}}
                                                                Like</button></span>
                                                        <p></p>
                                                        <span id="cont"><p class="card-text"><small class="text-muted">Likes: {{$contador}}
                                                           </small></p></span>
                                                        <input type="hidden" name="user_id"
                                                               value="{{ Auth::user()->id }}">
                                                        <input type="hidden" name="photo_id"
                                                               value="{{$publicacion->id}}">

                                                    </form>

                                                </th>
                                                <td>
                                                    <form method="post" action="{{url('follow')}}" role="form">
                                                        {{csrf_field() }}
                                                        <span>
                                                       <button type="submit" class="btn follow">{{$var}}Follow</button>
                                                    <p class="card-text"><small class="text-muted">
                                                       <p class="follower">Followers: {{$contadorFollow}}</p></small></p>
                                                   </span>
                                                        <input type="hidden" name="follower_id"
                                                               value="{{ Auth::user()->id }}">
                                                        <input type="hidden" name="author_id"
                                                               value="{{$publicacion->user_id}}">
                                                        <input type="hidden" name="photo_id"
                                                               value="{{$publicacion->id}}">
                                                    </form>
                                                </td>

                                            </tr>

                                            </tbody>
                                        </table>


                                        <div class="card-body">
                                            <h5 class="card-title">Comment</h5>
                                            <p class="card-text">{{ $publicacion->comment }}</p>
                                        </div>
                                    </div>
                                </div>
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
