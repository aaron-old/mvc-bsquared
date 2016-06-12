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
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @internal param $type
     */
    public function create($data)
    {
        $path = new Path();
        $path->user_id = $data['user_id'];
        $validatedCreate = $this->validateRequest($data, $path);
        $validatedCreate->save();
        
        return response()->json(['message'=>$data['destination_id']]);
    }

    /**
     * @param $path
     * @param $data
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    private function preparePath($path, $data)
    {
        try {
            if($path === null){
                return PathController::create($data);
            }
            else {
                return PathController::update($data, $path);
            }
        }
        catch (EntityNotFoundException $error){
            return back(['status'=>302]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Symfony\Component\HttpFoundation\File\Exception\FileException
     */
    public function store(Request $request)
    {
        if($request->hasFile('member_photo_user_'.Auth::id())){
            $this->profilePhoto($request);
        }

        if($request->hasFile('member_about_image_'.$request->photoValue.'_user_'.Auth::id())){
            $this->aboutPhoto($request);
        }

        if($request->hasFile('member_background_image_user'.Auth::id())){
            $this->backgroundPhoto($request);
        }

        if($request->hasFile('member_skill_image_'.$request->photoValue.'_user_'.Auth::id())){
            $this->skillPhoto($request);
        }

        if($request->hasFile('works_thumbnail_image_'.$request->photoValue.'_user_'.Auth::id())){
            $this->worksThumbnailPhoto($request);
        }
        
        if($request->hasFile('works_preview_image_'.$request->photoValue.'_user_'.Auth::id())){
            $this->worksPreviewPhoto($request);
        }

        if($request->hasFile('resume_user_'.Auth::id())){
            $this->resume($request);
        }


    }

    /**
     * @param Request $request
     * @throws \Symfony\Component\HttpFoundation\File\Exception\FileException
     */
    private function profilePhoto(Request $request)
    {
        $file = $request->file('member_photo_user_'.Auth::id());
        $destinationPath = '../public/images/member_uploads/';
        $filename = $file->getClientOriginalName();
        $file->move($destinationPath, $filename);
        $path = Path::where('user_id', Auth::id())->where('destination_id', $request->input('destinationID'))->first();

        $data = [
            'destination_id' => $request->destinationID,
            'user_id' => Auth::id(),
            'path' => $filename
        ];
        $this->preparePath($path, $data);
    }

    private function aboutPhoto(Request $request)
    {
        $file = $request->file('member_about_image_'.$request->photoValue.'_user_'.Auth::id());
        $destinationPath = '../public/images/member_uploads/about';
        $filename = $file->getClientOriginalName();
        $file->move($destinationPath, $filename);
        $path = Path::where('user_id', Auth::id())->where('destination_id', $request->input('destinationID'))->first();

        $data = [
            'destination_id' => $request->destinationID,
            'user_id' => Auth::id(),
            'path' => $filename
        ];

        $this->preparePath($path, $data);
    }
    
    private function backgroundPhoto(Request $request)
    {
        $file = $request->file('member_background_image_user'.Auth::id());
        $destinationPath = '../public/images/member_uploads/member_backgrounds';
        $filename = $file->getClientOriginalName();
        $file->move($destinationPath, $filename);
        $path = Path::where('user_id', Auth::id())->where('destination_id', $request->input('destinationID'))->first();

        $data = [
            'destination_id' => $request->destinationID,
            'user_id' => Auth::id(),
            'path' => $filename
        ];

        return $this->preparePath($path, $data);
    }
    
    private function skillPhoto(Request $request)
    {
        $file = $request->file('member_skill_image_'.$request->photoValue.'_user_'.Auth::id());
        $destinationPath = '../public/images/member_uploads/skills';
        $filename = $file->getClientOriginalName();
        $file->move($destinationPath, $filename);
        $path = Path::where('user_id', Auth::id())->where('destination_id', $request->input('destinationID'))->first();

        $data = [
            'destination_id' => $request->destinationID,
            'user_id' => Auth::id(),
            'path' => $filename
        ];

        return $this->preparePath($path, $data);
    }
    
    private function worksThumbnailPhoto(Request $request)
    {
        $file = $request->file('works_thumbnail_image_'.$request->photoValue.'_user_'.Auth::id());
        $destinationPath = '../public/images/member_uploads/works';
        $filename = $file->getClientOriginalName();
        $file->move($destinationPath, $filename);
        $path = Path::where('user_id', Auth::id())->where('destination_id', $request->input('destinationID'))->first();

        $data = [
            'destination_id' => $request->destinationID,
            'user_id' => Auth::id(),
            'path' => $filename
        ];

        return $this->preparePath($path, $data);
    }
    
    private function worksPreviewPhoto(Request $request)
    {
        $file = $request->file('works_preview_image_'.$request->photoValue.'_user_'.Auth::id());
        $destinationPath = '../public/images/member_uploads/project_uploads';
        $filename = $file->getClientOriginalName();
        $file->move($destinationPath, $filename);
        $path = Path::where('user_id', Auth::id())->where('destination_id', $request->input('destinationID'))->first();
        
        $data = [
            'destination_id' => $request->destinationID,
            'user_id' => Auth::id(),
            'path' => $filename
        ];
        
        return $this->preparePath($path, $data);
        
    }
    
    private function resume(Request $request)
    {
        $file = $request->file('resume_user_'.Auth::id());
        $destinationPath = '../public/resume/';

        $filename = $file->getClientOriginalName();

        $file->move($destinationPath, $filename);

        $path = Path::where('user_id', Auth::id())
            ->where('destination_id', $request->input('destinationID'))->first();

        $data = [
            'destination_id' => $request->destinationID,
            'user_id' => Auth::id(),
            'path' => $filename
        ];

        return $this->preparePath($path, $data);
    }

    /**
     * @param $destinationID
     */
    public function edit($destinationID)
    {

    }

    /**
     * @param $data
     * @param $path
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @internal param $file
     * @internal param $type
     */
    public function update($data, $path)
    {
        $validatedUpdate = $this->validateRequest($data, $path);
        $validatedUpdate->save();

        return response()->json(['message'=>$data['destination_id']]);
    }

    /**
     * @param $data
     * @param $path
     * @return $this
     * @internal param $type
     */
    private function validateRequest($data, $path)
    {
        $path->path = $data['path'];
        $path->destination_id = $data['destination_id'];

        return $path;
    }
    
    /**
     * @param Request $request
     */
    public function destroy(Request $request)
    {

    }

}
