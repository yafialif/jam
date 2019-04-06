<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class Jamsetting extends Model {

    

    

    protected $table    = 'jamsetting';
    
    protected $fillable = [
          'namemosque',
          'alamat',
          'logitude',
          'latitude',
          'waktuadzan',
          'countdown',
          'dzikir_time',
          'slider1',
          'slider2',
          'slider3'
    ];
    

    public static function boot()
    {
        parent::boot();

        Jamsetting::observe(new UserActionsObserver);
    }
    
    
    
    
}