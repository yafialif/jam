<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Recording;
use App\Http\Requests\CreateRecordingRequest;
use App\Http\Requests\UpdateRecordingRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\UserApp;


class RecordingController extends Controller {

	/**
	 * Display a listing of recording
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $recording = Recording::with("ustad")->get();

		return view('admin.recording.index', compact('recording'));
	}

	/**
	 * Show the form for creating a new recording
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $ustad = UserApp::pluck("nama_ustad", "id")->prepend('Please select', null);

	    
	    return view('admin.recording.create', compact("ustad"));
	}

	/**
	 * Store a newly created recording in storage.
	 *
     * @param CreateRecordingRequest|Request $request
	 */
	public function store(CreateRecordingRequest $request)
	{
	    $request = $this->saveFiles($request);
		Recording::create($request->all());

		return redirect()->route(config('quickadmin.route').'.recording.index');
	}

	/**
	 * Show the form for editing the specified recording.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$recording = Recording::find($id);
	    $ustad = UserApp::pluck("nama_ustad", "id")->prepend('Please select', null);

	    
		return view('admin.recording.edit', compact('recording', "ustad"));
	}

	/**
	 * Update the specified recording in storage.
     * @param UpdateRecordingRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateRecordingRequest $request)
	{
		$recording = Recording::findOrFail($id);

        $request = $this->saveFiles($request);

		$recording->update($request->all());

		return redirect()->route(config('quickadmin.route').'.recording.index');
	}

	/**
	 * Remove the specified recording from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Recording::destroy($id);

		return redirect()->route(config('quickadmin.route').'.recording.index');
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
            Recording::destroy($toDelete);
        } else {
            Recording::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.recording.index');
    }

}
