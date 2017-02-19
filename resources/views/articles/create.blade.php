@extends('layouts.app')

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                Create Article
            </div>
            <div class="panel-body">
                <form method="post" action="/articles">
                    {{ csrf_field() }}
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
                    </div>
                    <div class="checkbox">
                        <label for="live">
                            <input type="checkbox" id="live" name="live">
                            Live
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="post_on">Post On</label>
                        <input class="form-control" type="datetime-local" id="post_on" name="post_on">
                    </div>
                    <input class="btn btn-success pull-right" type="submit">
                </form>
            </div>
        </div>
    </div>
@endsection