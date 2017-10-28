@extends('layouts.app')

@section('page-header', 'Page Index')

@section('page-header-subtext', 'A list of all pages.')

@section('content')
<div class="container">
    <div class="row">
        {!! $dataTable->table(['class' => 'table table-striped', 'id' => 'pages-table'], true) !!}
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
                ajax: '{!! route('pages.data') !!}',
                columns: [
                    { data: 'id', name: 'id', title: '#', visible: false },
                    { data: 'title', name: 'title', width: '400px',
                        render: function(val, _, obj) {
                            return "<strong><a href=\"/page/" + obj.id + "\">" + obj.title + "</a></strong>" +
                                "<br/><small>" + obj.sub_title + "</small>";
                        }
                    },
                    { data: 'sub_title', name: 'sub_title', visible: false  },
                    { data: 'body', name: 'body', title: 'Preview',
                        render: function(val, _, obj) {
                            return "<small>" + obj.body + "</small>";
                        }
                    },
                    { data: 'link_text', name: 'link_text', visible: false  },
                    { data: 'link_description', name: 'link_description', visible: false },
                    { data: 'active', name: 'active', visible: false },
                    { data: 'priority', name: 'priority', visible: false },
                    { data: 'created_by', name: 'created_by', visible: false },
                    { data: 'modified_by', name: 'modified_by', visible: false },
                    { data: 'created_at', name: 'created_at', title: 'Created' },
                    { data: 'updated_at', name: 'updated_at', visible: false },
                    { data: 'action', name: 'action', title: '', orderable: false, searchable: false } 
                ]
            });
        });
    </script>
@endpush
