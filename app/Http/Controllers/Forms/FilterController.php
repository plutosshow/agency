<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Request;

class FilterController extends Controller
{
    public function uniqueCities()
    {
        $cities = DB::table('flats')
            ->select('flats.city')
            ->distinct()
            ->orderBy('flats.city')
            ->get();

        return $cities ?? NULL;
    }
}
