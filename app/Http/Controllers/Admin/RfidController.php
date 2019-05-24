<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Rfid;
use App\Http\Requests\CreateRfidRequest;
use App\Http\Requests\UpdateRfidRequest;
use Illuminate\Http\Request;

use App\Jamaah;


class RfidController extends Controller {

	/**
	 * Display a listing of rfid
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
    public function index(Request $request)
    {
        $jamaah = Jamaah::latest('created_at')->paginate(5);

        return view('admin.jamaah.index', compact('jamaah'));
    }
    public function search(Request $request){
        $search = $request->search;
        $uid = $request->search;
        $datauid = dechex($uid);
        $jamaah = Jamaah::Where('rfid.uid','=',$datauid)
            ->join('rfid','jamaah.id','rfid.jamaah_id')
            ->get();
        return view('admin.rfid.index', compact('jamaah'))->render();

    }

	/**
	 * Show the form for creating a new rfid
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $jamaah = Jamaah::pluck("name", "id")->prepend('Please select', null);


	    return view('admin.rfid.create', compact("jamaah"));
	}

	/**
	 * Store a newly created rfid in storage.
	 *
     * @param CreateRfidRequest|Request $request
	 */
	public function store(CreateRfidRequest $request)
	{

		Rfid::create($request->all());

		return redirect()->route(config('quickadmin.route').'.rfid.index');
	}

	/**
	 * Show the form for editing the specified rfid.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$rfid = Rfid::find($id);
	    $jamaah = Jamaah::pluck("name", "id")->prepend('Please select', null);


		return view('admin.rfid.edit', compact('rfid', "jamaah"));
	}

	/**
	 * Update the specified rfid in storage.
     * @param UpdateRfidRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateRfidRequest $request)
	{
		$rfid = Rfid::findOrFail($id);



		$rfid->update($request->all());

		return redirect()->route(config('quickadmin.route').'.rfid.index');
	}

	/**
	 * Remove the specified rfid from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Rfid::destroy($id);

		return redirect()->route(config('quickadmin.route').'.rfid.index');
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
            Rfid::destroy($toDelete);
        } else {
            Rfid::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.rfid.index');
    }

}
