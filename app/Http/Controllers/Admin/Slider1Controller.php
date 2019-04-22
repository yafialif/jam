<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Slider1;
use App\Http\Requests\CreateSlider1Request;
use App\Http\Requests\UpdateSlider1Request;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class Slider1Controller extends Controller {

	/**
	 * Display a listing of slider1
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $slider1 = Slider1::all();

		return view('admin.slider1.index', compact('slider1'));
	}

	/**
	 * Show the form for creating a new slider1
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{


	    return view('admin.slider1.create');
	}

	/**
	 * Store a newly created slider1 in storage.
	 *
     * @param CreateSlider1Request|Request $request
	 */
	public function store(CreateSlider1Request $request)
	{
	    $request = $this->saveFiles($request);
		Slider1::create($request->all());

		return redirect()->route(config('quickadmin.route').'.slider1.index');
	}

	/**
	 * Show the form for editing the specified slider1.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$slider1 = Slider1::find($id);


		return view('admin.slider1.edit', compact('slider1'));
	}

	/**
	 * Update the specified slider1 in storage.
     * @param UpdateSlider1Request|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateSlider1Request $request)
	{
		$slider1 = Slider1::findOrFail($id);

        $request = $this->saveFiles($request);

		$slider1->update($request->all());

		return redirect()->route(config('quickadmin.route').'.slider1.index');
	}

	/**
	 * Remove the specified slider1 from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Slider1::destroy($id);

		return redirect()->route(config('quickadmin.route').'.slider1.index');
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
            Slider1::destroy($toDelete);
        } else {
            Slider1::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.slider1.index');
    }

    public function getdata()
    {
        $slider1 = Slider1::all();

        return response()->json($slider1,200);
    }

}
