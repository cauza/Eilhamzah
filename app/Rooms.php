<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{

    protected $table = 'rooms';
    protected $primaryKey = 'ID_AVAILABILITY';

    // Tambahkan kolom yang bisa diisi jika diperlukan
    protected $guarded = [];

    public function program()
    {
        return $this->belongsTo(Programs::class, 'ID_PROGRAM', 'ID_PROGRAM');
    }

    public function departure()
    {
        return $this->belongsTo(Departures::class, 'ID_GROUP', 'ID_GROUP');
    }

}
