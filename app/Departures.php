<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departures extends Model
{
    protected $table = 'departures';
    protected $primaryKey = 'ID_GROUP';

    // Tambahkan kolom yang bisa diisi jika diperlukan
    protected $guarded = [];

    public function programs()
    {
        return $this->hasMany(Programs::class, 'ID_GROUP', 'ID_GROUP');
    }
}
