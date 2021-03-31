<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    public function index(){
        return view('admin.tables.roles');
    }

    public function getAllRoles(){
        return DB::table('roles')->select('id', 'name', 'guard_name', 'roles.created_at', 'roles.updated_at')->get();
    }

    public function destroyRole($id)
    {
        DB::table('roles')->delete($id);
        DB::table('model_has_roles')->where("model_has_roles.role_id", $id)->delete();
        return $this->getAllRoles();
    }

    public function createRole(Request $request){
        $date = Carbon::now();

        DB::table('roles')->insert([
            'name'      => $request->get('role'),
            'guard_name'=> $request->get('guard_name'),
            'updated_at'=> $date,
            'created_at'=> $date
        ]);
    }

    public function getRole($id){
        return DB::table('roles')->select('*')->where('id', '=', $id)->get();
    }

    public function updateRole(Request $request){
        $date = Carbon::now();

        DB::table('roles')->where('id', $request->get('id'))->update([
            'name'          =>  $request->get('name'),
            'guard_name'    =>  $request->get('guard_name'),
            'updated_at'    =>  $date,
        ]);
    }
}
