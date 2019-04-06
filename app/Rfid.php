<?php

namespace App;
use App\Http\Requests;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class Rfid extends Model {





    protected $table    = 'rfid';

    protected $fillable = [
          'jamaah_id',
          'uid'
    ];

    public function InsertData($id, $uid){
        $post = New Rfid();
            $post->jamaah_id= $id;
            $post->uid=$uid;
            $post->save();
        return $post;
//        return $uid;
    }


    public static function boot()
    {
        parent::boot();

        Rfid::observe(new UserActionsObserver);
    }

    public function jamaah()
    {
        return $this->hasOne('App\Jamaah', 'id', 'jamaah_id');
    }





}
