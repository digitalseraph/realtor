@extends('layouts.app-admin')

@section('page-header', 'User Index')

@section('page-header-subtext', 'A list of users on this system.')

@section('content')
<div class="container">
    <div class="row">
        {!! $dataTable->table(['class' => 'table table-striped table-bordered', 'id' => 'users-table'], true) !!}
    </div>
</div>
@endsection

@push('post-styles')
    <link href="{{ mix('/assets/css/datatables.css') }}" rel="stylesheet">
@endpush

@push('post-scripts')
    <!-- DataTables -->
    <script src="{{ mix('/assets/js/datatables.js') }}"></script>
    {{-- {!! $dataTable->scripts() !!} --}}
    
    <script>
        $(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.users.data') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'first_name', name: 'first_name' },
                    { data: 'last_name', name: 'last_name' },
                    { data: 'username', name: 'username' },
                    { data: 'email', name: 'email' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },
                    { data: 'action', name: 'action', orderable: false, searchable: false } 
                ]
            });
        });
    </script>
@endpush
