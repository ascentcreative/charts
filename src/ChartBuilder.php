<?php

namespace AscentCreative\Charts;

class ChartBuilder {

    private $type = 'line';

    private $data = [];

    private $options = [];


    public function getType():string  {
        return $this->type;
    }

    public function setType($type):ChartBuilder {
        $this->type = $type;
        return $this;
    }


    public function getChartData() {

    }

   public function getOptions() {

   }

}