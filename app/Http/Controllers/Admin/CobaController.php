<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Coba;
use App\Http\Requests\CreateCobaRequest;
use App\Http\Requests\UpdateCobaRequest;
use Illuminate\Http\Request;



class CobaController extends Controller {

	/**
	 * Display a listing of coba
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $coba = Coba::all();

		return view('admin.coba.index', compact('coba'));
	}

	/**
	 * Show the form for creating a new coba
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.coba.create');
	}

	/**
	 * Store a newly created coba in storage.
	 *
     * @param CreateCobaRequest|Request $request
	 */
	public function store(CreateCobaRequest $request)
	{
	    
		Coba::create($request->all());

		return redirect()->route(config('quickadmin.route').'.coba.index');
	}

	/**
	 * Show the form for editing the specified coba.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$coba = Coba::find($id);
	    
	    
		return view('admin.coba.edit', compact('coba'));
	}

	/**
	 * Update the specified coba in storage.
     * @param UpdateCobaRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateCobaRequest $request)
	{
		$coba = Coba::findOrFail($id);

        

		$coba->update($request->all());

		return redirect()->route(config('quickadmin.route').'.coba.index');
	}

	/**
	 * Remove the specified coba from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Coba::destroy($id);

		return redirect()->route(config('quickadmin.route').'.coba.index');
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
            Coba::destroy($toDelete);
        } else {
            Coba::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.coba.index');
    }

}
