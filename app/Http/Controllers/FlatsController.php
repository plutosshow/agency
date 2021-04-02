<?php

namespace App\Http\Controllers;

use App\Models\Flats;
use App\Models\imgFlats;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Providers\Collection;
use Illuminate\Support\Facades\Storage;

class FlatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view('home', $this->sliderFlats());
    }

    public function showAllFlats(){
        $flats = DB::table('flats')
            ->join('img_flats', 'img_flats.flat', '=', 'flats.id')
            ->groupBy('img_flats.flat', 'flats.id')
            ->distinct()
            ->select('flats.*', 'img_flats.image')
            ->where('relevant', '1')
            ->get();
        return  [
            'allFlats' => $flats,
        ];
    }

    public function showFlats(){
        $flats = DB::table('flats')
            ->select('*')
            ->where('relevant', '1')
            ->get();
        return  [
            'allFlats' => $flats,
        ];
    }

    public function sliderFlats()
    {
        $slides = DB::table('flats')
            ->join('img_flats', 'img_flats.flat', '=', 'flats.id')
            ->select('flats.*', 'img_flats.image')
            ->where('img_flats.show_on_main', '=', 1)
            ->get()->take('6');
        return [
            'slides' => $slides
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createFlat(Request $request)
    {
        $now = Carbon::now();

        $id_flat = Flats::insertGetId([
            'rooms'         => $request->get('rooms'),
            'floor'         => $request->get('floor'),
            'price'         => $request->get('price'),
            'livedSquare'   => $request->get('livedSquare'),
            'commonSquare'  => $request->get('commonSquare'),
            'year'          => $request->get('year'),
            'type'          => $request->get('type'),
            'comments'      => $request->get('comments'),
            'region'        => $request->get('region'),
            'district'      => $request->get('district'),
            'city'          => $request->get('city'),
            'street'        => $request->get('street'),
            'building'      => $request->get('building'),
            'zip'           => $request->get('zip'),
            'created_at'    => $now,
            'updated_at'    => $now
        ]);

        $files = $request->file('files');
        $paths = $this->uploadImages($files);

        foreach ($paths as $path){
            DB::table('img_flats')->insert([
                'flat'          => $id_flat,
                'image'         => $path,
                'created_at'    => $now,
                'updated_at'    => $now
            ]);
        }

        return $this->showAllFlats();
    }

    public function admin(){
        return view('admin.tables.flats');
    }

    public function getFlat($id){
        return Flats::find($id);
    }

    public function getFlatImages($id){
        return DB::table('img_flats')->select('id as image_id', 'image','show_on_main')->where('flat', $id)->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showFlat($id)
    {
        $flat = $this->getFlat($id);
        $images = DB::table('img_flats')
            ->where('img_flats.flat', '=', $id)
            ->get();
        $price = number_format($flat['price'], 0, '', ' ');
        $priceSquare = round(($flat['price']/$flat['commonSquare']), 2);
        return view('property')->with([
            'flat'          => $flat,
            'price'         => $price,
            'priceSquare'   => $priceSquare,
            'images'        => $images,
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateFlat(Request $request)
    {
        DB::table('flats')->where('id', $request->get('id'))->update([
            'rooms'         => $request->get('rooms'),
            'floor'         => $request->get('floor'),
            'price'         => $request->get('price'),
            'livedSquare'   => $request->get('livedSquare'),
            'commonSquare'  => $request->get('commonSquare'),
            'year'          => $request->get('year'),
            'type'          => $request->get('type'),
            'comments'      => $request->get('comments'),
            'region'        => $request->get('region'),
            'district'      => $request->get('district'),
            'city'          => $request->get('city'),
            'street'        => $request->get('street'),
            'building'      => $request->get('building'),
            'zip'           => $request->get('zip')
        ]);

        $files = $request->file('files');
        $now = Carbon::now();
        dump($files);
        if($files){
            $paths = $this->uploadImages($files);
            foreach ($paths as $path){
                dump($path);
                DB::table('img_flats')->insert([
                    'flat'          => $request->get('id'),
                    'image'         => $path,
                    'created_at'    => $now,
                    'updated_at'    => $now
                ]);
            }
        }
    }

    public function destroyImage($id, $filename){
        Storage::disk('uploads')->delete($filename);
        DB::table('img_flats')->delete($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyFlat($id)
    {
        DB::table('flats')->where('id', $id)->update([
            'relevant'  => '0'
        ]);
        return $this->showAllFlats();
    }

    public function uploadImages($files){
        $paths = [];
        if($files){
            foreach ($files as $file){
                $paths[] = $file->store('', 'uploads');
            }
        }
        return $paths;
    }
}
