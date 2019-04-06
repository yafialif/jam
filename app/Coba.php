<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class Coba extends Model {

    

    

    protected $table    = 'coba';
    
    protected $fillable = ['coba'];
    

    public static function boot()
    {
        parent::boot();

        Coba::observe(new UserActionsObserver);
    }
    
    
    
    
}