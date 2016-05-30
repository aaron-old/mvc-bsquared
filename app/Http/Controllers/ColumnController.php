<?php

namespace Bsquared\Http\Controllers;

use Bsquared\Column;
use Illuminate\Contracts\Queue\EntityNotFoundException;
use Illuminate\Http\Request;

use Bsquared\Http\Requests;
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

        return back();
    }


    public function store(Request $request)
    {
        $authUserID = Auth::id();
        $destination_id = $request->input('destinationID');

        $column = Column::where('user_id', $authUserID)->where('destination_id', $destination_id);

        $data = [
            'column' => $request->input('column'),
            'destination_id' => $destination_id,
            'user_id' => $authUserID
        ];

        try {
            if(!object_get($column, 'user_id')){
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
     * @param $username
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($username)
    {
        $column = Column::where('username', $username)->all();
        return response()->json(['message'=>$column]);
    }

    /**
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($data)
    {
        $column = Column::findOrFail($data['user_id']);
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
