<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class Jamaah extends Model {

    

    

    protected $table    = 'jamaah';
    
    protected $fillable = [
          'name',
          'tlpn',
          'jenis_kelamin',
          'image'
    ];
    

    public static function boot()
    {
        parent::boot();

        Jamaah::observe(new UserActionsObserver);
    }
    
    
    
    
}
