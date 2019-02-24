@extends('layouts.app')


@section('content')
    <div class="content">
        <div class="row justify-content-center">
            <div class=" text-center">
                <div class="col-md-12">

                    <div class="card">
                        <form class="card-header" action="add" method="POST" enctype="multipart/form-data" role="form">
                            <div class="input-group">
                                <input name="user_id" type="hidden" value="{{Auth::User()->id}}">



                            </div>
                            <h3 for="formGroupExampleInput">Datos Iniciales</h3>
                            <label for="inputEmail4">Nombre</label>
                            <input type="text" name="nombre_p" placeholder="Nombre" class="form-control">
                            <label for="inputEmail4">Cantidad</label>
                            <input class="form-control" type="number" name="cantidad" placeholder="Cantidad">
                            <label for="inputEmail4">Precio</label>
                            <input class="form-control" type="number" name="precio" placeholder="Precio">
                            <label for="inputEmail4">Contacto</label>
                            <input class="form-control" type="text" name="contacto" placeholder="Contacto">
                            <label for="inputEmail4">Dirección</label>
                            <input class="form-control" type="text" name="dirrecion" placeholder="Direccion">
                            <label for="inputEmail4">Comentario</label>
                            <textarea class="form-control" type="text" name="comment" placeholder="Comentario"></textarea>
                            <label for="inputEmail4">Descripción</label>
                            <textarea class="form-control" name="descripcion" placeholder="Descripcion..." class="form-control"
                                      id="exampleFormControlTextarea1" rows="2"></textarea>
                            <div class="input-group-append" id="button-addon4">
                                <button class="btn btn-primary" type="submit">Publicar</button>
                                <a href="{{asset('home')}}" class="btn btn-danger">Cancelar</a>
                            </div>

                            <div class="card-body">
                                </br>
                                {{csrf_field() }}
                                <label class="card">
                                    <input type="file" name="image" class="custom-file-input btn"
                                           value="{{asset("images/yope.jpg")}}" id="validatedCustomFile " required>
                                    <img class="card-img-top" src="{{asset("images/agregar.png")}}"
                                         alt="Card image cap">
                                </label>
                            </div>
                        </form>
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
