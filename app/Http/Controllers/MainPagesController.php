<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\PortfolioProfile;

class MainPagesController extends Controller {

    protected $profiles;

	/**
	 * Display a listing of the resource.
	 * GET /mainpages
	 *
	 * @return Response
	 */
	public function home()
	{
		//
		$profiles = PortfolioProfile::all();

		return view ('main.index', compact('profiles'));
	}

	public function faq()
	{
        $profiles = PortfolioProfile::all();
        
		return view('main.faq', compact('profiles'));
	}
	
	
	public function portfolio()
    {
        $profiles = PortfolioProfile::all();

        return view('main.portfolio/{portfolio}', compact('profiles'));
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