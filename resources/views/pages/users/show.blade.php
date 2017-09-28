@extends('layouts.app-admin')

@section('page-header', 'View User')

@section('page-header-subtext', 'View an existing user.')

@section('content')
<div class="container">
    {!! Form::model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'put', 'class' => '']) !!}
        {!! Form::hidden('id', $user->id) !!}

        <fieldset disabled>
            @include('pages.users._form')
        </fieldset>

        <div class="row hidden-xs hidden-sm">
            <div class="col-md-6 col-md-offset-3">
                <a href="{{ route('admin.users.index') }}" 
                    class="btn btn-default pull-left" 
                    title="Cancel changes"
                    role="button">Cancel</a>
                <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}" 
                    class="btn btn-primary pull-right" 
                    title="Edit User"
                    role="button">Edit</a>
            </div>
        </div>
        <div class="row hidden-md hidden-lg hidden-xl">
            <div class="col-md-12">
                <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}" 
                    class="btn btn-primary btn-block" 
                    title="Cancel"
                    role="button">Edit</a>
                <a href="{{ route('admin.users.index') }}"
                    class="btn btn-default btn-block" 
                    title="Cancel changes"
                    role="button">Cancel</a>
            </div>
        </div>

    {!! Form::close() !!}
</div>
@endsection

@push('pre-styles')
@endpush

@push('post-scripts')
@endpush
