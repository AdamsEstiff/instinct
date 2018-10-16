@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-lg-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <form action="save" method="POST" enctype="multipart/form-data" role="form">

                            </br>
                            {{csrf_field() }}
                            <div class="card-deck">
                                <label class="card">
                                    <input type="file" name="image" class="custom-file-input btn"
                                           value="{{asset("images/yope.jpg")}}" id="validatedCustomFile required">
                                    <img class="card-img-top" src="{{ Auth::user()->image }}" alt="Card image cap">
                                </label>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-body">
                                            <table class="table table-borderless">
                                                <p>
                                                    <tr>
                                                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                                        <td><strong>Nombre:</strong></td>
                                                        <td><input name="name" type="text"
                                                                   value="{{ Auth::user()->name }}" required></td>
                                                    </tr>
                                                </p>

                                                <p>
                                                    <tr>
                                                        <td><strong>Correo:</strong></td>
                                                        <td><input name="email" type="text"
                                                                   value="{{ Auth::user()->email }}" required></td>
                                                    </tr>
                                                </p>
                                                <p>
                                                    <tr>
                                                        <td><strong>Descripción</strong></td>
                                                        <td><textarea name="descripcion" placeholder="Descripcion..."
                                                                      class="form-control"
                                                                      id="exampleFormControlTextarea1"
                                                                      rows="3">{{ Auth::user()->description }}</textarea>
                                                        </td>
                                                    </tr>
                                                </p>
                                            </table>
                                            <input class="btn btn-primary btn-lg btn-block" type="submit" value="Save">
                                        </div>
                                    </div>
                                </div>
                        </form>
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
