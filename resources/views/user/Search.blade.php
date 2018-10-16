@extends("layouts.app")
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Resultados de la busqueda</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($user as $users)
                                <a href="user/{{ $users->id }}">
                                    <li class="list-group-item">
                                        <table class="table table-borderless">
                                            <thead>
                                            <tr>
                                                <th scope="row"><img src="{{url($users->image)}}" width="70" height="70"
                                                                     class="d-inline-block align-content-lg-end"
                                                                     alt="Responsive image"></th>
                                                <td colspan="2"><br>{{ $users->name }}</td>
                                                <td><br>{{$users->email}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </li>
                                </a>
                            @endforeach
                            @foreach($publicacion as $publicaciones)
                                <a href="photo/{{ $publicaciones->id }}">
                                    <li class="list-group-item">
                                        <table class="table table-borderless">

                                            <tr>
                                                <th scope="row"><img src="{{url($publicaciones->imagen)}}" width="70"
                                                                     height="70"
                                                                     class="d-inline-block align-content-lg-end"
                                                                     alt="Responsive image"></th>
                                                <td colspan="2"><br> {{$publicaciones->comment}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                </a>
                                @endforeach
                                </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('search2')
@endsection
@section('script')
    <script src="{{ asset('js/script.js') }}"></script>
@endsection
