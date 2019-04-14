<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Status;
use App\Http\Requests\CreateStatusRequest;
use App\Http\Requests\UpdateStatusRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Rfid;


class StatusController extends Controller {

	/**
	 * Display a listing of status
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
//        $status = Status::with("rfid")->get();
        $status = Status::select(DB::raw('sum(saur) AS saur, sum(buka) AS buka, sum(itikaf) AS itikaf, DATE(created_at) AS date'))
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get();

		return view('admin.status.index', compact('status'));
	}

	/**
	 * Show the form for creating a new status
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $rfid = Rfid::pluck("uid", "id")->prepend('Please select', null);


        $saur = Status::$saur;
        $buka = Status::$buka;
        $itikaf = Status::$itikaf;

	    return view('admin.status.create', compact("rfid", "saur", "buka", "itikaf"));
	}

	/**
	 * Store a newly created status in storage.
	 *
     * @param CreateStatusRequest|Request $request
	 */
	public function store(CreateStatusRequest $request)
	{

		Status::create($request->all());

		return redirect()->route(config('quickadmin.route').'.status.index');
	}

	/**
	 * Show the form for editing the specified status.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$status = Status::find($id);
	    $rfid = Rfid::pluck("uid", "id")->prepend('Please select', null);


        $saur = Status::$saur;
        $buka = Status::$buka;
        $itikaf = Status::$itikaf;

		return view('admin.status.edit', compact('status', "rfid", "saur", "buka", "itikaf"));
	}

	/**
	 * Update the specified status in storage.
     * @param UpdateStatusRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateStatusRequest $request)
	{
		$status = Status::findOrFail($id);



		$status->update($request->all());

		return redirect()->route(config('quickadmin.route').'.status.index');
	}

	/**
	 * Remove the specified status from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Status::destroy($id);

		return redirect()->route(config('quickadmin.route').'.status.index');
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
            Status::destroy($toDelete);
        } else {
            Status::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.status.index');
    }

}
