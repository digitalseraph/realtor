{{-- 
    TODO:
    Finish welcome page.
--}}

@extends('layouts.app')

@section('page-header', 'Welcome')

@section('page-header-subtext', 'The landing page for ' . config('app.name', 'Laravel'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Pages</div>

                <div class="panel-body">
                    
                    @foreach (\App\Models\Page::where('active', '=', 1)->get() as $page)
                        <div style="margin-bottom: 4em;">
                            <h3 style="margin: 0;">
                                <a href="{{ route('pages.show', ['page' => $page->id]) }}">{{ $page->title }}</a>
                                <small>{{ $page->sub_title }}</small>
                            </h3>
                            <div style="color: #999; margin-bottom: 1em;">
                                <small>{!! Helper::humanDiffFromDatetime($page->created_at) !!}</small>
                            </div>
                            <div>
                                {!! str_limit($page->body, 300) !!} [<a href="{{ route('pages.show', ['page' => $page->id]) }}">view page</a>]
                            </div>
                        </div>
                    @endforeach

                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

@push('pre-styles')
@endpush

@push('post-styles')
@endpush

@push('pre-scripts')
@endpush

@push('post-scripts')
@endpush
