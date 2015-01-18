<?php

class AppointmentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($calendar_id)
	{
		return Response::json(Calendar::findOrFail($calendar_id)->appointements->toArray());
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($calendar_id)
	{
		$appointment = new Appointment(Input::get());
		$appointment->calendar_id = $calendar_id;
		if (!$appointment->save())
		{
			// TODO: convert this to better error handler
			return Response::json($appointment->getErrors()->toArray(), 400);
		}
		return Response::json($appointment->toArray(), 201);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($calendar_id, $id)
	{
		Appointment::findOrFail($id)->delete();
		return Response::make(null, 204);
	}

/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($calendar_id, $id)
	{
		return Response::json(Appointment::findOrFail($id)->toArray());
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($calendar_id, $id)
	{
		$appointment = Calendar::findOrFail($calendar_id)->appointements()->findOrFail($id);
		// if (!$task)
		// {
		// 	App::abort(404);
		// }
		$appointment->fill(Input::get());
		if (!$appointment->save())
		{
			return Response::json($appointment->getErrors()->toArray(), 400);
		}
		return Response::json($appointment->toArray());
	}


}
