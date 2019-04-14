<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class Slider2 extends Model {

    

    

    protected $table    = 'slider2';
    
    protected $fillable = [
          'title',
          'category',
          'file',
          'arab',
          'terjemah',
          'riwayat'
    ];
    

    public static function boot()
    {
        parent::boot();

        Slider2::observe(new UserActionsObserver);
    }
    
    
    
    
}