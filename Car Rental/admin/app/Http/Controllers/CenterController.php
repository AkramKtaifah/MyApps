<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Center;

class CenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centers = Center::all();
        return view('center.index', [
            'centers' => $centers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('center.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $center = new Center();

        $center->city = $request->input('city');
        $center->region = $request->input('region');
        $center->street = $request->input('street');
        $center->mobileNum = $request->input('mobileNum');
        $center->telephone = $request->input('tel');

        $center->save();

        return redirect()->route('center.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $center = null;
        $center = Center::findOrFail($id);
        return view('center.edit', [
            'center' => $center
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
        $center = Center::findOrFail($id);

        $center->city = $request->input('city');
        $center->region = $request->input('region');
        $center->street = $request->input('street');
        $center->mobileNum = $request->input('mobileNum');
        $center->telephone = $request->input('tel');

        $center->save();

        return redirect()->route('center.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $center = Center::findOrFail($id);

        $center->delete();
        return redirect()->route('center.index');
    }
}
