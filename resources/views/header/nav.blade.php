<nav class="navbar navbar-light">
    <form method="GET" action="{{url('search')}}" class="form-inline" role="search">
        {{csrf_field() }}
        <input id="search" class="form-control mr-sm-2" type="search" name="buscar" placeholder="Search" aria-label="Search"
               required>

    </form>
</nav>
@section('script')
    <script src="{{asset('js/script.js')}}"></script>
@endsection
