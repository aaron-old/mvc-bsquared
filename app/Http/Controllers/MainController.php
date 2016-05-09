<?php

namespace Bsquared\Http\Controllers;

use Illuminate\Routing\Controller;
use Bsquared\Profile;
use Bsquared\User;

class MainController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /main
	 *
	 * @return Response
	 */

    protected $profiles;
    protected $members;

	public function index()
	{
		return view('welcome');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /main/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /main
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

    /**
     * Display the specified resource.
     * GET /main/{id}
     *
     * @param $username
     * @return Response
     * @internal param int $id
     */
	public function show($username)
	{
        $profiles = Profile::all();
        $members = User::all();

		return view('portfolio', compact('profiles', 'members'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /main/{id}/edit
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
	 * PUT /main/{id}
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
	 * DELETE /main/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}