<?php

namespace Bsquared\Http\Controllers;

use Bsquared\Path;
use Illuminate\Contracts\Queue\EntityNotFoundException;
use Illuminate\Http\Request;

use Bsquared\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PathController extends Controller
{
    /**
     * @param $data
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @internal param $type
     */
    public function create($data)
    {
        $path = new Path();
        $path->user_id = $data['user_id'];
        $validatedCreate = $this->validateRequest($data, $path);
        $validatedCreate->save();
        
        return response()->json(['message'=>$data['destination_id']]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Symfony\Component\HttpFoundation\File\Exception\FileException
     */
    public function store(Request $request)
    {
        if($request->hasFile('profilePhoto')){
            $file = $request->file('profilePhoto');
            $destinationPath = '../public/images/member_uploads/';
            $filename = $file->getClientOriginalName();

            $file->move($destinationPath, $filename);

            $path = Path::where('user_id', Auth::id())
                ->where('destination_id', $request->input('destinationID'))->first();

            $data = [
                'destination_id' => $request->destinationID,
                'user_id' => Auth::id(),
                'path' => $destinationPath.$filename
            ];

            try {
                if($path === null){
                    return PathController::create($data);
                }
                else {
                    return PathController::update($data, $path);
                }
            }
            catch (EntityNotFoundException $error){
                return back(['status'=>302]);
            }


        }
    }

    /**
     * @param $destinationID
     */
    public function edit($destinationID)
    {

    }

    /**
     * @param $data
     * @param $path
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @internal param $file
     * @internal param $type
     */
    public function update($data, $path)
    {
        $validatedUpdate = $this->validateRequest($data, $path);
        $validatedUpdate->save();

        return response()->json(['message'=>$data['destination_id']]);
    }

    /**
     * @param $data
     * @param $path
     * @return $this
     * @internal param $type
     */
    private function validateRequest($data, $path)
    {
        $path->path = $data['path'];
        $path->destination_id = $data['destination_id'];

        return $path;
    }
    
    /**
     * @param Request $request
     */
    public function destroy(Request $request)
    {

    }

}
