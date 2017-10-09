<ol class="breadcrumb">
    @php $currentSegments = []; @endphp
    @foreach ($globalComposer['routeSegments'] as $segment)
        @php
            array_push($currentSegments, $segment);
            $routeNameLink = implode($currentSegments, '.');
        @endphp
        @if ($loop->first)
            <li><i class="fa fa-dashboard"></i> {{ title_case($segment) }}</li>
        @elseif ($loop->last)
            <li class="active"><i class="fa fa-dashboard"></i> {{ title_case($segment) }}</li>
        @else
            <li><a href="#"><i class="fa fa-dashboard"></i> {{ title_case($segment) }}</a></li>
        @endif
    @endforeach
</ol>
