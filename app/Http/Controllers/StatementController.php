<?php 

namespace Bsquared\Http\Controllers;

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
     * @return Response
     * @internal param $statement
     */
	public function create(Request $request)
	{
		$statement = new Statement($request->all());
        $statement->user_id = Auth::id();

        return $request;
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

        $statement = Statement::where('user_id', Auth::id())->first();

        if($statement !== null){

            $statement->statement = $request->statement;
        }
        else {

            return $request;
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
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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

}