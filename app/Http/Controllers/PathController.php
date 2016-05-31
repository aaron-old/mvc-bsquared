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
     */
    public function store(Request $request)
    {
        
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

        if($type === 'image'){
            $validator = Validator::make($data, [
               $data['image'] => 'mimes:jpg,jpeg'
            ]);

            if($validator->fails()){
                return back()->withErrors($validator)->withInput();
            }
            else {
                return $path;
            }
        }
        else {
            $validator = Validator::make($data, [
               'resume' => 'mimes:pdf'
            ]);
            if($validator->fails()){
                return back()->withErrors($validator)->withInput();
            }
            else {
                return $path;
            }
        }
    }


    /**
     * @param Request $request
     */
    public function destroy(Request $request)
    {

    }

}
