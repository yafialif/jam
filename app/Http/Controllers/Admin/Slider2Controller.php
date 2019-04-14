<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Slider2;
use App\Http\Requests\CreateSlider2Request;
use App\Http\Requests\UpdateSlider2Request;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class Slider2Controller extends Controller {

	/**
	 * Display a listing of slider2
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $slider2 = Slider2::all();

		return view('admin.slider2.index', compact('slider2'));
	}

	/**
	 * Show the form for creating a new slider2
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.slider2.create');
	}

	/**
	 * Store a newly created slider2 in storage.
	 *
     * @param CreateSlider2Request|Request $request
	 */
	public function store(CreateSlider2Request $request)
	{
	    $request = $this->saveFiles($request);
		Slider2::create($request->all());

		return redirect()->route(config('quickadmin.route').'.slider2.index');
	}

	/**
	 * Show the form for editing the specified slider2.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$slider2 = Slider2::find($id);
	    
	    
		return view('admin.slider2.edit', compact('slider2'));
	}

	/**
	 * Update the specified slider2 in storage.
     * @param UpdateSlider2Request|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateSlider2Request $request)
	{
		$slider2 = Slider2::findOrFail($id);

        $request = $this->saveFiles($request);

		$slider2->update($request->all());

		return redirect()->route(config('quickadmin.route').'.slider2.index');
	}

	/**
	 * Remove the specified slider2 from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Slider2::destroy($id);

		return redirect()->route(config('quickadmin.route').'.slider2.index');
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
            Slider2::destroy($toDelete);
        } else {
            Slider2::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.slider2.index');
    }

}
