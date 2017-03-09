@extends('layouts.app')

@section('content')
    <div class="custom-container">
        @forelse($aPosts as $aPost)
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>Gau</span>
                        <span class="pull-right">
                        {{ $aPost->created_at->diffForHumans() }}
                    </span>
                    </div>
                    <div class="panel-body">
                        {{ $aPost->shortContent  }}
                        <a href="/posts/{{ $aPost->id }}">Read More</a>
                    </div>
                    <div class="panel-footer clearfix" style="background-color: white">
                        <i class="fa fa-heart pull-right"></i>
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