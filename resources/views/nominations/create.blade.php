@extends('layouts.app')

@section('content')
        <div class="row" id="createNomination">
            <div class="col-sm-12">
                <div class="card">

                    <form action="{{route('nominations.store')}}" class="form" method="post">
                        {{csrf_field()}}
                        <div class="card-header">
                            Nominate Someone!

                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{--NOMINEE INFORMATION--}}

                            <div class="panel">
                                <div class="panel-body">
                                    <h4>Nomination Details</h4>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6">
                                            <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{old('first_name')}}" required>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{old('last_name')}}"required>
                                        </div>
                                            <div class="col-md-4 col-sm-12">
                                            <input type="email" class="form-control" name="email" placeholder="Email" value="{{old('email')}}" required>
                                        </div>
                                    </div>
                                    <br>
                                    <h4>Election Details</h4>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="office">Office</label>

                                            <input type="text" class="form-control" name="office" id="office" value="{{old('office')}}" placeholder="U.S. Senator">

                                        </div>
                                        <div class="col-sm-6">
                                            <label for="district">District</label>

                                            <input type="text" class="form-control" name="district" id="district" value="{{old('district')}}" placeholder="California's 5th Congressional District">
                                        </div>
                                    </div>
                                    <br>
                                    <h4>Nomination Support</h4>
                                    <div class="row">
                                        <div class="col-6">
                                            <strong>How can you support a campaign?</strong><br>
                                            <input type="checkbox" value="1" name="walk" {{ (old('walk') == true) ? 'checked' : ''}} >
                                            <label for="walk">I can go door to door to speak to voters.</label>
                                            <br>
                                            <input type="checkbox" value="1" name="call" {{ (old('walk') == true) ? 'call' : ''}} >
                                            <label for="call">I can call and speak to voters by phone.</label>
                                            <br>
                                            <input type="checkbox" value="1" name="host" {{ (old('host') == true) ? 'checked' : ''}} >
                                            <label for="host">I can host a fundraiser and invite people.</label>
                                            <br>
                                            <input type="checkbox" value="1" name="yardSign" {{ (old('yardSign') == true) ? 'checked' : ''}} >
                                            <label for="yardSign">I can put a yard sign in front of my home.</label>
                                            <br>
                                            <input type="checkbox" value="1" name="signPetition" {{ (old('signPetition') == true) ? 'checked' : ''}} >
                                            <label for="signPetition">I will sign nomination paperwork.</label>
                                            <br>
                                        </div>
                                        <div class="col-6">
                                            <label for="contribution"><strong>How much would you be willing to donate to a campaign for this office? </strong> Your specific donation pledge won't be shared, but is used
                                                to help potential candidates to understand the amount of total support that may be available.</label>
                                            <div class="input-group col-sm-offset-3 col-sm-6">

                                                <div class="input-group-addon">$</div>
                                                <input type="text" class="form-control" id="contribution" name="contribution" value="{{old('contribution')}}" placeholder="50">
                                                <div class="input-group-addon">.00</div>
                                            </div>


                                        </div>
                                    </div>
                                    <label for="issues"><strong>What are some of the issues which are important to you in this campaign?</strong></label>
                                    <textarea name="statement" id="" cols="30" rows="5" class="form-control"></textarea>
                                    <span id="helpBlock" class="help-block">This will be shared with other supporters and potential candidates.</span>

                                </div>
                            </div>


                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Submit Nomination</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    @endsection