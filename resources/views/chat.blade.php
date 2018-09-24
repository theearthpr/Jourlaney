@extends('headernav')
@section('page')
<div class="container">
    <div class="row navGap">
            <div class="col-1">
                <img src="../images/profilepic/{{$query[0]->userProfileImage}}" class="profileImageTrip">
            </div>
            <div class="col-11">
                <h3>Chat with <a href="/Profile/{{ $query[0] -> username }}">{{ $query[0] -> userFirstName }}</a></h3>
                <h4 class="chat-trip-title">on {{ $query[0] -> tripName }} trip</h4>
            </div>
    </div>
    <div class="row mt-4 chat-body">
        <div class="col-3 chat-left">
            @foreach( $chatList as $chatLists )
            <a href="/chat/{{ $chatLists -> chatRoomId }}">
                <div class="row chatListBox">
                    <div class="col-4 mt-4 mb-4">
                        <img src="../images/profilepic/{{$query[0]->userProfileImage}}" class="profileImageChat">
                    </div>
                    <div class="col-8 mt-4 mb-4">
                        <p>{{ $chatLists -> userFirstName }}</p>
                        <p>{{ $chatLists -> chatText }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="col-6 chat-middle">
            @foreach( $query as $query )
                {{ $query -> chatText }}<br>
            @endforeach
            <form method="POST" action="{{URL::to('/sendChat')}}">
            <input type="hidden" name="chatRoomId" value="{{ $chatRoomId }}">
            <input type="hidden" name="guideId" value="{{ $chatLists -> guideId }}">
            <input type="hidden" name="touristId" value="{{ $chatLists -> touristId }}">
            <input type="hidden" name="guideTripId" value="{{ $chatLists -> guideTripId }}">
            
                <div class="input-group chat-form">
                    <input type="text" class="form-control" id="msg" name="msg">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </form>
        </div>
        <div class="col-3 chat-right">
            <div class="row mt-4">
                <div class="col-12">
                    <p class="center-div">You're chatting with {{ $query -> userFirstName }}</p>
                    <p class="center-div">on {{ $query -> tripName }} trip</p>
                    <p class="center-div">Status: </p>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        setInterval(function() {
        $('.container').load('{{ route('showChat') }}');
        }, 2000);
});   
</script>
@endsection