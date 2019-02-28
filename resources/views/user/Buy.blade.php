@extends('layouts.app')


@section('content')
    <div class="container">
        <form class="needs-validation" novalidate>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Nombre Completo</label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Freddy" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Direccion</label>
                    <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Torres" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationCustomUsername">Contacto</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                        </div>
                        <input type="text" class="form-control" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            Please choose a username.
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationCustom03">Ciudad</label>
                    <input type="text" class="form-control" id="validationCustom03" value="1" placeholder="Cuidad" required>
                    <div class="invalid-feedback">
                        Please provide a valid city.
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="validationCustom04">Cantidad</label>
                    <input type="text" class="form-control" id="validationCustom05" placeholder="" required>
                    <div class="invalid-feedback">
                        Please provide a valid zip.
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                        Agree to terms and conditions
                    </label>
                    <div class="invalid-feedback">
                        You must agree before submitting.
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="col-md-6 mb-3">
                    <img class="col-md-6 mb-3" src="{{ url($publicacion->imagen) }}"
                         alt="Card image cap"  >
                    <p>{{ $publicacion->updated_at }}</p>
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Confirmar Compra</button>
        </form>

        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
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
    </div>

    @include('user.search2')
@endsection
@section('script')
    <script src="{{ asset('js/script.js') }}"></script>
@endsection

