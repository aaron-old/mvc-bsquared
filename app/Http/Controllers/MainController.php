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
		$member = User::where('username', '=', $username)->first();

        $userID = $member->user_id;

        $portfolio = User::getUserPortfolio($userID);

		return view('portfolio', compact('portfolio'));
	}
    
    private function getProfile($userID){
        return Profile::find($userID);
    }

    private function getStatement($userID){
        return Statement::find($userID);
    }

    /**
     * Description: Returns the labels for an queried user.
     * @param $userID
     * @param $setI
     * @param $setK
     * @return array
     * @internal param $i
     * @internal param $k
     */
    private function getLabels($userID, $setI, $setK)
    {
        $count = 0;
        $labels = []; // prepare the array for return.

        for($i = $setI, $k = $setK; $i < 11; $k++, $i++)
        {
            $label = Label::where('userID', $userID)->where('destination_id', $k)->pluck('label');

            if($label === null) {

                $labels[$count] = [
                    'label'.$count => 'Coming Soon!',
                    'destination_id' => $k
                ];
            }
            else {

                $labels[$count] = [
                    'label' . $count => $label,
                    'destination_id' => $k
                ];
            }
        }

        return $labels;
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