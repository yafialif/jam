<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jamaah;
class RfidRegisterControllerController extends Controller {

	/**
	 * Index page
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index()
    {
        $jamaah = Jamaah::select('jamaah.id', 'jamaah.name', 'jamaah.jenis_kelamin', 'jamaah.tlpn', 'jamaah.kategori', 'rfid.uid')->LeftJoin('rfid', 'jamaah.id', '=', 'rfid.jamaah_id')->where('rfid.jamaah_id','=',null)->get();
		return view('admin.rfidregistercontroller.index',compact('jamaah'));
	}

}
