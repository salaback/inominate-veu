@extends('layouts.app')

@section('content')

    <div class="col-md-5">
        @include('layouts.active-nominations')
    </div>
    <div class="col-sm-7">
        @yield('content')
    </div>

@endsection