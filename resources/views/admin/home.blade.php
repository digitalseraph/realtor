@extends('layouts.app-admin')

@section('page-header', 'Admin Dashboard')

@section('page-header-subtext', 'Admin dashboard homepage')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as an Admin!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
