<?php namespace App\Http\Controllers;


use App\FilePathLookup;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FilePathLookupController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /file_path
	 *
	 * @return Response
	 */
	public function index()
	{
		// Select all the file paths.
        $filePaths = FilePathLookup::all();

        return view('filepaths.index', compact('filePaths'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /file_path/create
	 *
	 * @return Response
	 */
	public function create()
	{
        
	}

    /**
     * Store a newly created resource in storage.
     * POST /file_path
     *
     * @param Request $request
     * @return Response
     */
	public function store(Request $request)
	{

	}

    /**
     * Display the specified resource.
     * GET /file_path/{id}
     *
     * @param $destination_id
     * @return Response
     * @internal param int $id
     */
	public function show(FilePathLookup $destination_id)
	{
        return view('filepaths.show', compact('destination_id'));
	}

    /**
     * Show the form for editing the specified resource.
     * GET /file_path/{id}/edit
     *
     * @param $destination_id
     * @return Response
     * @internal param int $id
     */
	public function edit($destination_id)
	{
		//
	}

    /**
     * Update the specified resource in storage.
     * PUT /file_path/{id}
     *
     * @param $destination_id
     * @return Response
     * @internal param int $id
     */
	public function update($destination_id)
	{
		//
	}

    /**
     * Remove the specified resource from storage.
     * DELETE /file_path/{id}
     *
     * @param $destination_id
     * @return Response
     * @internal param int $id
     */
	public function destroy($destination_id)
	{
		//
	}

}