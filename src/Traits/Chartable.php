<?php

namespace AscentCreative\Charts\Traits;

use AscentCreative\CMS\Traits\Extender;
use AscentCreative\Charts\Models\Chartable as Model;

use Illuminate\Http\Request;


/**
 * Allows a Model to be extended with a set of chartable options. 
 *  - Primarily used for setting a colour for the model when plotted as a series
 */
trait Chartable {

    use Extender;

    public static function bootChartable() {

        static::saving(function($model) { 
            if(request()->has('_chartable')) {
                $model->captureChartable();
            }
        });

        static::saved(function($model) { 
          
            // only action the save if the request had the field in it.
            if(request()->has('_chartable')) {
                $model->saveChartable();
            }

        });

        static::deleted(function ($model) {
            $model->deleteChartable();
        });

    }

    public function initializeChartable() {
        $this->fillable[] = '_chartable';
    }


    public function captureChartable() {

        session(['extenders._chartable' => $this->_chartable]);
        unset($this->attributes['_chartable']);  

    }

    public function saveChartable() {

        $data = session()->pull('extenders._chartable');

        // $ctbl = $this->chartable ?? new Model();

        // dd($data);

        $this->chartable()->save(Model::updateOrCreate(
            ['chartable_type' => get_class($this), 'chartable_id' => $this->id],
            $data
        ));

        // do stuff here...
      
    }

    public function chartable() {

        return $this->morphOne(Model::class, 'chartable');
        
    }

    public function deleteChartable() {
        $this->chartable()->delete();
    }

}