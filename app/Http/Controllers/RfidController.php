<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Jamaah;
use App\Rfid;
use App\Status;
use ReCaptcha\Response;

class RfidController extends Controller
{
    //
    public function index(Request $request){
        date_default_timezone_set("Asia/Jakarta");

        $get_uid = $request->UID;
        $sub_kalimat1 = hexdec($get_uid);
        $uid = dechex($sub_kalimat1);
        $rfid = Rfid::select('jamaah.name','jamaah.id AS id','rfid.id AS rfidid','rfid.uid','jamaah.jenis_kelamin')
            ->where('rfid.uid','=',$uid)
            ->join('jamaah','jamaah.id','=','rfid.jamaah_id')
            ->get();
        $time = date('Y-m-d');
        $time_now = strtotime('now');

        $awal_sahur = strtotime('18:00:00');
        $akhir_sahur = strtotime('24:00:00');
        $awal_buka = strtotime('05:00:00');
        $akhir_buka = strtotime('18:00:00');

        $status = Status::select('status.id','rfid.uid','saur','buka','saur_p','buka_p','status.created_at')
            ->where('rfid.uid','=',$uid)
            ->wheredate('status.created_at','=', Carbon::today())
            ->join('rfid','rfid.id','=','status.rfid_id')
            ->get();

//        return $status;
//         jika kartu ada
        if(!empty($rfid[0]->uid)){
            $nama = $rfid[0]->name;
            // jika di hari ini belum ada absen maka insert data absen hari ini
            if($rfid[0]->jenis_kelamin == 'Perempuan'){
                if(empty($status[0]->id)){
                    $uid = $rfid[0]->rfidid;
                    //jika absen masuk waktu sahur
                    if( $time_now >= $awal_sahur && $time_now <= $akhir_sahur){
                        $waktu = 'saur_p';
                        $insert = $this->insert_status($uid,$waktu);
                        $insert = ['pesan'=>'-Alhamdulillah- '.$nama,'LED_PIN'=>2];
                    }
                    // jika absen masuk waktu buka
                    else if( $time_now >= $awal_buka && $time_now <= $akhir_buka){
                        $waktu = 'buka_p';
                        $insert = $this->insert_status($uid,$waktu);

                        $insert = ['pesan'=>'-Alhamdulillah- '.$nama,'LED_PIN'=>2];
                    }
                    //jika belum masuk waktunya absen
                    else {
                        $insert = ['pesan'=>'Belum Waktunya Absen','LED_PIN'=>5];
                    }
                    return response()->json($insert,200);
                }
                //jika di hari ini sudah absen maka update data absen di hari ini
                else {

                    $id = $status[0]->id;
                    //update waktu absen saur
                    if( $time_now >= $awal_sahur && $time_now <= $akhir_sahur){
                        //jika data belum ada maka update ke database
                        if($status[0]->saur_p = 0){
                            $waktu = 'saur_p';
                            $update = $this->update_status($id,$waktu);
                            $update = ['pesan'=>'-Alhamdulillah- '.$nama,'LED_PIN'=>2];
                        }
                        //data sudah ada
                        else{
                            $update = ['pesan'=>'Sudah Absen','LED_PIN'=>5];
                        }
                    }
                    //update waktu absen buka
                    else if( $time_now >= $awal_buka && $time_now <= $akhir_buka){
                        //jika data belum ada maka update ke database
                        if($status[0]->buka_p = 0){
                            $waktu = 'buka_p';
                            $update = $this->update_status($id,$waktu);
                            $update = ['pesan'=>'-Alhamdulillah- '.$nama,'LED_PIN'=>2];
                        }
                        //data sudah ada
                        else{
                            $update = ['pesan'=>'Sudah Absen','LED_PIN'=>5];
                        }
                    }
                    // jika belum masuk waktunya absen
                    else {
                        $update = ['pesan'=>'Belum Waktunya Absen','LED_PIN'=>5];
                    }
                    return response()->json($update,200);
                }
            }
            else{
                if(empty($status[0]->id)){
                    $uid = $rfid[0]->rfidid;
                    //jika absen masuk waktu sahur
                    if( $time_now >= $awal_sahur && $time_now <= $akhir_sahur){
                        $waktu = 'saur';
                        $insert = $this->insert_status($uid,$waktu);
                        $insert = ['pesan'=>'-Alhamdulillah- '.$nama,'LED_PIN'=>2];
                    }
                    // jika absen masuk waktu buka
                    else if( $time_now >= $awal_buka && $time_now <= $akhir_buka){
                        $waktu = 'buka';
                        $insert = $this->insert_status($uid,$waktu);
                        $insert = ['pesan'=>'-Alhamdulillah- '.$nama,'LED_PIN'=>2];
                    }
                    //jika belum masuk waktunya absen
                    else {
                        $insert = ['pesan'=>'Belum Waktunya Absen','LED_PIN'=>5];
                    }
                    return response()->json($insert,200);
                }
                //jika di hari ini sudah absen maka update data absen di hari ini
                else {

                    $id = $status[0]->id;
                    //update waktu absen saur
                    if( $time_now >= $awal_sahur && $time_now <= $akhir_sahur){
                        //jika data belum ada maka update ke database
                        if($status[0]->saur = 0){
                            $waktu = 'saur';
                            $update = $this->update_status($id,$waktu);
                            $update = ['pesan'=>'-Alhamdulillah- '.$nama,'LED_PIN'=>2];
                        }
                        //data sudah ada
                        else{
                            $update = ['pesan'=>'Sudah Absen','LED_PIN'=>5];
                        }
                    }
                    //update waktu absen buka
                    else if( $time_now >= $awal_buka && $time_now <= $akhir_buka){
                        //jika data belum ada maka update ke database
                        if($status[0]->buka = 0){
                            $waktu = 'buka';
                            $update = $this->update_status($id,$waktu);
                            $update = ['pesan'=>'-Alhamdulillah- '.$nama,'LED_PIN'=>2];
                        }
                        //data sudah ada
                        else{
                            $update = ['pesan'=>'Sudah Absen','LED_PIN'=>5];
                        }
                    }
                    // jika belum masuk waktunya absen
                    else {
                        $update = ['pesan'=>'Belum Waktunya Absen','LED_PIN'=>5];
                    }
                    return response()->json($update,200);
                }
            }

        }
        //jika RFID belum terdaftar
        else{
            $data = ['pesan'=>'Kartu Belum     Terdaftar', 'LED_PIN'=>5];
            return response()->json($data,200);
        }
//
    }


    public function data(Request $request){
        $data = ['status'=>'200', 'pesan'=> $request->UID ];
        return response()->json($data,200);
    }
    //insert data absen baru
    function insert_status($uid,$status){
        $status = Status::insert(['rfid_id'=>$uid,$status=>1]);
        return $status;
    }
    // update data absen yang sudah ada
    function update_status($id, $waktu){
        $data = [$waktu => '1'];
        $status = Status::where('id','=',$id)->update($data);
        return $status;
    }
}
