<?php namespace Bsquared\Http\Controllers;

use Illuminate\Routing\Controller;

class AboutController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /about
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /about/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /about
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /about/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($username)
	{
		return view('members.about');
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /about/{id}/edit
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
	 * PUT /about/{id}
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
	 * DELETE /about/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}