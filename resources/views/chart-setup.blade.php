@push('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.js"></script>

    <script defer async>
    
    function buildCharts() {
        //  alert('ready');

        // TODO add a lazy load option where we actually request the data, 
        // not just render what's been put in the page.

         $('.chart-js').not('.rendered').each(function(i) {
            
            var ctxtmp = $(this)[0].getContext('2d');
            
            chart = Chart.getChart($(this)[0]);

            if(!chart) {
                // chart.destroy();
            // } 
                let url = $(this).attr('data-chart-dataurl');
                if(url) {

                    $.ajax({
                        url: url
                    }).done(function(data) {

                    }).fail(function(data) {
                        console.log('err');
                    });

                } else {

                    let data = $.parseJSON($(this).attr('data-chart-data'));

                    for(i in data.datasets) {

                        let set = data.datasets[i];
                        let functions = data.datasets[i]['segmentFunctions'];
                        let segment = set.segment ?? {};

                        for(prop in functions) {
                            let fn = functions[prop];
                            if(fn) {
                                segment[prop] = ctx => eval(fn + "(ctx)");
                            }
                        }

                        set.segment = segment;

                    }

                    chart = new Chart(ctxtmp, {
                    type: $(this).attr('data-chart-type'),
                    data: data,
                    options: $.parseJSON($(this).attr('data-chart-options'))
                
                }); 

                $(this).addClass("rendered");

                }

               

               

            }
        
                
        });
    }

    $(document).ready(function() {

        buildCharts();

    });
    </script>

@endpush