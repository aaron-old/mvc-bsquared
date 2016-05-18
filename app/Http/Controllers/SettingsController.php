<?php namespace Bsquared\Http\Controllers;

use Bsquared\Http\Requests\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Bsquared\User;
use Bsquared\Profile;

class SettingsController extends Controller
{

    public function show($username)
    {
        $user = User::where('username', $username)->first();
        return view('members.AccountSettings', compact('user', 'username'));
    }

}