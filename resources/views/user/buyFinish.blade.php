@extends('layouts.app')
<div class=" flex-center position-center full-height">

    @section('content')
        <div class="row justify-content-lg-center">
            <div class="content card col-md-7 ">
                    <div class="" role="alert">
                        <br>
                        <h4 class="alert-heading">En Hora Buena!</h4>
                        <p class="alert alert-success">{{$messaje}} {{$comprador->name}} Estamos para servile.</p>
                        <hr>
                        <table>
                            <tr scope="row" >
                                <img  class=" mb-3 col-md-5" src="{{ url($producto->imagen) }}"
                                      alt="Card image cap" >
                            </tr>
                            <th> &nbsp &nbsp Su compra fue {{$producto->nombre_p}}</th>


                        </table>
                        <br>
                        <a href="{{asset('/')}}" type="button" class="btn btn-primary btn-lg btn-block">Volver</a>
                        <br>

                    </div>

            </div>


        </div>


        @include('user.search2')
    @endsection
    @section('script')
        <script src="{{ asset('js/script.js') }}"></script>
@endsection
