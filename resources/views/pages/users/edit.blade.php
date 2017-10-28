@extends('layouts.app-admin')

@section('page-header', 'Edit User')

@section('page-header-subtext', 'Edit an existing user.')

@section('content')
<div class="container">
    {!! Form::model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'put', 'class' => '']) !!}
        {!! Form::hidden('id', $user->id) !!}

        @include('pages.users._form')

        <div class="row hidden-xs hidden-sm">
            <div class="col-md-6 col-md-offset-3 text-center">
                <a href="{{ route('admin.users.index') }}" 
                    class="btn btn-default pull-left" 
                    title="Cancel changes"
                    role="button">Cancel</a>

                {!! Form::submit('Save', [
                    'class' => 'btn btn-primary pull-right',
                    'title' => 'Save Changes'
                ]) !!}

                <a href="{{ route('admin.users.destroy', $user->id) }}" 
                    data-method="delete" 
                    data-token="{{csrf_token()}}" 
                    data-confirm="Are you sure?" 
                    class="btn btn-danger" 
                    title="Delete User"
                    role="button">Delete</a>
            </div>
        </div>
        <div class="row hidden-md hidden-lg hidden-xl">
            <div class="col-md-12">
                <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}" 
                    class="btn btn-primary btn-block" 
                    title="Cancel"
                    role="button">Edit</a>
                <a href="{{ route('admin.users.destroy', $user->id) }}" 
                    data-method="delete" 
                    data-token="{{csrf_token()}}" 
                    data-confirm="Are you sure?" 
                    class="btn btn-danger btn-block" 
                    title="Delete User"
                    role="button">Delete</a>
                <a href="{{ route('admin.users.index') }}"
                    class="btn btn-default btn-block" 
                    title="Cancel changes"
                    role="button">Cancel</a>
            </div>
        </div>

    {!! Form::close() !!}
</div>
@endsection

@push('post-scripts')
<script type="text/javascript">
    (function() {
        //
        // Remove Button Form
        // see: https://gist.github.com/soufianeEL/3f8483f0f3dc9e3ec5d9
        //

        var laravel = {
            initialize: function() {
                this.methodLinks = $('a[data-method]');
                this.token = $('a[data-token]');
                this.registerEvents();
            },
         
            registerEvents: function() {
                this.methodLinks.on('click', this.handleMethod);
            },
         
            handleMethod: function(e) {
                var link = $(this);
                var httpMethod = link.data('method').toUpperCase();
                var form;

                // If the data-method attribute is not PUT or DELETE,
                // then we don't know what to do. Just ignore.
                if ( $.inArray(httpMethod, ['PUT', 'DELETE']) === - 1 ) {
                    return;
                }

                // Allow user to optionally provide data-confirm="Are you sure?"
                if ( link.data('confirm') ) {
                    if ( ! laravel.verifyConfirm(link) ) {
                        return false;
                    }
                }

                form = laravel.createForm(link);
                form.submit();

                e.preventDefault();
            },
         
            verifyConfirm: function(link) {
                return confirm(link.data('confirm'));
            },
         
            createForm: function(link) {
                var form = 
                $('<form>', {
                    'method': 'POST',
                    'action': link.attr('href')
                });

                var token = 
                $('<input>', {
                    'type': 'hidden',
                    'name': '_token',
                    'value': link.data('token')
                });

                var hiddenInput =
                    $('<input>', {
                    'name': '_method',
                    'type': 'hidden',
                    'value': link.data('method')
                });

                return form.append(token, hiddenInput)
                            .appendTo('body');
            }
          };
         
          laravel.initialize();
    })();
</script>
@endpush
