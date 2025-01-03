<?php

namespace App\Http\Controllers;

use App\PaketCategories;
use Illuminate\Http\Request;

class PaketCategoryController extends Controller
{
    public function index()
    {
        // Ambil data kategori dengan pagination (10 per halaman)
        $categories = PaketCategories::paginate(10);

        // Return ke view dengan data kategori
        return view('admin.paket.categories', compact('categories'));
    }
}
