<?php namespace

Bsquared\Http\Controllers;


use Illuminate\Contracts\Queue\EntityNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Bsquared\User;
use Bsquared\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /profile
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


    /**
     * Show the form for creating a new resource.
     * GET /profile/create
     *
     * @param Request $request
     * @return Response
     * @internal param $user_id
     * @internal param User $user
     */

    public function create(Request $request)
	{
        $profile = new Profile();
        $profile->user_id = Auth::id();

        if($request->has('firstName')){
            $profile->firstName = $request->firstName;
        }
        if($request->has('lastName')){
            $profile->lastName = $request->lastName;
        }
        if($request->has('aboutMe')){
            $profile->aboutMe = $request->aboutMe;
        }

        $profile->save();

        return back();
    }

    /**
     * Store a newly created resource in storage.
     * POST /profile
     *
     * @param Request $request
     * @return Response
     * @internal param $username
     */
	public function store(Request $request)
	{
        $profile = Profile::where('user_id', Auth::id())->first();

        try{

            if(!object_get($profile,'user_id')){

                return ProfileController::create($request);
            }
            else {

                return ProfileController::update($request);
            }
        }
        catch (EntityNotFoundException $error)
        {
            return back($error);
        }
	}
    
    /**
     * Show the form for editing the specified resource.
     * GET /profile/{id}/edit
     *
     * @param $username
     * @return Response
     * @internal param int $id
     */
	public function edit($username)
	{
        $user = User::where('username', $username)->first();
        return view ('members.profile', compact('username', 'user'));
	}

    /**
     * Update the specified resource in storage.
     * PUT /profile/{id}
     *
     * @param $request
     * @return Response
     * @internal param $profile
     * @internal param $user_id
     * @internal param int $id
     */
	public function update($request)
	{
        $profile = Profile::findOrFail(Auth::id());

        if($request->has('firstName')){
            $profile->firstName = $request->firstName;
        }
        if($request->has('lastName')){
            $profile->lastName = $request->lastName;
        }
        if($request->has('aboutMe')){
            $profile->aboutMe = $request->aboutMe;
        }

        $profile->save();

        return back();
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /profile/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}