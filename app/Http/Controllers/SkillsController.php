<?php namespace Bsquared\Http\Controllers;

use Illuminate\Contracts\Queue\EntityNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Bsquared\User;
use Bsquared\Destination;


class SkillsController extends Controller {

    
    /**
     * Store a newly created resource in storage.
     * POST /skills
     *
     * @param Request $request
     * @return Response
     */
	public function store(Request $request)
	{
		$authUserID = Auth::id();
        $portionSelected = $request->destination_id;
        $this->createUpdate($request, $portionSelected, $authUserID);
	}


    /**
     * Show the form for editing the specified resource.
     * GET /skills/{id}/edit
     *
     * @param $username
     * @return Response
     * @internal param int $id
     */
	public function edit($username)
	{
        $user = User::where('username', $username)->first();
        $destinations  = Destination::all();

        return view('members.skills', compact('username', 'user', 'destinations'));
	}
    

    private function createUpdate(Request $request, $portionSelected, $userID){
		
        /*
         * Check to see what portion is selected, 
         */
		LabelController::setLabel($request, $portionSelected, $userID);
		ColumnController::setColumn($request, $portionSelected, $userID);
		PathController::setPath($request, $portionSelected, $userID);
    }

}