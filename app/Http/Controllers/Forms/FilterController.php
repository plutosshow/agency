<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Request;

class FilterController extends Controller
{
    public function test()
    {
        $flats = DB::table('flats')
            ->join('img_flats', 'img_flats.flat', '=', 'flats.id')
            ->groupBy('img_flats.flat', 'flats.id')
            ->distinct()
            ->select('flats.*', 'img_flats.image')
            ->get();

        return $flats;
    }
}
