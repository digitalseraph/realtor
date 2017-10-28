@extends('layouts.app-admin')

@section('page-header', 'Laravel Log Viewer')

@section('page-header-subtext', 'by Rap2h')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-4 col-md-2 log-viewer-sidebar">
                <div class="list-group">
                    @foreach($files as $file)
                        <a href="?l={{ base64_encode($file) }}" 
                            class="list-group-item  @if ($current_file == $file) active @endif">
                            {{$file}}
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="col-sm-8 col-md-10 table-container">
                @if ($logs === null)
                    <div>Log file &gt;50M, please download it.</div>
                @else
                    <table id="table-log" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Level</th>
                                <th>Context</th>
                                <th>Date</th>
                                <th>Content</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($logs as $key => $log)
                                <tr data-display="stack{{{$key}}}">
                                    <td class="text-{{{$log['level_class']}}}">
                                        <span class="glyphicon glyphicon-{{{$log['level_img']}}}-sign" aria-hidden="true"></span> 
                                            &nbsp;{{$log['level']}}
                                    </td>
                                    <td class="text" style="word-break: break-all;">{{$log['context']}}</td>
                                    <td class="date" style="min-width: 75px;">{{ \Carbon\Carbon::parse($log['date'])->format('Y-m-d H:i:s') }}</td>
                                    <td class="text" style="word-break: break-all;">
                                        @if ($log['stack']) 
                                            <a class="pull-right expand btn btn-default btn-xs" data-display="stack{{{$key}}}">
                                                <span class="glyphicon glyphicon-search"></span>
                                            </a>
                                        @endif
                                        {{{$log['text']}}}
                                        @if (isset($log['in_file'])) 
                                            <br/>{{{$log['in_file']}}}
                                        @endif
                                        @if ($log['stack'])
                                            <div class="stack" id="stack{{{$key}}}" style="display: none; white-space: pre-wrap; font-size: 0.85em;">
                                                {{{ trim($log['stack']) }}}
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
                <div>
                    @if($current_file)
                        <a href="?dl={{ base64_encode($current_file) }}">
                            <span class="glyphicon glyphicon-download-alt"></span> Download file
                        </a>
                        -
                        <a id="delete-log" href="?del={{ base64_encode($current_file) }}">
                            <span class="glyphicon glyphicon-trash"></span> Delete file
                        </a>
                        @if(count($files) > 1)
                            -
                            <a id="delete-all-log" href="?delall=true">
                                <span class="glyphicon glyphicon-trash"></span> Delete all files
                            </a>
                        @endif
                    @endif
                </div>
            </div>
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
        $(document).ready(function () {

            $('.table-container tr').on('click', function () {
                $('#' + $(this).data('display')).toggle();
            });

            $('#table-log').DataTable({
                "order": [3, 'desc'],
                "stateSave": true,
                "stateSaveCallback": function (settings, data) {
                    window.localStorage.setItem("datatable", JSON.stringify(data));
                },
                "stateLoadCallback": function (settings) {
                    var data = JSON.parse(window.localStorage.getItem("datatable"));
                    if (data) data.start = 0;
                    return data;
                }
            });

            $('#delete-log, #delete-all-log').click(function () {
                return confirm('Are you sure?');
            });
        });
    </script>
@endpush
