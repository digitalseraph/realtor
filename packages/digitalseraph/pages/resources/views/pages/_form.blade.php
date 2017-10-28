@php
    $admin = (isset($admin)) ? $admin : null;

    $routeName = Route::currentRouteName();
    
    $showPasswordFields = false;
    
    if($routeName == 'admin.admins.create') {
        $showPasswordFields = true;
    }
@endphp

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        @component('layouts.partials.form.error-form-all') @endcomponent
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-md-offset-3">
        <div class="form-group">
            {!! Form::label('first_name', 'First Name', ['class' => 'required']) !!}
            {!! Form::text('first_name', null, ['class' => 'form-control required', 'placeholder' => 'John']) !!}

            @component('layouts.partials.form.error-field', ['field' => 'first_name']) @endcomponent
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('last_name', 'Last Name', ['class' => 'required']) !!}
            {!! Form::text('last_name', null, ['class' => 'form-control required', 'placeholder' => 'Smith']) !!}

            @component('layouts.partials.form.error-field', ['field' => 'last_name']) @endcomponent
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="form-group">
            {!! Form::label('username', 'Username', ['class' => 'required']) !!}
            {!! Form::text('username', null, ['class' => 'form-control required', 'placeholder' => 'johnsmith01']) !!}

            @component('layouts.partials.form.error-field', ['field' => 'username']) @endcomponent
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

@if($admin)
    <div class="row">
        <div class="col-md-3 col-md-offset-3">
            <div class="form-group">
                {!! Form::label('roles', 'Roles') !!}
                <ul>
                    @foreach ($admin->getRoleNames() as $role)
                        <li>{{ $role }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('permissions', 'Permissions') !!}
                <ul>
                    @foreach ($admin->getAllPermissions() as $perm)
                        <li>{{ $perm->guard_name . " | " . $perm->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif

<div class="row">
    <div class="col-md-6 col-md-offset-3 text-center">
        <hr>
    </div>
</div>
