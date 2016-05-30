<?php

namespace Bsquared\Http\Controllers;


use Bsquared\Label;
use Illuminate\Contracts\Queue\EntityNotFoundException;
use Illuminate\Http\Request;

use Bsquared\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

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
        
        return back();
    }

    
    public function store(Request $request)
    {
        $authUserID = Auth::id();
        $destination_id = $request->input('destinationID');
        
        $label = Label::where('user_id', $authUserID)->where('destination_id', $destination_id);

        $data = [
            'label' => $request->input('label'),
            'destination_id' => $destination_id,
            'user_id' => $authUserID
        ];

        try {
            if(!object_get($label, 'user_id')){
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
     * @param $username
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($username)
    {
        $label = Label::where('username', $username)->all();
        return response()->json(['message'=>$label]);
    }

    /**
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($data)
    {
        $label = Label::findOrFail($data['user_id']);
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
