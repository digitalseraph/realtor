@extends('layouts.app-admin')

@section('page-header', 'Page Index')

@section('page-header-subtext', 'A list of all pages.')

@section('content')
<div class="container">
    <div class="row">
        {!! $dataTable->table(['class' => 'table table-striped table-bordered', 'id' => 'pages-table'], true) !!}
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
            $('#pages-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.pages.data') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'title', name: 'title' },
                    { data: 'sub_title', name: 'sub_title' },
                    { data: 'body', name: 'body' ,
                        render: function(val, _, obj) {
                            return "<small>" + obj.body + "</small>";
                        }},
                    { data: 'link_text', name: 'body', visible: false },
                    { data: 'link_description', name: 'body', visible: false },
                    { data: 'active', name: 'active' },
                    { data: 'priority', name: 'priority' },
                    { data: 'created_by', name: 'created_by', visible: false },
                    { data: 'modified_by', name: 'modified_by', visible: false },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },
                    { data: 'action', name: 'action', orderable: false, searchable: false } 
                ]
            });
        });
    </script>
@endpush
