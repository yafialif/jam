<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\BgSlider;
use App\Http\Requests\CreateBgSliderRequest;
use App\Http\Requests\UpdateBgSliderRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class BgSliderController extends Controller {

	/**
	 * Display a listing of bgslider
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $bgslider = BgSlider::all();

		return view('admin.bgslider.index', compact('bgslider'));
	}

	/**
	 * Show the form for creating a new bgslider
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.bgslider.create');
	}

	/**
	 * Store a newly created bgslider in storage.
	 *
     * @param CreateBgSliderRequest|Request $request
	 */
	public function store(CreateBgSliderRequest $request)
	{
	    $request = $this->saveFiles($request);
		BgSlider::create($request->all());

		return redirect()->route(config('quickadmin.route').'.bgslider.index');
	}

	/**
	 * Show the form for editing the specified bgslider.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$bgslider = BgSlider::find($id);
	    
	    
		return view('admin.bgslider.edit', compact('bgslider'));
	}

	/**
	 * Update the specified bgslider in storage.
     * @param UpdateBgSliderRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateBgSliderRequest $request)
	{
		$bgslider = BgSlider::findOrFail($id);

        $request = $this->saveFiles($request);

		$bgslider->update($request->all());

		return redirect()->route(config('quickadmin.route').'.bgslider.index');
	}

	/**
	 * Remove the specified bgslider from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		BgSlider::destroy($id);

		return redirect()->route(config('quickadmin.route').'.bgslider.index');
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
            BgSlider::destroy($toDelete);
        } else {
            BgSlider::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.bgslider.index');
    }

}
