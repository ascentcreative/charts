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



    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ChartBuilder $builder, $width=false, $height=false, $renderer="javsacript", $autosetup=true)
    {

        // dd($builder->getData());
       $this->chartData = $builder->getChartData();
       $this->options = $builder->getOptions();
       $this->type = $builder->getType();

       $this->width = $width;
       $this->height = $height;

       $this->renderer = $renderer;
       $this->autosetup = $autosetup;

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
