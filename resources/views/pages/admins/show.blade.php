@extends('layouts.app-admin')

@section('page-header', 'View Admin')

@section('page-header-subtext', 'View an existing administrator.')

@section('content')
<div class="container">
    {!! Form::model($admin, ['route' => ['admin.admins.update', $admin->id], 'method' => 'put', 'class' => '']) !!}
        {!! Form::hidden('id', $admin->id) !!}

        <fieldset disabled>
            @include('pages.admins._form')
        </fieldset>

        <div class="row hidden-xs hidden-sm">
            <div class="col-md-6 col-md-offset-3">
                <a href="{{ route('admin.admins.index') }}" 
                    class="btn btn-default pull-left" 
                    title="Cancel changes"
                    role="button">Cancel</a>
                <a href="{{ route('admin.admins.edit', ['id' => $admin->id]) }}" 
                    class="btn btn-primary pull-right" 
                    title="Edit Admin"
                    role="button">Edit</a>
            </div>
        </div>
        <div class="row hidden-md hidden-lg hidden-xl">
            <div class="col-md-12">
                <a href="{{ route('admin.admins.edit', ['id' => $admin->id]) }}" 
                    class="btn btn-primary btn-block" 
                    title="Edit Admin"
                    role="button">Edit</a>
                <a href="{{ route('admin.admins.index') }}"
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
