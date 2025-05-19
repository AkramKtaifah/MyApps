<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Center;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;
use DateTime;

class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function init(Request $request)
    {
        $carID =  $request->input('carID');
        $centerID = $request->input('centerID');
        $arrReservations = DB::table('reservations')->where('carID', $carID)->orderBy('startDate', 'asc')->get();
        $car = Car::findOrFail($carID);
        $center = Center::findOrFail($centerID);
        return view('reserve.index', [
            'car' => $car,
            'center' => $center,
            'arrReservations' => $arrReservations,
            'error' => null
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carID = $request->input('carID');
        $centerID = $request->input('centerID');
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        $arrReservations = DB::table('reservations')->where('carID', $carID)->orderBy('startDate', 'asc')->get();

        $counter = 0;
        if(count($arrReservations) > 0){

            for($i = 0; $i < count($arrReservations); $i++){
                if(($i+1) < (count($arrReservations))){
                    $datetime1 = new DateTime($arrReservations[$i]->endDate);
                    $datetime2 = new DateTime($arrReservations[$i+1]->startDate);
                    $interval = $datetime2->diff($datetime1);
                    $days = $interval->format('%a');

                    if($days == 0){
                        continue;
                    }
                    else{
                        if(($startDate >= $arrReservations[$i]->endDate) && ($endDate <= $arrReservations[$i+1]->startDate)){
                            $counter++;
                        }
                        else{
                            break;
                        }
                    }
                }
                else{
                    if($startDate >= $arrReservations[$i]->endDate){
                        $counter++;
                    }
                    else{
                        break;
                    }
                }
            }

            if($counter == 0){

                $car = Car::findOrFail($carID);
                $center = Center::findOrFail($centerID);
                return view('reserve.index', [
                    'car' => $car,
                    'center' => $center,
                    'arrReservations' => $arrReservations,
                    'error' => 'error'
                ]);
            }
        }

            $reserve = new Reservation();

            $reserve->carID = $carID;
            $reserve->centerID = $centerID;
            $reserve->startDate = $startDate;
            $reserve->endDate = $endDate;

            $reserve->save();

            return redirect()->route('reserve.show', ['id' => $reserve->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id = request('id');
        $reserve = Reservation::findOrFail($id);
        $datetime1 = new DateTime($reserve->startDate);
        $datetime2 = new DateTime($reserve->endDate);
        $interval = $datetime2->diff($datetime1);
        $days = $interval->format('%a');

        $car = DB::table('cars')->where('id', $reserve->carID)->first();
        $center = DB::table('centers')->where('id', $reserve->centerID)->first();

        return view('reserve.show', [
            'reserve' => $reserve,
            'car' => $car,
            'center' => $center,
            'days' => $days
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
