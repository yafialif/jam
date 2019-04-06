<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Usermanual;
use App\Http\Requests\CreateUsermanualRequest;
use App\Http\Requests\UpdateUsermanualRequest;
use Illuminate\Http\Request;



class UsermanualController extends Controller {

	/**
	 * Display a listing of usermanual
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $usermanual = Usermanual::all();

		return view('admin.usermanual.index', compact('usermanual'));
	}

	/**
	 * Show the form for creating a new usermanual
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.usermanual.create');
	}

	/**
	 * Store a newly created usermanual in storage.
	 *
     * @param CreateUsermanualRequest|Request $request
	 */
	public function store(CreateUsermanualRequest $request)
	{
	    
		Usermanual::create($request->all());

		return redirect()->route(config('quickadmin.route').'.usermanual.index');
	}

	/**
	 * Show the form for editing the specified usermanual.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$usermanual = Usermanual::find($id);
	    
	    
		return view('admin.usermanual.edit', compact('usermanual'));
	}

	/**
	 * Update the specified usermanual in storage.
     * @param UpdateUsermanualRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateUsermanualRequest $request)
	{
		$usermanual = Usermanual::findOrFail($id);

        

		$usermanual->update($request->all());

		return redirect()->route(config('quickadmin.route').'.usermanual.index');
	}

	/**
	 * Remove the specified usermanual from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Usermanual::destroy($id);

		return redirect()->route(config('quickadmin.route').'.usermanual.index');
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
            Usermanual::destroy($toDelete);
        } else {
            Usermanual::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.usermanual.index');
    }

}
