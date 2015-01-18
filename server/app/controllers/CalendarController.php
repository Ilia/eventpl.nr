<?php

class CalendarController extends \BaseController {

	public $restful = true;

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Response::json(Calendar::get());
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Response::json(Calendar::findOrFail($id)->toArray());
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$calendar = new Calendar(Input::all());

    if (!$calendar->save()) {
			App::abort(400);
 		}

 		return Response::json($calendar->toArray(), 201);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Calendar::findOrFail($id)->delete();
		return Response::make(null, 204);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$calendar = Calendar::findOrFail($id);
		$calendar->fill(Input::get());

		if (!$calendar->save()){
			App::abort(400, $calendar->getErrors()->toArray());
		}

		return Response::json($calendar->toArray());
	}
}
