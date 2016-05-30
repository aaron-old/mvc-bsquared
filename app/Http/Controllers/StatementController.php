<?php 

namespace Bsquared\Http\Controllers;

use Illuminate\Contracts\Queue\EntityNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Bsquared\User;
use Bsquared\Statement;
use Illuminate\Support\Facades\Auth;

/**
 * Class StatementController
 * @package Bsquared\Http\Controllers
 */
class StatementController extends Controller {


    /**
     * Show the form for creating a new resource.
     * GET /statement/create
     *
     * @param $data
     * @return Response
     * @internal param Request $request
     * @internal param $authUserID
     * @internal param $statement
     */
	public function create($data)
	{
        $statement = new Statement();
        $statement->user_id = $data['user_id'];
        $validatedCreate = $this->validateRequest($data, $statement);
        $validatedCreate->save();
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
        $statement = Statement::where('user_id', $authUserID)->first();
        
        $data = [
            'statement' => $request->statement,
            'user_id' => $authUserID
        ];
        

        try{
            if(!object_get($statement, 'user_id')){
                
                return StatementController::create($data);
            }
            else {
                
                return StatementController::update($data);
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
        return view('members.Statement', compact('username', 'user'));
    }

    /**
     * Update the specified resource in storage.
     * PUT /statement/{id}
     *
     * @param $data
     * @return Response
     * @internal param $request
     * @internal param $authUserId
     * @internal param int $id
     */
	public function update($data)
	{
		$statement = Statement::findOrFail($data['user_id']);

        $validatedStatement = $this->validateRequest($data, $statement);
        $validatedStatement->save();
        
        return back();
	}

    /**
     * Remove the specified resource from storage.
     * DELETE /statement/{id}
     *
     * @param $user_id
     * @return Response
     * @internal param $username
     * @internal param int $id
     */
	public function destroy($user_id)
	{
		//
	}

    /**
     * @param $data
     * @param $statement
     * @return
     * @internal param Request $request
     */
    private function validateRequest($data, $statement){
        
        $statement->statement = $data['statement'];
        return $statement;
    }
}