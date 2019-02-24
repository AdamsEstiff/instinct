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
                                <textarea name="descripcion" placeholder="Descripcion..." class="form-control"
                                          id="exampleFormControlTextarea1" rows="1"></textarea>
                                <div class="input-group-append" id="button-addon4">
                                    <button class="btn btn-primary" type="submit">Publicar</button>
                                    <a href="{{asset('home')}}" class="btn btn-danger">Cancelar</a>
                                </div>
                            </div>
                            <input type="text" name="nombre_p" placeholder="nombre">
                            <input type="number" name="cantidad" placeholder="cantidad">
                            <input type="number" name="precio" placeholder="precio">
                            <input type="text" name="contacto" placeholder="contacto">
                            <input type="text" name="dirrecion" placeholder="direccion">
                            <textarea type="text" name="comment" placeholder="comentario"></textarea>

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
