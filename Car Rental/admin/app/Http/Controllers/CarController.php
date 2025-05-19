<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Car;
use App\Models\Center;
use App\Models\Image;
use Illuminate\Support\Facades\File;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $allCars = Car::all();
        $centers = Center::all();
        $carsCount = array();

        foreach ($centers as $center){
            $num = DB::table('cars')->where('centerID', $center->id)->count();
            array_push($carsCount, $num);
        }
        return view('car.index', [
            'centers' => $centers, 'allCars' => $allCars, 'carsCount' => $carsCount
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centers = Center::all();
        return view('car.create', [
            'centers' => $centers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $car = new Car();

        $car->boardNum = $request->input('boardNum');
        $car->name = $request->input('name');
        $car->type = $request->input('type');
        $car->color = $request->input('color');
        $car->year = $request->input('year');
        $car->rentPrice = $request->input('rentPrice');
        $car->available = 1;
        $city = $request->input('centerName');
        $center = DB::table('centers')->select('id')->where('city', $city)->first();
        $car->centerID = $center->id;

        $car->save();
        $carID = $car->id;

        $allImages = Image::all();
        if(count($allImages) > 0){
            $temp = $allImages[count($allImages) - 1]->id + 1;
        }
        else{
            $temp = 1;
        }
        $images = $request->file('img');
        foreach($images as $image){
            $img = new Image();
            $img->path = $temp . '-' . $image->getClientOriginalName();
            $img->carID = $carID;

            $img->save();

            $image->move(base_path('public/img'), $temp . '-' . $image->getClientOriginalName());
        }

        return redirect()->route('car.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cars = DB::table('cars')->where('centerID', $id)->get();
        $arrImages = array();

        foreach($cars as $car){
            $images = DB::table('images')->where('carID', $car->id)->get();
            array_push($arrImages, $images);
        }
        return view('car.show', [
            'cars' => $cars, 'arrImages' => $arrImages
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        $centers = Center::all();
        $images = DB::table('images')->where('carID', $car->id)->get();

        return view('car.edit', [
            'car' => $car, 'centers' => $centers, 'images' => $images
        ]);
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
        $car = Car::findOrFail($id);

        $car->boardNum = $request->input('boardNum');
        $car->name = $request->input('name');
        $car->type = $request->input('type');
        $car->color = $request->input('color');
        $car->year = $request->input('year');
        $car->rentPrice = $request->input('rentPrice');
        $city = $request->input('centerName');
        $center = DB::table('centers')->select('id')->where('city', $city)->first();
        $car->centerID = $center->id;

        $checked_images = $request->input('checked');
                if(isset($checked_images)){
                foreach($checked_images as $img_id){
                    $img = DB::table('images')->where('id', $img_id)->first();
                    $path = base_path('public/img/') . $img->path;
                    File::delete($path);
                    DB::table('images')->where('id', $img_id)->delete();
                }
                }
        $images = $request->file('img');
                if(isset($images)){
                    $allImages = Image::all();
                    if(count($allImages) > 0){
                        $temp = $allImages[count($allImages) - 1]->id + 1;
                    }
                    else{
                        $temp = 1;
                    }
                foreach($images as $image){
                    $img = new Image();
                    $img->path = $temp . '-' . $image->getClientOriginalName();
                    $img->carID = $car->id;

                    $img->save();

                    $image->move(base_path('public/img'), $temp . '-' . $image->getClientOriginalName());
                }
                }

        $car->save();

        return redirect()->route('car.show', $car->centerID);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $images = DB::table('images')->where('carID', $car->id)->get();
        foreach($images as $image){
                $path = base_path('public/img/') . $image->path;
                File::delete($path);
        }
        DB::table('images')->where('carID', $car->id)->delete();
        $car->delete();
        return redirect()->route('car.show', $car->centerID);
    }

}
