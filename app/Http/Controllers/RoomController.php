<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rooms;

class RoomController extends Controller
{

    public function index()
    {
        $rooms = Rooms::orderBy('ID_GROUP', 'DESC')->orderBy('ID_PROGRAM', 'DESC')->orderBy('ID_ROOM_TYPE','ASC')->paginate(10);

        //dd ($categories);
        // Return ke view dengan data kategori
        return view('admin.paket.rooms', compact('rooms'));
    }
}
