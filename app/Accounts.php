<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    //
    protected $table = 'accounts';
    protected $primaryKey = 'ID_ACCOUNT';

    // Tambahkan kolom yang bisa diisi jika diperlukan
    protected $guarded = [];
}
