@extends('layouts.app')

@section('content')
    <div class="container custom-container">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    @if($oUser->avatar == null || $oUser->avatar == null)
                        <img class="profile-img" src="http://www.lovemarks.com/wp-content/uploads/profile-avatars/default-avatar.png" alt="">
                    @endif
                    <h1>{{ $oUser->name }}</h1>
                    <h3>{{ $oUser->email }}</h3>
                    @if($oUser->dob != null)
                        <h5>{{ $oUser->dob->format('l j F Y') }}({{ $oUser->dob->age }} years old)</h5>
                    @endif
                    @if($oUser['bOwner'])
                        <a href="/profile/edit" class="btn btn-success">Edit</a>
                    @else
                        <button class="btn btn-success">Follow</button>
                    @endif

                </div>
            </div>

            @forelse($oUser['oPosts'] as $aPost)
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span>{{ $oUser->name }}</span>
                                <span class="pull-right">
                        {{ $aPost->created_at->diffForHumans() }}
                    </span>
                            </div>
                            <div class="panel-body">
                                {{ $aPost->shortContent  }}
                                <a href="/posts/{{ $aPost->id }}">Read More</a>
                            </div>
                            <div class="panel-footer clearfix" style="background-color: white">
                                <div class="posts-options-container pull-right">
                                    <a href="/posts/{{ $aPost->id }}/edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
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
    </div>

@endsection