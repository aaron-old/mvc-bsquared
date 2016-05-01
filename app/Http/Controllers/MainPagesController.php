<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\PortfolioProfile;
use App\Models\PortfolioPath;

class MainPagesController extends Controller {
	
	

	/**
	 * Display a listing of the resource.
	 * GET /mainpages
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		return view ('main.index');
	}

	public function faq()
	{
		return view('main.faq');
	}
	
	
	public function portfolio(){
		
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /mainpages/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /mainpages
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /mainpages/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /mainpages/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /mainpages/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /mainpages/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}