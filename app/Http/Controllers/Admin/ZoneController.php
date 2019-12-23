<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ZoneController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Gate::denies('dashboardPermission')){
            return redirect()->back()->with('warning', 'You not allowed to perform this action');
        }
        $zoneManager = Auth::user()->id;
        $users = User::where('sponsor_user_id', $zoneManager)->get();
        return view('admin.zone.index', compact('users'));
    }

    public function zonerManagers()
    {
        if(Gate::denies('dashboardPermission')){
            return redirect()->back()->with('warning', 'You not allowed to perform this action');
        }
        $zones = Role::where('name', 'zone_cordinator')->first()->users()->get();
        return view('admin.zone.managers', compact('zones'));
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
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
