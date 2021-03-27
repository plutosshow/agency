<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MoveMoveIo\DaData\Enums\Language;
use MoveMoveIo\DaData\Facades\DaDataAddress;

class DataController extends Controller
{
    public function prompt(Request $request)
    {
        if($request->get('location')!=''){
            $dadata = DaDataAddress::prompt($request->get('location'), 2, Language::RU);
            return $dadata;
        }

    }
}
