<?php

namespace App\Http\Controllers\User;

use App\Town;
use App\User;
use App\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $profile = Profile::find($id);
        return view('admin.users.profile', compact('profile'));
    }

    
    public function edit($id)
    {
        $profile = Profile::find($id);
        $lga_id = $profile->user->localGovern->id;
        $town = Town::where('local_government_id', $lga_id)->get();
        return view('admin.profile.edit', compact('profile', 'town'));
    }

    
    public function update(Request $request, $id)
    {
        dd($request->all());
    }

    
    public function destroy($id)
    {
        //
    }
}
