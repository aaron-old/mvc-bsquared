<?php namespace Bsquared\Http\Controllers;

use Bsquared\Http\Requests\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Bsquared\User;
use Bsquared\Works;
use Bsquared\Path;
use Bsquared\Destination;

class WorksController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /works
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /works/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

    /**
     * Store a newly created resource in storage.
     * POST /works
     *
     * @param Request $request
     * @return Response
     */
	public function store(Request $request)
	{
		//
        return $request->all();
	}

	/**
	 * Display the specified resource.
	 * GET /works/{id}
	 *
	 * @param $username
	 * @return Response
	 * @internal param int $id
	 */
	public function show($username)
	{
        $user = User::where('username', $username)->first();
		return view('members.works', compact('username', 'user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /works/{id}/edit
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
	 * PUT /works/{id}
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
	 * DELETE /works/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}