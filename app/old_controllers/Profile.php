<?php

/**
 * Created by PhpStorm.
 * User: Aaron Young
 * Date: 5/22/2016
 * Time: 5:49 PM
 */
class Profile
{
    /**
     * Show the form for creating a new resource.
     * GET /profile/create
     *
     * @param Request $request
     * @param $authUserID
     * @return Response
     * @internal param $user_id
     * @internal param User $user
     */

    public function create(Request $request, $authUserID)
    {
        $profile = new Profile();
        $profile->user_id = $authUserID;
        $create = $this->validateRequest($request, $profile);
        $create->save();
        session()->flash('status', 'Profile updated!');
        return back();
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

        try{

            if(!object_get($profile,'user_id')){

                return ProfileController::create($request, $authUserID);
            }
            else {

                return ProfileController::update($request, $authUserID);
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
     * @param $authUserID
     * @return Response
     * @internal param $profile
     * @internal param $user_id
     * @internal param int $id
     */
    public function update($request, $authUserID)
    {
        $profile = Profile::findOrFail($authUserID);
        $update  = $this->validateRequest($request, $profile);

        $update->save();
        session()->flash('status', 'Profile updated!');
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

    /**
     * @param Request $request
     * @param $profile
     * @return mixed
     */
    private function validateRequest(Request $request, $profile)
    {
        if($request->has('firstName')){
            $profile->firstName = $request->firstName;
        }
        if($request->has('lastName')){
            $profile->lastName = $request->lastName;
        }
        if($request->has('aboutMe')){
            $profile->aboutMe = $request->aboutMe;
        }
        return $profile;
    }
}