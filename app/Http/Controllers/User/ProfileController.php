<?php

namespace App\Http\Controllers\User;

use App\Town;
use App\User;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

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
        $profileData = request()->validate([
            "name" => ["required", "max:150"],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            "phone" => "required",
            "town_id" => "required",
            "bio" => "required",
            "image" => ''
        ]);

        if(request('image')){
            $imagePath = request('image')->store('profile', 'public');
            $image = Image::make(public_Path('storage/'.$imagePath))->fit(131, 132);
            $image->save();

            $imageArray =  [ 'image' => $imagePath ];
        }
        Auth::user()->profile->update(array_merge(
            $profileData,
            $imageArray ?? []
        ));

        $id = Auth::user()->id;
        DB::table('users')->where('id', $id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email
        ]);
        return redirect()->route('user.profile.show', Auth::user()->id)->with('success', 'Profile Updated Sucessfully');
    }

    
    public function destroy($id)
    {
        //
    }
}
