<?php namespace

Bsquared\Http\Controllers;


use Illuminate\Contracts\Queue\EntityNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Bsquared\User;
use Bsquared\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class ProfileController extends Controller {

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

    public function create($data)
	{
        $profile = new Profile();
        $profile->user_id = $data['user_id'];
        $create = $this->validateRequest($data, $profile);
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
        $update  = $this->validateRequest($data, $profile);

        //return response()->json(['message'=>$data]);


        $update->save();
        response()->json(['message'=>'Complete']);
        session()->flash('status', 'Profile updated!');
        return back()->with('status', 'Profile updated!');
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
     * @param $data
     * @param $profile
     * @return mixed
     * @internal param Request $request
     */
    private function validateRequest($data, $profile)
    {

        $profile->firstName = $data['firstName'];
        $profile->lastName = $data['lastName'];
        $profile->aboutMe = $data['aboutMe'];

        return $profile;
    }
}