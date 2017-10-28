@php
    $page = (isset($page)) ? $page : null;
@endphp

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        @component('layouts.partials.form.error-form-all') @endcomponent
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('title', 'Title', ['class' => 'required']) !!}
            {!! Form::text('title', null, ['class' => 'form-control required', 'placeholder' => 'Title']) !!}

            @component('layouts.partials.form.error-field', ['field' => 'title']) @endcomponent
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('sub_title', 'Sub-title', ['class' => 'required']) !!}
            {!! Form::text('sub_title', null, ['class' => 'form-control required', 'placeholder' => 'Sub-title']) !!}

            @component('layouts.partials.form.error-field', ['field' => 'sub_title']) @endcomponent
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('body', 'Body', ['class' => 'required']) !!}
            {!! Form::textarea('body', null, ['id' => 'ckeditor1', 'class' => 'form-control required', 'placeholder' => '']) !!}

            @component('layouts.partials.form.error-field', ['field' => 'body']) @endcomponent
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('link_text', 'Link Text', ['class' => 'required']) !!}
            {!! Form::text('link_text', null, ['class' => 'form-control required', 'placeholder' => 'link-text']) !!}

            @component('layouts.partials.form.error-field', ['field' => 'link_text']) @endcomponent
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('link_description', 'Link Description', ['class' => 'required']) !!}
            {!! Form::textarea('link_description', null, ['id' => 'ckeditor1', 'class' => 'form-control required', 'placeholder' => '', 'rows' => 3]) !!}

            @component('layouts.partials.form.error-field', ['field' => 'link_description']) @endcomponent
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            {!! Form::label('active', 'Active?', ['class' => 'required']) !!}
            <br />
            {!! Form::radio('active', true, true) !!} Yes 
            {!! Form::radio('active', false) !!} No

            @component('layouts.partials.form.error-field', ['field' => 'active']) @endcomponent
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {!! Form::label('priority', 'Priority', ['class' => 'required']) !!}
            {!! Form::number('priority', null, ['class' => 'form-control required', 'placeholder' => '0']) !!}

            @component('layouts.partials.form.error-field', ['field' => 'priority']) @endcomponent
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <hr>
    </div>
</div>
