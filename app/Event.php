<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class Event extends Model {

    

    

    protected $table    = 'event';
    
    protected $fillable = [
          'category_id',
          'nama',
          'image',
          'deskripsi'
    ];
    

    public static function boot()
    {
        parent::boot();

        Event::observe(new UserActionsObserver);
    }
    
    public function category()
    {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }


    
    
    
}