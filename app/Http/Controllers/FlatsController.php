<?php

namespace App\Http\Controllers;

use App\Models\Flats;
use Illuminate\Http\Request;

class FlatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flats = Flats::select('*')->paginate(12);
        return view('home', ['allFlats' => $flats]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFlats(Request $request)
    {
        Flats::create([
            'rooms'         => $request->get('rooms'),
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

        return redirect('/');
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
//        $flat = Flats::select('id', 'floor', 'type', 'city', 'price')->where('id', $id)->first();
        $price = number_format($flat['price'], 0, '', ' ');
        $priceSquare = round(($flat['price']/$flat['commonSquare']), 2);
        return view('property')->with([
            'flat'  => $flat,
            'price' => $price,
            'priceSquare'  => $priceSquare
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
        //
    }
}
