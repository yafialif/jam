<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Event;
use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Category;


class EventController extends Controller {

	/**
	 * Display a listing of event
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $event = Event::with("category")->get();

		return view('admin.event.index', compact('event'));
	}

	/**
	 * Show the form for creating a new event
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $category = Category::pluck("nama_category", "id")->prepend('Please select', null);

	    
	    return view('admin.event.create', compact("category"));
	}

	/**
	 * Store a newly created event in storage.
	 *
     * @param CreateEventRequest|Request $request
	 */
	public function store(CreateEventRequest $request)
	{
	    $request = $this->saveFiles($request);
		Event::create($request->all());

		return redirect()->route(config('quickadmin.route').'.event.index');
	}

	/**
	 * Show the form for editing the specified event.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$event = Event::find($id);
	    $category = Category::pluck("nama_category", "id")->prepend('Please select', null);

	    
		return view('admin.event.edit', compact('event', "category"));
	}

	/**
	 * Update the specified event in storage.
     * @param UpdateEventRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateEventRequest $request)
	{
		$event = Event::findOrFail($id);

        $request = $this->saveFiles($request);

		$event->update($request->all());

		return redirect()->route(config('quickadmin.route').'.event.index');
	}

	/**
	 * Remove the specified event from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Event::destroy($id);

		return redirect()->route(config('quickadmin.route').'.event.index');
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
            Event::destroy($toDelete);
        } else {
            Event::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.event.index');
    }

}
