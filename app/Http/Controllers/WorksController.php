<?php namespace Bsquared\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Queue\EntityNotFoundException;

use Bsquared\User;
use Bsquared\Works;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;


class WorksController extends Controller
{

    /**
     * Show the form for creating a new resource.
     * GET /works/create
     *
     * @param $data
     * @return Response
     */
    public function create($data)
    {
        $works = new Works();
        $works->user_id = $data['user_id'];
        $validatedCreate = $this->validateRequest($data, $works);
        $validatedCreate->save();
        return response()->json(['message' => 'created']);
    }

    public function show($username, $destination_id)
    {
        $works = Works::where('user_id', Auth::id())->where('destination_id', $destination_id)->first();

        if($works !== null){
            return response()->json(['works'=> $works]);
        }
        else {
            return response()->json(['works'=> 'null']);
        }
    }

    /**
     * Store a newly created resource in storage.
     * POST /works
     *
     * @param Request $request
     * @return Response
     */
	public function store(Request $request)
	{

		if($request->ajax()) {

            $authUserID = Auth::id();

            $works = Works::where('user_id', $authUserID)->where('destination_id', $request->input('workDestinationID'))->first();

            $data = [
                'title'          => $request->input('workTitle'),
                'description'    => $request->input('workDescription'),
                'link'           => $request->input('workLink'),
                'destination_id' => $request->input('workDestinationID'),
                'user_id'        => $authUserID
            ];

            try {
                if($works === null){
                    return WorksController::create($data);
                }
                else {
                    return WorksController::update($data);
                }
            }
            catch (EntityNotFoundException $error){
                return back($error);
            }
        }
        else {
            return response()->json(['message'=>'not ajax']);
        }
	}

    /**
     * Show the form for editing the specified resource.
     * GET /works/{id}/edit
     *
     * @param $username
     * @return Response
     * @internal param $destinationID
     * @internal param int $id
     */
	public function edit($username)
	{
		$user = User::where('username', $username)->first();
        return view('members.Works', compact('username', 'user'));
	}

    /**
     * Update the specified resource in storage.
     * PUT /works/{id}
     *
     * @param $data
     * @return Response
     * @internal param int $id
     */
	public function update($data)
	{
        $works = Works::where('user_id', $data['user_id'])->where('destination_id', $data['destination_id'])->first();
        $validatedUpdate = $this->validateRequest($data, $works);
        $validatedUpdate->save();
        return response()->json(['message'=>'updated']);
	}

    private function validateRequest($data, $works){

        $validator = Validator::make($data, [
            $data['title'] => 'max:100',
            $data['description'] => 'max:1000',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        else {
            $works->title               = $data['title'];
            $works->destination_id      = $data['destination_id'];
            $works->project_description = $data['description'];
            $works->work_link           = $data['link'];

            return $works;
        }
    }

	/**
	 * Remove the specified resource from storage.
	 * DELETE /works/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}