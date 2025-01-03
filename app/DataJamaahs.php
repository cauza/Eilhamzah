<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataJamaahs extends Model
{
    protected $table = 'jamaah_umrah';
    protected $primaryKey = 'ID';

    // Tambahkan kolom yang bisa diisi jika diperlukan
    protected $guarded = [];

    public function detailpaket()
    {
        return $this->belongsTo(PaketDetails::class, 'NO_PASPOR', 'z_nomor_paspor');
    }
}
