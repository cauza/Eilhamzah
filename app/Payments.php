<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    //
    protected $table = 'payments';
    protected $primaryKey = 'ID_PAYMENT';

    // Tambahkan kolom yang bisa diisi jika diperlukan
    protected $guarded = [];

}
