@extends('layouts.admin-lte.lockscreen')

@section('content')

    <!-- User name -->
    <div class="lockscreen-name">{{ \App\Admin::find($id)->fullName() }}</div>

    <!-- START LOCK SCREEN ITEM -->
    <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
            <img src="{{ asset('assets/vendor/admin-lte/img/user1-128x128.jpg') }}" alt="User Image">
        </div>
        <!-- /.lockscreen-image -->

        <!-- lockscreen credentials (contains the form) -->
        <form role="form" method="POST" action="{{ route('admin.unlockscreen') }}" class="lockscreen-credentials">
            <div class="input-group">
                <input type="password" name="password" class="form-control" placeholder="password" required>
                @component('layouts.partials.form.error-field', ['field' => 'password']) @endcomponent

                <input type="hidden" name="id" value="{{ $id }}">
                <input type="hidden" name="savedUrl" value="{{ $savedUrl }}">

                <div class="input-group-btn">
                    <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
                </div>
            </div>
        </form>
        <!-- /.lockscreen credentials -->
    </div>
    <!-- /.lockscreen-item -->

@endsection


@push('post-scripts')
@endpush
