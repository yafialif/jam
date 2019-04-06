<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class Usermanual extends Model {

    

    

    protected $table    = 'usermanual';
    
    protected $fillable = [
          'judul',
          'isi_panduan'
    ];
    

    public static function boot()
    {
        parent::boot();

        Usermanual::observe(new UserActionsObserver);
    }
    
    
    
    
}