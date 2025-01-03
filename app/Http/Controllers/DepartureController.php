<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departures;

class DepartureController extends Controller
{
    //
    public function index(){
        $departures = Departures::orderBy('TANGGAL_KEBERANGKATAN', 'DESC')->paginate(10);

        //dd ($categories);
        // Return ke view dengan data kategori
        return view('admin.paket.departures', compact('departures'));
    }
    
}
