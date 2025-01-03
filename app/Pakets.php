<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pakets extends Model
{
    //
    protected $table = 'pakets';
    protected $primaryKey = 'ID_PACKET';

    // Tambahkan kolom yang bisa diisi jika diperlukan
    protected $guarded = [];

    public function departure()
    {
        return $this->belongsTo(Departures::class, 'ID_GROUP', 'ID_GROUP');
    }

    public function program()
    {
        return $this->belongsTo(Programs::class, 'ID_PROGRAM', 'ID_PROGRAM');
    }

    public function account()
    {
        return $this->belongsTo(Accounts::class, 'ID_ACCOUNT', 'ID_ACCOUNT');
    }

    public function payment()
    {
        return $this->hasMany(Payments::class, 'KODE_REGISTRASI', 'KODE_REGISTRASI');
    }

    public function jamaah()
    {
        return $this->hasMany(PaketDetails::class, 'KODE_BOOKING', 'KODE_BOOKING');
    }
}
