<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
//use Request;
use Illuminate\Http\Request;
use App\Http\Requests\FormRequestRequest;

class RequestController extends Controller
{
    public function submit(FormRequestRequest $request)
    {
//        $validation = $request->validate([
//            'name'  => 'required',
//            'phone' => 'required|size:11'
//        ]);
//        dd($request->input('name'));

        //        return redirect(RouteServiceProvider::HOME);
    }
}
