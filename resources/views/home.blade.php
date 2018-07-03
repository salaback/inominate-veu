@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <active-nominations></active-nominations>
        </div>
        <div class="col-sm-7">
            {{--<add-nomination v-if="app.addNomination"></add-nomination>--}}
        </div>
    </div>
</div>
@endsection
