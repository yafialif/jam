<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Jamaah;
use App\Rfid;
use App\Http\Requests\CreateJamaahRequest;

class RegisterController extends Controller
{
    //
    public function index(){
        return view('absensi.index');
    }
    public function utama(){
        return view('absensi.pendaftaran');
    }

    public function store(Jamaah $jamaah, CreateJamaahRequest $request){
        $jamaah = $jamaah->InsertData($request);
        return view('absensi.selesai');

    }
    public function simpan(Request $request, Jamaah $jamaah, Rfid $rfid ){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'tlpn' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'kategori' => 'required',
            'uid' => 'unique:rfid,uid',
        ]);

        if ($validator->fails()) {
            return redirect('/pendaftaran')
                ->withErrors($validator)
                ->withInput();
        }
        $jamaah = $jamaah->InsertData($request);
        $id = $jamaah->id;
        $uid = dechex($request->uid);
        $rfid->InsertData($id, $uid);
//        return $rfid;
        return view('absensi.selesai');

    }

}
