<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class Category extends Model {

    

    

    protected $table    = 'category';
    
    protected $fillable = [
          'nama_category',
          'deskripsi'
    ];
    

    public static function boot()
    {
        parent::boot();

        Category::observe(new UserActionsObserver);
    }
    
    
    
    
}