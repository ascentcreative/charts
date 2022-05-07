@push('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.js"></script>

    <script defer async>
    
    function buildCharts() {
        //  alert('ready');

         $('.chart-js').not('.rendered').each(function(i) {
            
            var ctxtmp = $(this)[0].getContext('2d');
            
            chart = Chart.getChart($(this)[0]);

            if(!chart) {
                // chart.destroy();
            // } 

                chart = new Chart(ctxtmp, {
                    type: $(this).attr('data-chart-type'),
                    data: $.parseJSON($(this).attr('data-chart-data')),
                    options: $.parseJSON($(this).attr('data-chart-options'))
                
                }); 

                $(this).addClass("rendered");

            }
        
                
        });
    }

    $(document).ready(function() {

        buildCharts();

    });
    </script>

@endpush