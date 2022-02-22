<?php

namespace AscentCreative\Charts\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chartable extends Model {

    use HasFactory;

    public $fillable = ['series_color'];


}
