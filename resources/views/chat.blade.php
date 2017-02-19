@extends('layouts.app')

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                Chat
            </div>
            <div class="panel-body">
                <chat-log :messages="messages"></chat-log>
                <chat-composer v-on:messagesent="addMessage"></chat-composer>
            </div>
        </div>
    </div>
@endsection