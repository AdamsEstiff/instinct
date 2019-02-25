@extends('layouts.app')


@section('content')
    <div class="row justify-content-center">
        <div class=" row">
            <div class="col-sm-13">

                <div class="card">

                    <form class="card-header" action="editPhoto" method="POST" enctype="multipart/form-data" role="form">
                        <div class="row">
                            <div class="col-sm-6">

                                <label class="card">
                                    <input type="file" name="image" class="custom-file-input btn"
                                           value="{{asset("images/yope.jpg")}}" id="validatedCustomFile "
                                           required>
                                    <img class="card-img-top" src="{{asset($edit->imagen)}}"
                                         alt="Card image cap">
                                </label>

                                <div class="input-group">

                                </div><input name="user_id" type="hidden" value="{{Auth::User()->id}}">
                                <input name="publi_id" type="hidden" value="{{$edit->id}}">
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="container-fluid">
                                        </br>
                                        {{csrf_field() }}

                                        <div class="container-fluid">
                                            <h3 for="formGroupExampleInput">Datos Iniciales</h3>
                                            <label for="inputEmail4">Nombre</label>
                                            <input type="text" name="nombre_p" value="{{$edit->nombre_p}}" class="form-control">
                                            </br>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="inputEmail4">Cantidad</label>
                                                    <input class="form-control" type="number" name="cantidad"
                                                           value="{{$edit->precio}}">
                                                </div>
                                                <div class="col">
                                                    <label for="inputEmail4">Precio</label>
                                                    <input class="form-control" type="number" name="precio"value="{{$edit->precio}}">
                                                </div>
                                            </div>
                                            </br>
                                            <label for="inputEmail4">Contacto</label>
                                            <input class="form-control" type="text" name="contacto" value="{{$edit->contacto}}">
                                            <label for="inputEmail4">Dirección</label>
                                            <input class="form-control" type="text" name="dirrecion" value="{{$edit->dirrecion}}">
                                            <label for="inputEmail4">Comentario</label>
                                            <textarea class="form-control" type="text" name="comment">{{$edit->comment}}</textarea>
                                            <label for="inputEmail4">Descripción</label>
                                            <textarea class="form-control" name="descripcion"
                                                      class="form-control"
                                                      id="exampleFormControlTextarea1" rows="2">{{$edit->descripcion}}</textarea>
                                            </br>


                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="container" id="button-addon4">
                            <button class="btn btn-outline-primary" type="submit">Editar</button>

                            <a href="{{asset('home')}}" class="btn btn-outline-danger">Salir</a>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>

    @include('user.search2')
@endsection
@section('script')
    <script src="{{ asset('js/script.js') }}"></script>
@endsection
