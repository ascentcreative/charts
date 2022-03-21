@push('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.js"></script>

    <script defer async>
    
    function buildCharts() {
         // alert('ready');

         $('.chart-js').each(function(i) {
            
            var ctxtmp = $(this)[0].getContext('2d');
            
            chart = Chart.getChart($(this)[0]);

            // console.log(chart);

            if(chart) {
                chart.destroy();
            }

            chart = new Chart(ctxtmp, {
                    type: $(this).data('chart-type'),
                    data: $(this).data('chart-data'),
                    options: $(this).data('chart-options')
                
                }); 
                
            // console.log($(this).data('chart-data'));
        });
    }

    $(document).ready(function() {

        buildCharts();

    });
    </script>

@endpush