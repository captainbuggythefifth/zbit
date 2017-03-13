@extends('layouts.app')

@section('content')
    <div class="custom-container">
        @forelse($aPosts as $aPost)
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span> <a href="/profile/{{ (isset($aPost->user->username) ? $aPost->user->username : $aPost->user->id ) }}">{{ $aPost->user->name }}</a></span>
                        <span class="pull-right">
                        {{ $aPost->created_at->diffForHumans() }}
                    </span>
                    </div>
                    <div class="panel-body">
                        {{ $aPost->shortContent  }}
                        <a href="/posts/{{ $aPost->id }}">Read More</a>
                    </div>
                    <div class="panel-footer clearfix" style="background-color: white">
                        <div class="posts-options-container-right">
                            <div class="posts-options-left">

                            </div>
                            <div class="posts-options-right pull-right">
                                @if(Auth::user()->id == $aPost->user_id)
                                    <a href="/posts/{{ $aPost->id }}/edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                @endif
                                <a href="/likes/posts/{{ $aPost->id }}">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>No Posts Found :/</p>
        @endforelse
    </div>
    <div class="custom-container">
        <div class="col-md-6 col-md-offset-3">
            <div class="links-container">
                {{ $aPosts->links() }}
            </div>
        </div>
    </div>

@endsection