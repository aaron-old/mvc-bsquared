<?php namespace

Bsquared\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Bsquared\User;
use Bsquared\Profile;

class ProfileController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /profile
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /profile/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /profile
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		return $request->all();
	}

    /**
     * Display the specified resource.
     * GET /profile/{id}
     * @param User $username
     * @return Response
     * @internal param \Bsquared\Http\Controllers\User|User $username
     * @internal param int $id
     */
	public function show($username)
	{
        $user = User::where('username', $username)->first();
		return view ('members.profile', compact('username', 'user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /profile/{id}/edit
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
	 * PUT /profile/{id}
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
	 * DELETE /profile/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}