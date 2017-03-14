@extends('layouts.app')

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span>
                    Post By {{ $oPost->user->name }}
                </span>
                <span class="pull-right">
                    {{ $oPost->created_at->diffForHumans() }}
                </span>
            </div>
            <div class="panel-body">
                {{ $oPost->content }}
            </div>
            <div class="panel-footer clearfix" style="background-color: white">
                <div class="posts-options-container-right">
                    <div class="posts-options-left">

                    </div>
                    <div class="posts-options-right pull-right">
                        @if(Auth::user()->id == $oPost->user_id)
                            <a href="/posts/{{ $oPost->id }}/edit">
                                <i class="fa fa-edit"></i>
                            </a>
                        @endif
                        <a href="/likes/post/{{ $oPost->id }}">
                            <i class="fa fa-heart"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection