<?php

class CalendarController extends \BaseController {

	public $restful = true;

  protected $_calendar;

  /**
	 * Construct method
	 *
	 */

  public function __construct(Calendar $calendar)
  {
  	$this->_calendar = $calendar;
  }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Response::json(Calendar::get(), 200);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$calendar = Calendar::find($id);
		if (is_null($calendar)) {
			return Response::json("Not Found", 404);
		} 

		return Response::json($calendar->toArray(), 200);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$calendar = $this->_calendar->fill(Input::all());	
		if (!$calendar->save()) {
			return Response::json($calendar->getErrors()->toArray(), 400);
 		}

 		return Response::json("Resource Created", 201);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$calendar = Calendar::find($id);
		if (is_null($calendar)) {
			return Response::json("Not Found", 404);
		} 

		return Response::json("Resource Destroyed", 204);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$calendar = Calendar::find($id);
		if(is_null($calendar)) {
		   return Response::json("Not Found", 404);
		}
		$calendar->name = Input::get('name');

		// TODO: find better way
		if( !$this->_calendar->fill($calendar->toArray())->isValid()) {
			return Response::json($this->_calendar->getErrors()->toArray(), 400);
		}

		if (!$calendar->save()){
			return Response::json("Resource could not be saved", 400);
		}

		return Response::json("Resource Updated", 200);
	}
}
