@php

    $ctbl = $model->chartable;
    if(!$ctbl) {
        $ctbl = new AscentCreative\Charts\Models\Chartable();
    }
  
@endphp

<H4>Charting Options</H4>
<x-cms-form-colour type="text" label="Series Colour" name="_chartable[series_color]" value="{!! old('_chartable.series_color', $ctbl->series_color ?? '') !!}"/>