@php
    $routeName = Route::currentRouteName();
    
    $showPasswordFields = false;
    
    if($routeName == 'admin.users.create') {
        $showPasswordFields = true;
    }
@endphp

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        @component('layouts.partials.form.error-form-all') @endcomponent
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="form-group">
            {!! Form::label('name', 'Name', ['class' => 'required']) !!}
            {!! Form::text('name', null, ['class' => 'form-control required', 'placeholder' => 'John Smith']) !!}

            @component('layouts.partials.form.error-field', ['field' => 'name']) @endcomponent
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="form-group">
            {!! Form::label('email', 'Email', ['class' => 'required']) !!}
            {!! Form::email('email', null, ['class' => 'form-control required', 'placeholder' => 'example@gmail.com']) !!}

            @component('layouts.partials.form.error-field', ['field' => 'email']) @endcomponent
        </div>
    </div>
</div>

@if($showPasswordFields)
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                {!! Form::label('password', 'Password', ['class' => 'required']) !!}
                {!! Form::password('password', ['class' => 'form-control required', 'placeholder' => '********']) !!}

                @component('layouts.partials.form.error-field', ['field' => 'password']) @endcomponent
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                {!! Form::label('password-confirm', 'Confirm Password', ['class' => 'required']) !!}
                {!! Form::password('password-confirm', ['class' => 'form-control required', 'placeholder' => '********', 'name' => 'password_confirmation']) !!}
            </div>
        </div>
    </div>
@endif
<div class="row">
    <div class="col-md-6 col-md-offset-3 text-center">
        <hr>
    </div>
</div>
