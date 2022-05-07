@if($renderer=='node')

    {{-- Divert rendering to Node endpoint --}}
    {{-- Use for PDF embedding etc --}}

    @php

        $c = [
            "width" => $width,
            "height" => $height,
            "type" => $type,
            "data" => $chartData,
            "options" => $options
        ];


    @endphp

    <img src="{{ env('NODE_CHART_ENDPOINT') }}?c={{ encrypt(json_encode($c)) }}" width="{{ $width }}" height="{{ $height }}">


@else

    {{-- Rendering via chart.js in the browser --}}

    @once
        
        {{-- @include('charts::chart-setup') --}}

    @endonce
    
    <div style="width: {{ $width }}px; height: {{ $height }}px;" class="m-2"> 
    <canvas class="chart-js"
        {{-- @if($width ?? false) width="{{ $width }}" @endif
        @if($height ?? false) width="{{ $height }}" @endif   --}}

        {{-- data-chart-id="{{ $unid }}" --}}
        data-chart-type="{{ $type }}"
        data-chart-data="{{ json_encode($chartData) }}"
        data-chart-options="{{ json_encode($options) }}"
        ></canvas>
    </div>

@endif
