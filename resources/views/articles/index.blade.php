@extends('layouts.app')

@section('content')
    <div class="custom-container">
        @forelse($aArticles as $aArticle)
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>Gau</span>
                        <span class="pull-right">
                        {{ $aArticle->created_at->diffForHumans() }}
                    </span>
                    </div>
                    <div class="panel-body">
                        {{ $aArticle->shortContent  }}
                        <a href="/articles/{{ $aArticle->id }}">Read More</a>
                    </div>
                    <div class="panel-footer clearfix" style="background-color: white">
                        <i class="fa fa-heart pull-right"></i>
                    </div>
                </div>
            </div>
        @empty
            <p>No Articles Found :/</p>
        @endforelse
    </div>
    <div class="custom-container">
        <div class="col-md-6 col-md-offset-3">
            <div class="links-container">
                {{ $aArticles->links() }}
            </div>
        </div>
    </div>

@endsection