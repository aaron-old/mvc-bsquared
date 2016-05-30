<?php

namespace Bsquared\Http\Controllers;


use Bsquared\Label;
use Illuminate\Contracts\Queue\EntityNotFoundException;
use Illuminate\Http\Request;

use Bsquared\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LabelController extends Controller
{

    /**
     * @param $data
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create($data)
    {
        $label = new Label();
        $label->user_id = $data['user_id'];

        $validatedCreate = $this->validateRequest($data, $label);
        $validatedCreate->save();
        
        return response()->json(['message'=>'created']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $authUserID = Auth::id();
        $label = Label::where('user_id', $authUserID)->where('destination_id', $request->input('labelDestinationID'))->first();

        $data = [
            'label' => $request->input('label'),
            'destination_id' => $request->input('labelDestinationID'),
            'user_id' => $authUserID
        ];

        try {
            if($label===null){
                return LabelController::create($data);
            }
            else {
                return LabelController::update($data);
            }
        }
        catch (EntityNotFoundException $error)
        {
            return back($error);
        }
    }

    /**
     * @param $destinationID
     * @return \Illuminate\Http\JsonResponse
     * @internal param $username
     */
    public function edit($destinationID)
    {
        $label = Label::where('destination_id', $destinationID)->where('user_id', Auth::id())->first();

        if($label !== null)
        {
            return response()->json(['label'=>$label]);
        }
        else {
            return response()->json(['label'=>'']);
        }

    }

    /**
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($data)
    {
        $label = Label::where('user_id', $data['user_id'])->where('destination_id', $data['destination_id'])->first();
        $validatedUpdate = $this->validateRequest($data, $label);
        $validatedUpdate->save();
        return response()->json(['message'=>'updated']);
    }
    
    private function validateRequest($data, $label)
    {

       $validator = Validator::make($data, [
           $data['label'] => 'max:100'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        else {

            $label->label = $data['label'];
            $label->destination_id = $data['destination_id'];

            return $label;
        }
    }

    /**
     *
     */
    public function destroy()
    {
        
    }
    
}
