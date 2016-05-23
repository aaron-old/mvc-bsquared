<?php

namespace Bsquared\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
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
     * @param $username
     * @return Response
     */
	public function createUserContactMessage($username)
	{
		//
	}

	
    /**
     * Display the specified resource.
     * GET /main/{id}
     * Returns the associated model for a portfolio to the portfolio view.
     * @param $username
     * @return Response
     * @internal param int $id
     */
	public function showPortfolio($username)
	{
		$member = User::where('username', '=', $username)->first();
        $userID = $member->user_id;
        $portfolio = User::getUserPortfolio($userID);
		return view('portfolio', compact('portfolio'));
	}

}