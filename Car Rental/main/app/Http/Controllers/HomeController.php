<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Center;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $manufacturers = DB::table('cars')->select('name')->distinct()->get();
        return view('index', [
            'centers' => Center::all(),
            'manus' => $manufacturers
        ]);
    }

    public function center()
    {
        $centers = Center::all();
        return view('center', [
            'centers' => $centers
        ]);
    }

}
