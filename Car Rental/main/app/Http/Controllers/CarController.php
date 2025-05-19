<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $manufacturers = DB::table('cars')->select('name')->distinct()->get();
        return view('car.index', [
            'manus' => $manufacturers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function display()
    {
        $value = request('search');
        $value2 = request('manu');
        $arrImages = array();
        $arrCenters = array();

        if(isset($value)){
            $values = explode(' ', $value);

            $cars = Car::all();
            $searchCars = array();

            foreach($cars as $car){
                    $counter = 0;
                    $allData = $car->name . '' . $car->type . '' . $car->color . '' . $car->year;
                    foreach($values as $val){
                        if(str_contains(strtolower($allData), strtolower($val))){
                            $counter++;
                        }
                    }
                    if($counter == count($values)){
                        array_push($searchCars, $car);
                        $center = DB::table('centers')->select('city')->where('id', $car->centerID)->first();
                        array_push($arrCenters, $center);
                        $images = DB::table('images')->where('carID', $car->id)->get();
                        array_push($arrImages, $images);
                    }
            }
            return view('car.display', [
                'cars' => $searchCars,
                'arrImages' => $arrImages,
                'centers' => $arrCenters
            ]);
        }
        else{
            $cars = DB::table('cars')->where('name', $value2)->get();

            foreach($cars as $car){
                $center = DB::table('centers')->select('city')->where('id', $car->centerID)->first();
                array_push($arrCenters, $center);

                $images = DB::table('images')->where('carID', $car->id)->get();
                array_push($arrImages, $images);
            }
            return view('car.display', [
                'cars' => $cars,
                'arrImages' => $arrImages,
                'centers' => $arrCenters
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

}
