<?php

namespace AscentCreative\Charts\Components;

use Illuminate\View\Component;

use AscentCreative\Charts\ChartBuilder;

class Chart extends Component
{

    public $type;
    public $chartData;
    public $options;

    public $width;
    public $height;

    public $renderer;
    public $autosetup;


    public $encode;
    public $encodePrefix;

    public $lazy = false;



    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ChartBuilder $builder, $width=false, $height=false, 
                        $renderer="javascript", $lazy=false, $autosetup=true, $encode=false, $encodePrefix="data:image/png;base64,")
    {

        // dd($builder->getData());
        if($renderer != 'javascript' || !$lazy) {
            // grab the data in the initial request
            $this->chartData = $builder->getChartData();
            $this->options = $builder->getOptions();
            $this->type = $builder->getType();
        } else {
            // defer the data load for the chart for Javascript / Ajax
            $this->chartDataUrl = ''; // need to somehow build a route to request the data
        }

       $this->width = $width;
       $this->height = $height;

       $this->renderer = $renderer;
       $this->autosetup = $autosetup;

       $this->encode = $encode;
       $this->encodePrefix = $encodePrefix;

       $this->lazy = $lazy;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('charts::components.chart');
    }
}
