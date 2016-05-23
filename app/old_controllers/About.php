<?php

/**
 * Created by PhpStorm.
 * User: Aaron Young
 * Date: 5/22/2016
 * Time: 5:48 PM
 */
class About
{
    /**
     * Display a listing of the resource.
     * GET /about
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * GET /about/create
     *
     * @param Request $request
     * @param $authUserID
     * @return Response
     */
    public function create(Request $request, $authUserID)
    {
        $about = About::findOrFail($authUserID);

        if(count($about) > 0){
            $overview = $this->validateRequest($request, $about);
            $overview->save();
            return back();
        }
        else {
            $about = new About;
            $about->user_id = $authUserID;
            $create = $this->validateRequest($request, $about);
            $create->save();
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     * POST /about
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $authUserID = Auth::id();
        $portionSelected = $request->destination_id;
        $this->createUpdate($request, $portionSelected, $authUserID);

        if($request->has('overview'))
        {
            $aboutOverview = DB::table('portfolio_about')
                ->where('user_id', $authUserID)
                ->whereNotNull('overview');

            try{
                if(count($aboutOverview) === 0){
                    return AboutController::create($request, $authUserID);
                }
                else {
                    return AboutController::update($request, $authUserID);
                }
            }
            catch(EntityNotFoundException $error)
            {
                return back($error);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     * GET /about/{id}/edit
     *
     * @param $username
     * @return Response
     * @internal param int $id
     */
    public function edit($username)
    {
        $user = User::where('username', $username)->first();
        return view('members.about', compact('username','user'));
    }

    /**
     * Update the specified resource in storage.
     * PUT /about/{id}
     *
     * @param $request
     * @param $authUserID
     * @return Response
     * @internal param int $id
     */
    public function update($request, $authUserID)
    {
        $about = About::findOrFail($authUserID);
        $update = $this->validateRequest($request, $about);
        $update->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /about/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    private function createUpdate($request, $portionSelected, $userID)
    {
        if($request->has('label')){
            LabelController::setLabel($request, $portionSelected, $userID);
        }
        if($request->has('column_text')){
            ColumnController::setColumn($request, $portionSelected, $userID);
        }
        if($request->has('path')){
            PathController::setPath($request, $portionSelected, $userID);
        }
    }

    private function validateRequest(Request $request, $overview)
    {
        $overview->overview = $request->overview;
        return $overview;
    }


}