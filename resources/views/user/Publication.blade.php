@extends('layouts.app')


@section('content')
    <div class="row justify-content-center">
        <div class=" row">
            <div class="col-sm-13">

                <div class="card">

                    <form class="needs-validation" action="add" method="POST" enctype="multipart/form-data" role="form"
                          novalidate>
                        <div class="form-row">
                            <div class="col-sm-6">
                                <input type="file" name="image" class="custom-file-input btn"
                                       value="{{asset("images/yope.jpg")}}" id="validatedCustomFile "
                                       required>
                                <img class="card-img-top" src="{{asset("images/agregar.png")}}"
                                     alt="Card image cap">

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
                                               id="validationCustom01" placeholder="Nombre" required>
                                        <label for="validationCustom02">Cantidad</label>
                                        <input type="number" name="cantidad" class="form-control"
                                               id="validationCustom02" placeholder="Cantidad" required>


                                        <label for="validationCustom03">Precio</label>
                                        <input type="number" name="precio" class="form-control"
                                               id="validationCustom03" placeholder="Precio" required>

                                        <label for="validationCustom05">Contacto</label>
                                        <input type="text" name="Contacto" class="form-control"
                                               id="validationCustom05" placeholder="Contacto" required>

                                        <label for="validationCustom06">Dirección</label>
                                        <input type="text" name="Direccion" class="form-control"
                                               id="validationCustom06" placeholder="Dirección" required>

                                        <label for="validationCustom07">Comentario</label>
                                        <input type="text" name="comment" class="form-control"
                                               id="validationCustom07" placeholder="Comentario" required>
                                    </div>
                                    </div>


                            </div>
                        </div>
                        <input value="Publicar" type="submit" class="btn btn-outline-primary">
                        <a href="home" class="btn btn-outline-danger">Cancel</a>
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
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
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
