<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FlatsController;
use App\Models\imgFlats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    public function index(){
        return view('admin.gallery.gallery-flats');
    }

    public function getAllImages(){
        return imgFlats::all();
    }

    public function changeStatus($id, $status){
        dump($status);
        dump($id);
        DB::table('img_flats')->where('id', $id)->update([
            'show_on_main'  => $status
        ]);
    }

}
