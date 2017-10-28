@extends('layouts.app-admin')

@section('page-header', 'View Page')

@section('page-header-subtext', 'View an existing page.')

@section('content')
<div class="container">
    {!! Form::model($page, ['route' => ['admin.pages.update', $page->id], 'method' => 'put', 'class' => '']) !!}
        {!! Form::hidden('id', $page->id) !!}

        <fieldset disabled>
            @include('pages.pages._form')
        </fieldset>

        <div class="row hidden-xs hidden-sm">
            <div class="col-md-6 col-md-offset-3">
                <a href="{{ route('admin.pages.index') }}" 
                    class="btn btn-default pull-left" 
                    title="Cancel changes"
                    role="button">Cancel</a>
                <a href="{{ route('admin.pages.edit', ['id' => $page->id]) }}" 
                    class="btn btn-primary pull-right" 
                    title="Edit Page"
                    role="button">Edit</a>
            </div>
        </div>
        <div class="row hidden-md hidden-lg hidden-xl">
            <div class="col-md-12">
                <a href="{{ route('admin.pages.edit', ['id' => $page->id]) }}" 
                    class="btn btn-primary btn-block" 
                    title="Edit Page"
                    role="button">Edit</a>
                <a href="{{ route('admin.pages.index') }}"
                    class="btn btn-default btn-block" 
                    title="Cancel changes"
                    role="button">Cancel</a>
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
