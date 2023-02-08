<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Permission;
use App\Models\Role;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Los usuarios que tengan el rol 1 y 2
        $users_rol_1_and_2 = User::with('role')->where('role_id', 1)->orWhere('role_id', 2)->get();
        
        // Los permisos que se tienen del rol 1
        $role_1 = Role::where('name', 'client')->with('permission')->first();

        // Los usuarios y el rol que tienen el permiso 2
        $permission_2 = Permission::where('permission','add_users')->with('role')->first();
        $id_roles = [];
        foreach($permission_2->role as $role){
            array_push($id_roles, $role->id);
        }
        $users = User::whereIn('role_id', $id_roles)->with('role')->get();
       
        return view('home')->with('users_rol_1_and_2', $users_rol_1_and_2)->with('role_1', $role_1)->with('permissions', $permission_2)->with('users', $users);

    }
}
