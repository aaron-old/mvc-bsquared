<?php namespace Bsquared\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Bsquared\User;
use Bsquared\About;
use Bsquared\Label;
use Bsquared\Column;
use Bsquared\Path;
use Bsquared\Destination;

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
	 * @param $username
	 * @return Response
	 * @internal param int $id
	 */
	public function show($username)
	{
		$user = User::where('username', $username)->first();
		return view('members.about', compact('username','user'));
	}

    /**
     * Show the form for editing the specified resource.
     * GET /about/{id}/edit
     *
     * @param $username
     * @return Response
     * @internal param int $id
     */
	public function edit($username)
	{
        $user = User::where('username', $username)->first();
        return view('members.about', compact('username','user'));
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