<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class Status extends Model {

    

    

    protected $table    = 'status';
    
    protected $fillable = [
          'rfid_id',
          'saur',
          'buka',
          'itikaf'
    ];
    
    public static $saur = ["" => ""];
    public static $buka = ["" => ""];
    public static $itikaf = ["" => ""];


    public static function boot()
    {
        parent::boot();

        Status::observe(new UserActionsObserver);
    }
    
    public function rfid()
    {
        return $this->hasOne('App\Rfid', 'id', 'rfid_id');
    }


    
    
    
}