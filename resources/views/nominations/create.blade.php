@extends('layouts.app')

@section('content')

        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    Nominate Someone!

                </div>
                <div class="card-body">
                    <form action="{{route('nominations.store')}}" class="form" method="post">
                        {{csrf_field()}}

                        {{--NOMINEE INFORMATION--}}

                        <div class="panel">
                            <div class="panel-heading">
                                <span class="panel-title">
                                    Nominee Information
                                </span>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                        <input type="text" class="form-control" name="firstName" placeholder="First Name" required>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <input type="text" class="form-control" name="lastName" placeholder="Last Name" required>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--RACE DETAILS--}}

                        <div class="panel">
                            <div class="panel-heading">
                                <span class="panel-title">Race Details</span>
                            </div>
                            <div class="panel-body">

                                <label for="office">Office</label>

                                <input type="text" name="office" id="office" placeholder="U.S. Senator">

                                <label for="district">District</label>

                                <input type="text" name="district" id="district">


                            </div>
                        </div>

                        <div class="card-footer">
                            <input type="submit" class='btn btn-primary' value="Preview Nomination">
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">Race Details</span>
            </div>
            <div class="panel-body">
                <label for="partisan" class="control-label">Partisan Type</label>
                <select name="partisan" id="type" class="form-control">
                    <option value="true">Partisan</option>
                    <option value="false">Non-Partisan</option>
                </select>
                <label for="office" class="control-label">Office</label>
                <input type="text" name="office" class="form-control" placeholder="Office Title">
                <label for="district[name]" class="control-label">District</label>
                <input type="text" name="district[name]" class="form-control" placeholder="Anytown">
                <label for="district[scope]" class="control-label">Scope</label>
                <select name="district[scope]" class="form-control">
                    <option value="national">National</option>
                    <option value="statewide">Statewide</option>
                    <option value="congressional">Congressional</option>
                    <option value="county">County</option>
                    <option value="city">City</option>
                    <option value="specialDistrict">Special District</option>
                </select>
                <label for="filingDeadline" class="control-label">Filing Deadline</label>
                <div class="input-group date">
                    <input type="text" name="filingDeadline" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                </div>
                <label for="nextElection" class="control-label">Next Election</label>
                <div class="input-group date">
                    <input type="text" name="nextElection" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                </div>
                <label for="notes" class="control-label">How to file</label>
                <textarea name="notes" class="form-control" placeholder="Where to file, how many signatures, application cost, etc. "></textarea>
                <label for="infoSource" class="control-label">Contest Information</label>
                <input type="text" name="infoSource" class="form-control" placeholder="www.secretaryofstate.ma.gov/electioninfo">
            </div>
        </div>

        {{--<div class="panel">--}}
            {{--<div class="panel-heading">--}}
                {{--<span class="panel-title">Nomination Support</span>--}}
            {{--</div>--}}
            {{--<div class="panel-body">--}}
                {{--<h3>How can you support a campaign?</h3>--}}
                {{--<input type="checkbox" value="1" name="walk">--}}
                {{--<label for="walk">I can go door to door to speak to voters.</label>--}}
                {{--<br>--}}
                {{--<input type="checkbox" value="1" name="call">--}}
                {{--<label for="call">I can call and speak to voters by phone.</label>--}}
                {{--<br>--}}
                {{--<input type="checkbox" value="1" name="host">--}}
                {{--<label for="host">I can host a fundraiser and invite people.</label>--}}
                {{--<br>--}}
                {{--<input type="checkbox" value="1" name="yardSign">--}}
                {{--<label for="yardSign">I can put a yard sign in front of my home.</label>--}}
                {{--<br>--}}
                {{--<input type="checkbox" value="1" name="sign">--}}
                {{--<label for="sing">I will sign nomination paperwork.</label>--}}
                {{--<br>--}}
                {{--<label for="donate">How much would you be willing to donate to a campaign for this office?</label>--}}
                {{--<div class="input-group">--}}
                    {{--<div class="input-group-addon">$</div>--}}
                    {{--<input type="text" class="form-control" id="exampleInputAmount" placeholder="50">--}}
                    {{--<div class="input-group-addon">.00</div>--}}
                {{--</div>--}}
                {{--<span id="helpBlock" class="help-block">Your specific donation pledge won't be shared, but is only--}}
                {{--to help potential candidates to understand the amount of campaign support that may be available.</span>--}}

                {{--<label for="issues">What are some of the issues which are important to you in this campaign?</label>--}}
                {{--<textarea name="issues" id="" cols="30" rows="5" class="form-control"></textarea>--}}
                {{--<span id="helpBlock" class="help-block">This will be shared with other supporters and potential candidates.</span>--}}


            {{--</div>--}}
        {{--</div>--}}


@stop

@push('style')
    <link href="{{'/css/bootstrap-datepicker.min.css'}}" rel="stylesheet">

@endpush

@push('scripts')
    <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <script src="{{'/js/bootstrap-datepicker.min.js'}}"></script>
    <script>
        {{--var getOffices = function () {--}}
        {{--var address = $('#address').val();--}}
        {{--$.ajax({--}}
        {{--url: 'https://www.googleapis.com/civicinfo/v2/representatives?key={{env('GAPI')}}&address=' + address--}}
        {{--}).done(function(data)--}}
        {{--{--}}
        {{--updateOfficeList(data.offices)--}}
        {{--});--}}
        {{--}--}}
        {{--var updateOfficeList = function(data)--}}
        {{--{--}}
        {{--$('#offices').html('<option value="">Select One</option><option value="other">Other Office</option>');--}}
        {{--$('#officesWrapper').removeClass('hidden');--}}
        {{--data.forEach(function(i)--}}
        {{--{--}}
        {{--$('#offices').append('<option value="' + i.divisionId + '">' + i.name + '</option>');--}}
        {{--})--}}
        {{--}--}}
        $('.input-group.date').datepicker({
        });
    </script>
@endpush