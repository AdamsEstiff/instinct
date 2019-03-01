@extends('layouts.app')


@section('content')
    <div class="row justify-content-center">
        <div class=" row">
            <div class="col-sm-13">

                <div class="card">

                    <form class="needs-validation" action="add" method="POST" enctype="multipart/form-data" role="form"
                          novalidate>
                        <div class="form-row">
                            <div class="col-sm-6 ">
                                <label class="card" >
                                    <input type="file" name="image" class="custom-file-input btn"
                                           id="validatedCustomFile "
                                           required>
                                    <img class="card-img-top" src="{{$edit->imagen}}"
                                         alt="Card image cap"style="max-width: 700px">
                                </label>
                                <div style="margin-top:50%" class="container text-center" id="button-addon4">
                                    <button class="btn btn-outline-primary" type="submit">Publicar</button>

                                    <a href="{{asset('home')}}" class="btn btn-outline-danger">Salir</a>

                                </div>
                                <div class="input-group">
                                    <input name="user_id" type="hidden" value="{{Auth::User()->id}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="container-fluid">
                                        </br>
                                        {{csrf_field() }}

                                        <label for="validationCustom01">Nombre</label>
                                        <input type="text" name="nombre_p" class="form-control"
                                               id="validationCustom01" value="{{$edit->nombre_p}}"  required>
                                        <label for="validationCustom02">Cantidad</label>
                                        <input type="number" name="cantidad" class="form-control"
                                               id="validationCustom02" value="{{$edit->cantidad}}" required>


                                        <label for="validationCustom03">Precio</label>
                                        <input type="number" name="precio" class="form-control"
                                               id="validationCustom03" value="{{$edit->precio}}" required>
                                        <label for="validationCustom06">Descripción</label>
                                        <input type="text" name="descripcion" class="form-control"
                                               id="validationCustom06" value="{{$edit->descripcion}}" required>

                                        <label for="validationCustom06">Dirección</label>
                                        <input type="text" name="dirrecion" class="form-control"
                                               id="validationCustom06" value="{{$edit->dirrecion}}" required>

                                        <label for="validationCustom05">Contacto</label>
                                        <textarea type="text" name="contacto" class="form-control"
                                                  id="validationCustom05" required>{{$edit->contacto}}</textarea>

                                        <label for="validationCustom07">Comentario</label>
                                        <textarea type="text" name="comment" class="form-control"
                                                  id="validationCustom07" required>{{$edit->comment}}</textarea>
                                        <br>
                                    </div>
                                </div>


                            </div>
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
    <script>

        (function () {
            'use strict';
            window.addEventListener('load', function () {

                var forms = document.getElementsByClassName('needs-validation');

                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection
