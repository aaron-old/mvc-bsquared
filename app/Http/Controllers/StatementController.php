<?php namespace Bsquared\Http\Controllers;

use Illuminate\Routing\Controller;

class StatementController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /statement
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /statement/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /statement
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /statement/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($username)
	{
		return view('members.statement');
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /statement/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /statement/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /statement/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}