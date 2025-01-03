<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departures;
use App\Pakets;
use App\Payments;
use App\PaketDetails;

class PaketController extends Controller
{
    //
    public function index(Request $request)
    {
        // $mitra = Mitra::orderBy('nama', 'ASC')->get();
        $group = Departures::orderBy('TANGGAL_KEBERANGKATAN', 'DESC')->get();

        $query = Pakets::query();

        // Filter berdasarkan kode booking
        if ($request->filled('kode_booking')) {
            $query->where('KODE_BOOKING', 'like', '%' . $request->kode_booking . '%');
        }

        // Filter berdasarkan kode booking
        if ($request->filled('id_group')) {
            $query->where('ID_GROUP', $request->id_group);
        }

        // Filter berdasarkan kode booking
        if ($request->filled('akun_pj')) {
            $query->whereHas('account', function ($q) use ($request) {
                $q->where('NAMA_USER','like', '%' . $request->akun_pj . '%');
            });
        }

        // Filter berdasarkan tanggal berangkat
        if ($request->filled('tanggal_berangkat')) {
            $query->whereHas('departure', function ($q) use ($request) {
                $q->where('TANGGAL_KEBERANGKATAN', $request->tanggal_berangkat);
            });
        }
        // Ambil data kategori dengan pagination (10 per halaman)
        $pakets = $query->withCount('jamaah')->orderBy('TANGGAL_PESAN','DESC')->paginate(10);

        //dd ($categories);
        // Return ke view dengan data kategori
        return view('admin.paket.pakets', compact('pakets','group'));
    }

    public function paket($id)
    {
        // Ambil data kategori dengan pagination (10 per halaman)
        $pakets = Pakets::find($id);

        //dd ($categories);
        // Return ke view dengan data kategori
        return view('admin.paket.detail', compact('pakets'));
    }

    public function payment($id)
    {
        $paket = Pakets::with(['jamaah','jamaah.data'])->find($id);

        if (!$paket) {
            return redirect()->route('admin.paket.pakets')->with('error', 'Data tidak ditemukan!');
        }

        $payments = Payments::where('KODE_REGISTRASI','=', $paket->KODE_REGISTRASI)->paginate(10);
        //dd ($paket);
        return view('admin.paket.pembayaran', compact('payments','paket'));
    }

    public function jamaah()
    {
        $jamaahs = PaketDetails::orderBy('KODE_BOOKING', 'DESC')->paginate(10);

        // dd($jamaahs);
        return view('admin.paket.jamaahs', compact('jamaahs'));
    }
}
