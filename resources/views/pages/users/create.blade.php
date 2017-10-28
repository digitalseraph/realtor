@extends('layouts.app-admin')

@section('page-header', 'Create User')

@section('page-header-subtext', 'Create a new user.')

@section('content')
<div class="container">
    {!! Form::open(['route' => 'admin.users.store', 'class' => '']) !!}
        @include('pages.users._form')

        <div class="row hidden-xs hidden-sm">
            <div class="col-md-6 col-md-offset-3">
                <a href="{{ URL::previous() }}" role="button" class="btn btn-default pull-left" >Cancel</a>
                {!! Form::submit('Create User', ['class' => 'btn btn-primary pull-right']) !!}
            </div>
        </div>
        <div class="row hidden-md hidden-lg hidden-xl">
            <div class="col-md-12">
                {!! Form::submit('Create User', ['class' => 'btn btn-primary btn-block']) !!}
                <a class="btn btn-default btn-block" href="{{ URL::previous() }}" role="button">Cancel</a>
            </div>
        </div>
    {!! Form::close() !!}
</div>
@endsection
