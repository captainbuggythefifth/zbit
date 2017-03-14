@extends('layouts.app')

@section('content')
<div class="container custom-container">
    <div class="col-sm-12 col-md-6 col-lg-offset-3">
        <div class="panel">
            <div class="panel-heading">
                Comments
            </div>
            <div class="panel-body">
                @foreach($aActivities['oComments'] as $oComment)
                    <div class="row">
                        <div class="col-sm-12">
                            ALALALH!
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="panel-footer"></div>
        </div>

        <div class="panel">
            <div class="panel-heading">
                Likes
            </div>
            <div class="panel-body">
                @foreach($aActivities['oLikes'] as $oLike)
                    <div class="row">
                        <div class="col-sm-12">
                            ALALALH!
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="panel-footer"></div>
        </div>
    </div>
</div>
@endsection