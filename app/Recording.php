<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class Recording extends Model {

    

    

    protected $table    = 'recording';
    
    protected $fillable = [
          'ustad_id',
          'id_recording',
          'record',
          'note',
          'status'
    ];
    

    public static function boot()
    {
        parent::boot();

        Recording::observe(new UserActionsObserver);
    }
    
    public function ustad()
    {
        return $this->hasOne('App\UserApp', 'id', 'ustad_id');
    }


    
    
    
}