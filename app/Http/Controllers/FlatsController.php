<?php

namespace App\Http\Controllers;

use App\Models\Flats;
use App\Models\imgFlats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Providers\Collection;

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
    public function createFlat()
    {
        return view('createFlat');
    }

    public function admin(){
        return view('admin.tables.flats');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFlats(Request $request)
    {
//        Flats::create([
//            'rooms'         => $request->get('rooms'),
//            'livedSquare'   => $request->get('livedSquare'),
//            'commonSquare'  => $request->get('commonSquare'),
//            'year'          => $request->get('year'),
//            'type'          => $request->get('type'),
//            'comments'      => $request->get('comments'),
//            'region'        => $request->get('region'),
//            'district'      => $request->get('district'),
//            'city'          => $request->get('city'),
//            'street'        => $request->get('street'),
//            'building'      => $request->get('building'),
//            'zip'           => $request->get('zip')
//        ]);
//
//        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showFlat($id)
    {
        $flat = Flats::find($id);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editFlat($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateFlat(Request $request, $id)
    {
        //
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
}
