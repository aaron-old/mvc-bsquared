<?php

namespace Bsquared\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Bsquared\Profile;
use Bsquared\User;
use Bsquared\Http\Controllers\ContactController;

class MainController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /main
	 *
	 * @return Response
	 */
	
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
	public function createUserContactMessage()
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
		return view('portfolio', compact('username'));
	}
	
	

}