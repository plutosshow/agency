<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormRequestController extends Controller
{
    public function index(){
        return view('admin.forms.request');
    }

    public function  allRequests(){
        return Requests::select('*')->where('executed', 0)->get();
    }
    public function destroyRequest($id)
    {
        DB::table('requests')->where('id', $id)->update(['executed' => 1]);
        return $this->allRequests();
    }
}
