@extends('layouts.app-admin')

@section('page-header', 'Admin Index')

@section('page-header-subtext', 'A list of administrators on this system.')

@section('content')
<div class="container">
    <div class="row">

        {!! $dataTable->table(['class' => 'table table-striped table-bordered', 'id' => 'admins-table'], true) !!}

    </div>
</div>
@endsection

@push('pre-styles')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
@endpush

@push('post-scripts')
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
{{-- {!! $dataTable->scripts() !!} --}}
<script>
$(function() {
    $('#admins-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('admin.admins.data') !!}',
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
