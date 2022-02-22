@once
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.js"></script>
    @endpush
@endonce

@push('scripts')


@php $unid = uniqid(); @endphp

<script>
    
  var ctx{{ $unid }} = document.getElementById('chartJSContainer-{{ $unid }}').getContext('2d');
  var chart{{ $unid }} = new Chart(ctx{{ $unid }}, {
        type: '{{ $type }}',
        data: {!! json_encode($chartData) !!},
        options: {!! json_encode($options) !!}
      
  });
  
  </script>

@endpush

<canvas id="chartJSContainer-{{ $unid }}" 
    @if($width ?? false) width="{{ $width }}" @endif
    @if($height ?? false) width="{{ $height }}" @endif  
    ></canvas>

