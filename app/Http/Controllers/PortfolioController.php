<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\PortfolioProfile;

class PortfolioController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /portfolio
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $profiles = PortfolioProfile::all();
		
		return view('/portfolio', compact('profiles'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /portfolio/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /portfolio
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

    /**
     * Display the specified resource.
     * GET /portfolio/{id}
     *
     * @param $portfolio
     * @return Response
     * @internal param int $id
     */
	public function show($portfolio)
	{
        $profiles = PortfolioProfile::all();
        
		return view('main.portfolio', compact('portfolio', 'profiles'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /portfolio/{id}/edit
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
	 * PUT /portfolio/{id}
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
	 * DELETE /portfolio/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}