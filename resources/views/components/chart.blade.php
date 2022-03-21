@once

    @include('charts::chart-setup')

@endonce


<canvas class="chart-js"
    @if($width ?? false) width="{{ $width }}" @endif
    @if($height ?? false) width="{{ $height }}" @endif  

    {{-- data-chart-id="{{ $unid }}" --}}
    data-chart-type="{{ $type }}"
    data-chart-data="{{ json_encode($chartData) }}"
    data-chart-options="{{ json_encode($options) }}"
    ></canvas>


