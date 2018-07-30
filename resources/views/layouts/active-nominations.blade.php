<div class="card">
    <div class="card-header">Active Nominations New</div>

    <div class="card-body">
        <add-nomination></add-nomination>
    </div>

    <div class="card-body">
        <div class="list-group">
            @foreach(\Illuminate\Support\Facades\Auth::user()->supportedNominations as $nomination)
                <div class="list-group-item nomination">
                    <div class="name">{{ $nomination->name }}</div>
                    <div class="nominationInfo">
                        <span class="office">{{ $nomination->office}}</span> -
                        <span class="district">{{ $nomination->district}}</span>
                    </div>
                    <div class="nominationCount">{{ $nomination->count}} {{ str_plural('Nomination', $nomination->count)}}</div>
                </div>
            @endforeach
        </div>
    </div>
</div>