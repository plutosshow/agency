<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Requests;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormRequestController extends Controller
{
    public function index()
    {
        return view('admin.forms.request');
    }

    public function allRequests()
    {
        return Requests::select('*')->where('executed', 0)->get();
    }

    public function destroyRequest($id)
    {
        DB::table('requests')->where('id', $id)->update(['executed' => 1]);
        return $this->allRequests();
    }

    public function getRequest($id)
    {
        return DB::table('requests')->where('id', $id)->get();
    }

    public function updateRequest(Request $request)
    {
        $date = Carbon::now();
        $id = $request->get('id');
        DB::table('requests')->where('id', $id)->update([
            'name'      => $request->get('name'),
            'phone'     => $request->get('phone'),
            'updated_at'=> $date
        ]);
    }
    public function createRequest(Request $request)
    {
        $date = Carbon::now();
        DB::table('requests')->insert([
            'name'      => $request->get('name'),
            'phone'     => $request->get('phone'),
            'updated_at'=> $date,
            'created_at'=> $date
        ]);
        return 200;
    }
}
