<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class BgSlider extends Model {

    

    

    protected $table    = 'bgslider';
    
    protected $fillable = [
          'name',
          'image'
    ];
    

    public static function boot()
    {
        parent::boot();

        BgSlider::observe(new UserActionsObserver);
    }
    
    
    
    
}