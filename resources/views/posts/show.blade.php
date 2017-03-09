@extends('layouts.app')

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span>
                    Post By Renato Hysa
                </span>
                <span class="pull-right">
                    {{ $oPost->created_at->diffForHumans() }}
                </span>
            </div>
            <div class="panel-body">
                {{ $oPost->content }}
            </div>
        </div>
    </div>
@endsection