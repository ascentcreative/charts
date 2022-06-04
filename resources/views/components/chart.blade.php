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

        // $img1 = 'data:image/png;base64,' . base64_encode(file_get_contents(env('NODE_CHART_ENDPOINT') . '?c=' . encrypt(json_encode($c))));

       

    @endphp

    {{-- <img src="{{ env('NODE_CHART_ENDPOINT') }}?c={{ encrypt(json_encode($c)) }}" width="{{ $width }}" height="{{ $height }}"> --}}
    @if($encode) 
        @php 
             $img1 = $encodePrefix . base64_encode(file_get_contents(env('NODE_CHART_ENDPOINT') . '?c=' . encrypt(json_encode($c))));
        @endphp
        <img src="{{ $img1 }}" width="{{ $width }}" height="{{ $height }}">
    @else
        <img src="{{ env('NODE_CHART_ENDPOINT') . '?c=' . encrypt(json_encode($c)) }}" width="{{ $width }}" height="{{ $height }}">
    @endif



@else

    {{-- Rendering via chart.js in the browser --}}

    @once
        @if($autosetup)
            @include('charts::chart-setup')
        @endif
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
