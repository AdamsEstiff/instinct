@extends('layouts.app')
@section('content')

    <div class="content">
        <div class="row justify-content-lg-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <form  class="needs-validation" action="save" method="POST" enctype="multipart/form-data" role="form" novalidate>

                            </br>
                            {{csrf_field() }}
                            <div class="card-deck">
                                <label class="card">
                                    <input type="file" name="image" id="image" class="custom-file-input btn">

                                    <div id="imagePreview">
                                        <img class="card-img-top" src="{{Auth::user()->image}}"
                                             alt="Card image cap">
                                    </div>

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
                                                                   value="{{ Auth::user()->name }}" class="form-control"
                                                                   id="validationCustom01" required></td>
                                                    </tr>
                                                </p>
                                                <p>
                                                    <tr>
                                                        <td><strong>Correo:</strong></td>
                                                        <td><input name="email" type="text"
                                                                   value="{{ Auth::user()->email }}"class="form-control"
                                                                   id="validationCustom02" required></td>
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
        (function () {
            function filePreview(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#imagePreview').html("<img class='img-fluid img-thumbnail' src='" + e.target.result + "'/>");
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $('#image').change(function () {
                filePreview(this);
            })
        })();
    </script>
@endsection
