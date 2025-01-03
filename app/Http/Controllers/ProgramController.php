<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Programs;

class ProgramController extends Controller
{
    //
    public function index()
    {
        $programs = Programs::orderBy('ID_GROUP', 'DESC')->paginate(10);

        //dd ($categories);
        // Return ke view dengan data kategori
        return view('admin.paket.programs', compact('programs'));
    }
}
