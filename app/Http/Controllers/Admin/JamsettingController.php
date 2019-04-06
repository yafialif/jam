<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Jamsetting;
use App\Http\Requests\CreateJamsettingRequest;
use App\Http\Requests\UpdateJamsettingRequest;
use Illuminate\Http\Request;



class JamsettingController extends Controller {

	/**
	 * Display a listing of jamsetting
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $jamsetting = Jamsetting::all();

		return view('admin.jamsetting.index', compact('jamsetting'));
	}

	/**
	 * Show the form for creating a new jamsetting
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.jamsetting.create');
	}

	/**
	 * Store a newly created jamsetting in storage.
	 *
     * @param CreateJamsettingRequest|Request $request
	 */
	public function store(CreateJamsettingRequest $request)
	{
	    
		Jamsetting::create($request->all());

		return redirect()->route(config('quickadmin.route').'.jamsetting.index');
	}

	/**
	 * Show the form for editing the specified jamsetting.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$jamsetting = Jamsetting::find($id);
	    
	    
		return view('admin.jamsetting.edit', compact('jamsetting'));
	}

	/**
	 * Update the specified jamsetting in storage.
     * @param UpdateJamsettingRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateJamsettingRequest $request)
	{
		$jamsetting = Jamsetting::findOrFail($id);

        

		$jamsetting->update($request->all());

		return redirect()->route(config('quickadmin.route').'.jamsetting.index');
	}

	/**
	 * Remove the specified jamsetting from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Jamsetting::destroy($id);

		return redirect()->route(config('quickadmin.route').'.jamsetting.index');
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
            Jamsetting::destroy($toDelete);
        } else {
            Jamsetting::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.jamsetting.index');
    }

}
