<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TableUserController extends Controller
{
    public function index()
    {
        return view('admin.tables.users');
    }

    public function allUsers()
    {
        return DB::table('users')->select('users.id', 'users.surname', 'users.name', 'users.patronymic', 'users.email',
            'roles.name as role_name')
            ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'roles.id', '=',  'model_has_roles.role_id')->get();
    }

    public function destroyUser($id)
    {
        DB::table('users')->delete($id);
        DB::table('model_has_roles')->where("model_has_roles.model_id", $id)->delete();
        return $this->allUsers();
    }

    public function getUser($id)
    {
        return DB::table('users')->select('users.id', 'users.surname', 'users.name', 'users.patronymic', 'users.email',
            'users.created_at', 'users.updated_at', 'roles.name as role_name', 'roles.id as role_id')->where('users.id', $id)->
            join('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')->
            join('roles', 'roles.id', '=',  'model_has_roles.role_id')->get();
    }

    public function updateUser(Request $request)
    {
        $date = Carbon::now();
        $id = $request->get('id');
        DB::table('users')->where('id', $id)->update([
            'name'      => $request->get('name'),
            'surname'   => $request->get('surname'),
            'patronymic'=> $request->get('patronymic'),
            'email'     => $request->get('email'),
            'updated_at'=> $date
        ]);
        DB::table('model_has_roles')->where('model_has_roles.model_id', '=', $id)->update([
            'role_id'   => $request->get('role_id')
        ]);
    }

    public function createUser(Request $request)
    {
        $date = Carbon::now();
        $user = User::create([
            'name'      => $request->get('name'),
            'surname'   => $request->get('surname'),
            'patronymic'=> $request->get('patronymic'),
            'email'     => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'updated_at'=> $date,
            'created_at'=> $date
        ]);
        $name = $request->get('role_name');
        $user->assignRole($name);
        return $user;
    }

    public function usersWithRole($role)
    {
        return DB::table('users')->select('users.id', 'users.surname', 'users.name', 'users.patronymic', 'users.email',
            'roles.name as role_name')
            ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'roles.id', '=',  'model_has_roles.role_id')
            ->where('roles.name', $role)->get();
    }
}
