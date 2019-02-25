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
                                            <tr>
                                                <th scope="row">
                                                    <form method="post" action="{{ url('like') }}" role="form">

                                                        {{csrf_field() }}
                                                        <p></p>
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
                                                   </span>
                                                        <input type="hidden" name="author_id"
                                                               value="{{$publicacion->user_id}}">
                                                        <input type="hidden" name="photo_id"
                                                               value="{{$publicacion->id}}">
                                                    </form>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
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
