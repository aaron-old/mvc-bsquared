<?php 

namespace Bsquared\Http\Controllers;


use Illuminate\Contracts\Queue\EntityNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Storage;
use Bsquared\User;
use Bsquared\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;


/**
 * Class ProfileController
 * @package Bsquared\Http\Controllers
 */
class ProfileController extends Controller {

    /**
     * Show the form for creating a new resource.
     * GET /profile/create
     *
     * @param $data
     * @return Response
     * @internal param Request $request
     * @internal param $authUserID
     * @internal param $user_id
     * @internal param User $user
     */
    public function create($data)
	{
        $profile = new Profile();
        $profile->user_id = $data['user_id'];
        $validatedCreate = $this->validateRequest($data, $profile);
        $validatedCreate->save();
        return response()->json(['message'=>'create']);
    }

    /**
     * Store a newly created resource in storage.
     * Checks to see if the user has a record, regardless if complete.
     * POST /profile
     *
     * @param Request $request
     * @return Response
     * @internal param $username
     */
	public function store(Request $request)
    {
        $authUserID = Auth::id();
        $profile = Profile::where('user_id', $authUserID)->first();

        $data = [
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'aboutMe' => $request->aboutMe,
            'user_id' => $authUserID
        ];

        try{

            if(!object_get($profile,'user_id')){

                return ProfileController::create($data);
            }
            else {

                return ProfileController::update($data);
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
        return view ('members.Profile', compact('username', 'user'));
	}

    /**
     * Update the specified resource in storage.
     * PUT /profile/{id}
     *
     * @param $data
     * @return Response
     * @internal param $request
     * @internal param $authUserID
     * @internal param $profile
     * @internal param $user_id
     * @internal param int $id
     */
	public function update($data)
	{
        $profile = Profile::findOrFail($data['user_id']);
        $validatedUpdate  = $this->validateRequest($data, $profile);
        $validatedUpdate->save();
        return response()->json(['message'=>'Complete']);
	}

    /**
     * Remove the specified resource from storage.
     * DELETE /profile/{id}
     *
     * @param $user_id
     * @return Response
     * @internal param int $id
     */
	public function destroy($user_id)
	{
		//
	}

    /**
     * @param $data
     * @param $profile
     * @return mixed
     * @internal param Request $request
     */
    private function validateRequest($data, $profile)
    {
        
        $validator = Validator::make($data, [
           $data['firstName'] => 'max:30',
            $data['lastName'] => 'max:30',
            $data['aboutMe'] => 'min:10|max:1000'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        else {

            $profile->firstName = $data['firstName'];
            $profile->lastName = $data['lastName'];
            $profile->aboutMe = $data['aboutMe'];

            return $profile;
        }
    }
}