@extends('layouts.app')

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span>
                    Article By Renato Hysa
                </span>
                <span class="pull-right">
                    {{ $oArticle->created_at->diffForHumans() }}
                </span>
            </div>
            <div class="panel-body">
                {{ $oArticle->content }}
            </div>
        </div>
    </div>
@endsection