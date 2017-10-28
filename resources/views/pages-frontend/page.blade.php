@extends('layouts.app')

@section('page-header', $page->title)

@section('page-header-subtext', $page->sub_title)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            {!! $page->body !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <hr>
            <h3>Info</h3>
            <strong>Active</strong>: {{ $page->isActive() }}<br />
            <strong>Priority</strong>: {{ $page->priority }}<br />
            <strong>Created By</strong>: {!! $page->createdBy->email !!}<br />
            <strong>Modified By</strong>: {!! $page->modifiedBy->email !!}<br />
            <strong>URL Link</strong>: <a href="{{ route('pages.show', ['page' => $page->id]) }}">{!! $page->link_text !!}</a><br />
        </div>
    </div>
</div>
@endsection

