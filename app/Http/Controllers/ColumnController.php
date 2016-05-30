<?php

namespace Bsquared\Http\Controllers;

use Bsquared\Column;
use Illuminate\Contracts\Queue\EntityNotFoundException;
use Illuminate\Http\Request;

use Bsquared\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ColumnController extends Controller
{
    /**
     * @param $data
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create($data)
    {
        $column = new Column();
        $column->user_id = $data['user_id'];

        $validatedCreate = $this->validateRequest($data, $column);
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
        $column = Column::where('user_id', $authUserID)->where('destination_id', $request->input('columnDestinationID'))->first();

        $data = [
            'column' => $request->input('column'),
            'destination_id' => $request->input('columnDestinationID'),
            'user_id' => $authUserID
        ];

        try {
            if($column === null){
                return ColumnController::create($data);
            }
            else {
                return ColumnController::update($data);
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
       $column = Column::where('destination_id', $destinationID)->where('user_id', Auth::id())->first();
        
        if($column !== null){
            return response()->json(['column'=>$column]);
        }
        else {
            return response()->json(['column'=>'']);
        }
    }

    /**
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($data)
    {
        $column = Column::where('user_id', $data['user_id'])->where('destination_id', $data['destination_id'])->first();
        $validatedUpdate = $this->validateRequest($data, $column);
        $validatedUpdate->save();
        return response()->json(['message'=>'updated']);
    }

    private function validateRequest($data, $column)
    {
        $validator = Validator::make($data, [
            $data['column'] => 'max:100'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        else {
            $column->column_text = $data['column'];
            $column->destination_id = $data['destination_id'];

            return $column;
        }
    }

    /**
     *
     */
    public function destroy()
    {

    }
}
