<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaketCategories extends Model
{
    protected $table = 'paket_categories';
    protected $primaryKey = 'ID_KATEGORI';

    // Tambahkan kolom yang bisa diisi jika diperlukan
    protected $fillable = ['NAMA_KATEGORI'];
}
