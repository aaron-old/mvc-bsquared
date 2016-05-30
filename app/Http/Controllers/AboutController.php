<?php namespace Bsquared\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Queue\EntityNotFoundException;

use Bsquared\User;
use Bsquared\About;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller {
    

    /**
     * Show the form for creating a new resource.
     * GET /about/create
     *
     * @param $data
     * @return Response
     * @internal param Request $request
     * @internal param $authUserID
     */
	public function create($data)
	{
		$about = new About();
        $about->user_id = $data['user_id'];
        $validatedCreate  = $this->validateRequest($data, $about);
        $validatedCreate->save();
        return response()->json(['message'=>'create']);
	}
    
    
    /**
     * Store a newly created resource in storage.
     * POST /about
     *
     * @param Request $request
     * @return Response
     */
	public function store(Request $request)
	{
        if($request->ajax())
        {
          $authUserID = Auth::id();
          $overview = About::where('user_id', $authUserID)->first();

            $overviewData = [
               'overview' => $request->input('overview'),
                'user_id' => $authUserID
            ];
            
            try{
                if(!object_get($overview, 'user_id')){
                    return AboutController::create($overviewData);
                }
                else {
                    return AboutController::update($overviewData);
                }
            }
            catch (EntityNotFoundException $error)
            {
                return back($error);
            }

        }
        else {
            
            return response()->json(['message'=>'no good']);
        }
	}
    
    /**
     * Show the form for editing the specified resource.
     * GET /about/{id}/edit
     *
     * @param $username
     * @return Response
     * @internal param int $id
     */
	public function edit($username)
	{
        $user = User::where('username', $username)->first();
        return view('members.About', compact('username','user'));
	}

    /**
     * Update the specified resource in storage.
     * PUT /about/{id}
     *
     * @param $data
     * @return Response
     * @internal param $request
     * @internal param $authUserID
     * @internal param int $id
     */
	public function update($data)
	{
        $overview = About::where('user_id', $data['user_id'])->first();
        $validatedOverviewUpdate = $this->validateRequest($data, $overview);
        $validatedOverviewUpdate->save();
        return response()->json(['message'=>'updated']);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /about/{id}
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
     * @param $overview
     * @return $this
     */
    private function validateRequest($data, $overview)
    {
        $validator = Validator::make($data, [
           $data['overview'] => 'max:500'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        else {
            $overview->overview = $data['overview'];
            return $overview;
        }
    }
}