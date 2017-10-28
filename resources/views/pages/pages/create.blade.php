@extends('layouts.app-admin')

@section('page-header', 'Create Page')

@section('page-header-subtext', 'Create a new page.')

@section('content')
<div class="container">
    {!! Form::open(['route' => 'admin.pages.store', 'class' => '']) !!}
        @include('pages.pages._form')

        <div class="row hidden-xs hidden-sm">
            <div class="col-md-6 col-md-offset-3">
                <a href="{{ URL::previous() }}" role="button" class="btn btn-default pull-left" >Cancel</a>
                {!! Form::submit('Create Page', ['class' => 'btn btn-primary pull-right']) !!}
            </div>
        </div>
        <div class="row hidden-md hidden-lg hidden-xl">
            <div class="col-md-12">
                {!! Form::submit('Create Page', ['class' => 'btn btn-primary btn-block']) !!}
                <a class="btn btn-default btn-block" href="{{ URL::previous() }}" role="button">Cancel</a>
            </div>
        </div>
    {!! Form::close() !!}
</div>
@endsection

@push('post-scripts')
<script src="/assets/vendor/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    (function() {
        CKEDITOR.replace('ckeditor1');
    })();
</script>
@endpush
