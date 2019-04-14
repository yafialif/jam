<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jamaah;
use App\Rfid;
use App\Status;
class RfidController extends Controller
{
    //
    public function index(Request $request){
        $uid = $request->UID;
        $rfid = Rfid::select('id','uid')->where('uid','=',$uid)->get();
        $time = date('Y-m-d');
        $time_now = date('H:m');
//        $time_now = '16:00';
        $status = Rfid::select('status.id', 'rfid.uid', 'saur', 'buka','itikaf')
            ->where('rfid.uid','=',$uid)
            ->whereDate('status.created_at','=',$time)
            ->join('status','rfid.id','=','status.rfid_id')->get();

        if(!empty($rfid[0]->uid)){
            if(empty($status[0]->uid)){
                $uid = $rfid[0]->id;
                if( $time_now <= '05:00' && $time_now >= '01:00'){
                        $waktu = 'saur';
                        $insert = $this->insert_status($uid,$waktu);
                        $insert = ['pesan'=>'Alhamdulillah','LED_PIN'=>2];
                }
                else if( $time_now <= '19:00' && $time_now >= '15:00'){
                        $waktu = 'buka';
                        $insert = $this->insert_status($uid,$waktu);
                        $insert = ['pesan'=>'Alhamdulillah','LED_PIN'=>2];
                }
                else if( $time_now >= '19:00' && $time_now >= '05:01'){
                        $waktu = 'itikaf';
                        $insert = $this->insert_status($uid,$waktu);
                        $insert = ['pesan'=>'Alhamdulillah','LED_PIN'=>2];
                }
                else {
                    $insert = ['pesan'=>'Belum Waktunya Absen','LED_PIN'=>5];
                }
                return response()->json($insert,200);
            }
            else {
                $id = $status[0]->id;
                if( $time_now <= '05:00' && $time_now >= '01:00'){
                    if($status[0]->saur = 0){
                        $waktu = 'saur';
                        $update = $this->update_status($id,$waktu);
                        $update = ['pesan'=>'Alhamdulillah','LED_PIN'=>2];
                    }
                    else{
                        $update = ['pesan'=>'Sudah Absen Sahur','LED_PIN'=>5];
                    }
                }
                else if( $time_now <= '19:00' && $time_now >= '15:00'){

                    if($status[0]->saur = 0){
                        $waktu = 'buka';
                        $update = $this->update_status($id,$waktu);
                        $update = ['pesan'=>'Alhamdulillah','LED_PIN'=>2];
                    }
                    else{
                        $update = ['pesan'=>'Sudah Absen Buka','LED_PIN'=>5];
                    }
                }
                else if( $time_now >= '19:00' && $time_now >= '00:01'){

                    if($status[0]->saur = 0){
                        $waktu = 'itikaf';
                        $update = $this->update_status($id,$waktu);
                        $update = ['pesan'=>'Alhamdulillah','LED_PIN'=>2];
                    }
                    else{
                        $update = ['pesan'=>'Sudah Absen Itikaf','LED_PIN'=>5];
                    }
                }
                else {
                    $update = ['pesan'=>'Belum Waktunya Absen','LED_PIN'=>5];
                }
                return response()->json($update,200);
            }

        }
        else{
            $data = ['pesan'=>'silahkan daftar terlebih dahulu di admin', 'LED_PIN'=>5];
            return response()->json($data,200);
        }
//
    }
    public function data(Request $request){
        $data = ['status'=>'200', 'pesan'=> $request->UID ];
        return response()->json($data,200);
    }
    function insert_status($uid,$status){
        $status = Status::insert(['rfid_id'=>$uid,$status=>1]);
        return $status;
    }
    function update_status($id, $waktu){
        $data = [$waktu => '1'];
        $status = Status::where('id','=',$id)->update($data);
        return $status;
    }
}
