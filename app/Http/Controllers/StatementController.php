<?php 

namespace Bsquared\Http\Controllers;

use Bsquared\Profile;
use Illuminate\Contracts\Queue\EntityNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Bsquared\User;
use Bsquared\Statement;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;


class StatementController extends Controller {


    /**
     * Show the form for creating a new resource.
     * GET /statement/create
     *
     * @param Request $request
     * @param $authUserID
     * @return Response
     * @internal param $statement
     */
	public function create(Request $request, $authUserID)
	{
        $statement = new Statement();
        $statement->user_id = $authUserID;
        $validatedCreate = $this->validateRequest($request, $statement);
        $validatedCreate->save();
        session()->flash('status', 'Statement updated!');
        return back();
	}

    /**
     * Store a newly created resource in storage.
     * POST /statement
     *
     * @param Request $request
     * @return Response
     */
	public function store(Request $request)
	{
        $authUserID = Auth::id();
        $statement = Statement::find($authUserID);

        try{
            if(!object_get($statement, 'user_id')){
                return StatementController::create($request, $authUserID);
            }
            else {
                return StatementController::update($request , $authUserID);
            }
        }
        catch(EntityNotFoundException $error)
        {
            return back($error);
        }
	}


    /**
     * Show the form for editing the specified resource.
     * GET /statement/{id}/edit
     *
     * @param $username
     * @return Response
     * @internal param int $id
     */
	public function edit($username)
	{
        $user = User::where('username', $username)->first();
        return view('members.statement', compact('username', 'user'));
    }

    /**
     * Update the specified resource in storage.
     * PUT /statement/{id}
     *
     * @param $request
     * @param $authUserId
     * @return Response
     * @internal param int $id
     */
	public function update($request, $authUserId)
	{
		$statement = Statement::findOrFail($authUserId);
        $validatedStatement = $this->validateRequest($request, $statement);
        
        $validatedStatement->save();
        session()->flash('status', 'Statement updated!');
        return back();
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /statement/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    /**
     * @param Request $request
     * @param $statement
     */
    private function validateRequest(Request $request, $statement){
        
        if($request->has('statement')){
            $statement->statement = $request->statement;
        }
        
        return $statement;
    }
}