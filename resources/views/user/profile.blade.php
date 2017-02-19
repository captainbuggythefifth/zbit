@extends('layouts.app')

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-body text-center">
                <img class="profile-img" src="http://www.lovemarks.com/wp-content/uploads/profile-avatars/default-avatar.png" alt="">
                <h1>{{ $oUser->name }}</h1>
                <h3>{{ $oUser->email }}</h3>
                <h5>{{ $oUser->dob->format('l j F Y') }}({{ $oUser->dob->age }} years old)</h5>
                <button class="btn btn-success">Follow</button>
            </div>
        </div>
    </div>
@endsection