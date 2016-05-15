<?php namespace Bsquared\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Bsquared\User;
use Bsquared\Label;
use Bsquared\Column;
use Bsquared\Path;
use Bsquared\Destination;


class SkillsController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /skills
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /skills/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

    /**
     * Store a newly created resource in storage.
     * POST /skills
     *
     * @param Request $request
     * @return Response
     */
	public function store(Request $request)
	{
		//
	}

    /**
     * Display the specified resource.
     * GET /skills/{id}
     *
     * @param $username
     * @return Response
     * @internal param int $id
     */
	public function show($username)
	{
        $user = User::where('username', $username)->first();
		return view('members.skills', compact('username', 'user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /skills/{id}/edit
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
	 * PUT /skills/{id}
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
	 * DELETE /skills/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}