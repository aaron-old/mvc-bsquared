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
     */
    public function create($data)
    {

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        if($request->hasFile('profilePhoto')){
            return response()->json(['message'=>'received']);
        }
        else {
            return response()->json(['message'=>$request]);
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
     */
    public function update($data)
    {

    }

    /**
     * @param $data
     * @param $path
     * @param $type
     * @return $this
     */
    private function validateRequest($data, $path, $type)
    {

    }
    
    /**
     * @param Request $request
     */
    public function destroy(Request $request)
    {

    }

}
