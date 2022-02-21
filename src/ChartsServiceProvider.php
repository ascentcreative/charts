<?php

namespace AscentCreative\Charts;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Routing\Router;


class ChartsServiceProvider extends ServiceProvider
{
  public function register()
  {
    //
   
    $this->mergeConfigFrom(
        __DIR__.'/../config/charts.php', 'charts'
    );

  }

  public function boot()
  {
      $this->bootComponents();

    $this->loadViewsFrom(__DIR__.'/../resources/views', 'charts');

    $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

    $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

  }

  

  // register the components
  public function bootComponents() {
  
        Blade::component('chart', 'AscentCreative\Charts\Components\Chart');
        
  }




  

    public function bootPublishes() {

      $this->publishes([
        __DIR__.'/Assets' => public_path('vendor/ascentcreative/charts'),
    
      ], 'public');

      $this->publishes([
        __DIR__.'/config/charts.php' => config_path('charts.php'),
      ]);

    }



}