@extends('headerprofile')
@section('page')
<br>
<div class="container profilemenu">
    <div class="row">
        <div class ="col-12 text-left">
            <br>
            <h4>Trip created by {{ $user -> userFirstName}}</h4>
            <br>
        </div>
        @foreach($trip as $trip)
        <div class ="col-4 text-center mb-4">
            <a href="../GuideTrip/{{ $guideTrip -> tripId }}">
                <img src="../images/trippic/{{ $guideTrip -> tripPicture}}" class="img-responsive" height="150px">
                <div class="mt-2">
                    <h4>{{ $trip -> tripName }}</h4>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>



@endsection