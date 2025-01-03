<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaketDetails extends Model
{
    protected $table = 'paket_details';
    protected $primaryKey = 'ID';

    // Tambahkan kolom yang bisa diisi jika diperlukan
    protected $guarded = [];

    public function paket()
    {
        return $this->belongsTo(Pakets::class, 'KODE_BOOKING', 'KODE_BOOKING');
    }

    public function data()
    {
        return $this->belongsTo(DataJamaahs::class, 'z_nomor_paspor', 'NO_PASPOR');
    }
}
