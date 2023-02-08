<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        //
    }

    public function uno()
    {
        $data = User::with('role')->where('role_id', 1)->orWhere('role_id', 2)->get();

        return response()->json([
            'data'  => $data,
            'status' => 500
        ]);
    }

    public function dos()
    {
        // $data = Role::with('permission')->get();
        // return $data;
        // $data = User::with('role')->where('role_id', 1)->orWhere('role_id', 2)->get();
        $data = Role::with('permission')->where('name', 'admin')->get();

        return response()->json([
            'data'  => $data,
            'status' => 500
        ]);
    }

    public function tres()
    {
        // $data = Role::with('permission')->get();
        // return $data;
        // $data = User::with('role')->where('role_id', 1)->orWhere('role_id', 2)->get();
        $data = Role::with('permission')->where('name', 'admin')->get();

        return response()->json([
            'data'  => $data,
            'status' => 500
        ]);
    }

    public function store(Request $request)
    {
        //
    }
    public function show($id)
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
