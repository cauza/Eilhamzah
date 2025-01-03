<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programs extends Model
{
    protected $table = 'programs';
    protected $primaryKey = 'ID_PROGRAM';

    // Tambahkan kolom yang bisa diisi jika diperlukan
    protected $guarded = [];

    public function departure()
    {
        return $this->belongsTo(Departures::class, 'ID_GROUP', 'ID_GROUP');
    }
}
