<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Jamaah;
use App\Rfid;
use App\Http\Requests\CreateJamaahRequest;
use Schema;
use App\Http\Controllers\Traits\ImageUpload;
use App\Http\Requests\RegisterRequest;



class RegisterController extends Controller
{
    //
    public function index(){
        return view('absensi.index');
    }
    public function utama(){
        return view('absensi.pendaftaran');
    }

    public function store(Jamaah $jamaah, ImageUpload $imageUpload, CreateJamaahRequest $request){

        $name = $request->name;
        $tlpn = $request->tlpn;

        $status = Jamaah::where('tlpn','=',$tlpn)->where('name','=', $name)->count();

        if($status >= 1){
            return back()->withErrors(['Sudah Terdaftar', 'Nama '.$name.' dan Nomor telepon '.$tlpn.' Sudah terdaftar']);
        }
        else{
            $request = $imageUpload->saveImage($request);
        $jamaah = $jamaah->InsertData($request);
        return view('absensi.selesai');
        }


    }
    public function simpan(Request $request, Jamaah $jamaah, Rfid $rfid ){

        $jamaah = $jamaah->InsertData($request);
        $id = $jamaah->id;
        $uid = dechex($request->uid);
        $rfid->InsertData($id, $uid);
//        return $rfid;
        return view('absensi.selesai');

    }
    public function cektlpn($tlpn){
        $tlpn = Jamaah::select('tlpn')->where('tlpn','=',$tlpn)->get();
        if(empty($tlpn[0])){
            $data = false;
        }
        else{
            $data = true;
        }
        return response()->json($data,200);

    }
    public function cekRfid($uid){
        $datauid = dechex($uid);
        $rfid = Rfid::select('uid')->where('uid','=',$datauid)->get();
        if(empty($rfid[0])){
            $data = true;
        }
        else{
            $data = false;
        }
//        $data = $datauid;
        return response()->json($data,200);
    }
    public function updateRfid($id, $uid, Rfid $rfid){
        $datauid = dechex($uid);
        $datar = Rfid::select('uid')->where('uid','=',$datauid)->get();
        if(empty($datar[0])){
            $rfid->InsertData($id, $datauid);
//            $post = New Rfid();
//            $post->uid = $uid;
//            $post->save();
            $data = true;
        }
        else{
            $data = false;
        }
//        $data = $datauid;
        return response()->json($data,200);
    }

}
