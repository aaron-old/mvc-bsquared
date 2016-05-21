<?php

namespace Bsquared\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;


use Bsquared\Profile;
use Bsquared\User;
use Bsquared\About;
use Bsquared\Label;
use Bsquared\Path;
use Bsquared\Column;
use Bsquared\Skill;
use Bsquared\Statement;
use Bsquared\Works;


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
	public function showPortfolio($username)
	{
		$member = User::where('username', $username);
		$userID = $member->user_id;

        $portfolio = Profile::getPortfolio($userID);

//		$portfolio = [
//			$profile = Profile::find($userID),
//			$statement = Statement::find($userID),
//			$about = About::find($userID)
//		];

		return view('portfolio', compact('portfolio'));
	}


    public function getPortfolio($userID){

    }


    private function getProfile($userID){
        return Profile::find($userID);
    }

    private function getStatement($userID){
        return Statement::find($userID);
    }

    private function getLabels($userID){

    }

    private function getColumns($userID){

    }

    private function getSkills($userID){


    }

    private function getWorks($userID){

    }

    private function getAbout($userID){

    }




	
	

}