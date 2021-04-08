<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\PageDefaultBlocks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EmployeesController extends Controller
{
    public function getEmployees()
    {
        return DB::table('users')->select('users.id', 'users.name', 'users.surname', 'users.patronymic')
            ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'roles.id', '=',  'model_has_roles.role_id')
            ->where('roles.name', '=', 'admin')
            ->orWhere('roles.name', '=', 'agent')->get('');
    }

    public function createEmployee(Request $request) : void
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $this->uploadImage($file);
        }
        Employee::create([
            'user_id'   => $request->get('user_id'),
            'post'      => $request->get('post'),
            'desc'      => $request->get('desc'),
            'image'     => $path ?? ''
        ]);
    }

    public function destroyImage($filename) : void
    {
        Storage::disk('employees')->delete($filename);
    }

    public function uploadImage($file)
    {
        if ($file) {
            return $file->store('', 'employees');
        } else {
            return 500;
        }
    }

    public function showEmployees(){
        return Employee::select('*')->where('deleted', '=', 0)->get();
    }

    public function destroyEmployee($id){
        DB::table('employees')->where('id', '=', $id)->update([
            'deleted' => '1'
        ]);
    }

    public function updateEmployee(Request $request){
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $this->uploadImage($file);
            $this->destroyImage($request->get('image'));
            DB::table('employees')->where('id', $request->get('id'))->update([
                'image'     => $path
            ]);
        }
        DB::table('employees')->where('id', $request->get('id'))->update([
                'post'      => $request->get('post'),
                'desc'      => $request->get('desc'),
                'user_id'   => $request->get('user_id'),
            ]);
    }

}
