<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Jamaah;
use App\Status;
use App\Rfid;
use App\Http\Requests\CreateJamaahRequest;
use App\Http\Requests\UpdateJamaahRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class JamaahController extends Controller {

	/**
	 * Display a listing of jamaah
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $jamaah = Jamaah::latest('created_at')->get();

		return view('admin.jamaah.index', compact('jamaah'));
	}

	public function search(Request $request){
	    $search = $request->search;
	    $uid = $request->search;
        $datauid = dechex($uid);
        $jamaah = Jamaah::Where('rfid.uid','=',$datauid)
            ->join('rfid','jamaah.id','rfid.jamaah_id')
            ->get();
        return view('admin.jamaah.index', compact('jamaah'))->render();

    }

	/**
	 * Show the form for creating a new jamaah
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{


	    return view('admin.jamaah.create');
	}

	/**
	 * Store a newly created jamaah in storage.
	 *
     * @param CreateJamaahRequest|Request $request
	 */
	public function store(CreateJamaahRequest $request)
	{
	    $request = $this->saveFiles($request);
		Jamaah::create($request->all());

		return redirect()->route(config('quickadmin.route').'.jamaah.index');
	}

	/**
	 * Show the form for editing the specified jamaah.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$jamaah = Jamaah::select('jamaah.id','jamaah.name','jamaah.image','jamaah.tlpn','jamaah.jenis_kelamin','jamaah.alamat','jamaah.kategori','jamaah.tlpn_saudara','jamaah.tgl_lahir','rfid.uid')
            ->where('jamaah.id','=',$id)
            ->join('rfid','jamaah.id','=','rfid.jamaah_id')->get();


		return view('admin.jamaah.edit', compact('jamaah'));
	}

	/**
	 * Update the specified jamaah in storage.
     * @param UpdateJamaahRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateJamaahRequest $request)
	{
		$jamaah = Jamaah::findOrFail($id);

        $request = $this->saveFiles($request);

		$jamaah->update($request->all());

		return redirect()->route(config('quickadmin.route').'.jamaah.index');
	}

	/**
	 * Remove the specified jamaah from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{

		Jamaah::destroy($id);

		return redirect()->route(config('quickadmin.route').'.jamaah.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            Jamaah::destroy($toDelete);
        } else {
            Jamaah::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.jamaah.index');
    }

}
