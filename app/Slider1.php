<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class Slider1 extends Model {

    

    

    protected $table    = 'slider1';
    
    protected $fillable = [
          'title',
          'image'
    ];
    

    public static function boot()
    {
        parent::boot();

        Slider1::observe(new UserActionsObserver);
    }
    
    
    
    
}