<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Peminjaman;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBuku = Buku::count();

        $totalAnggota = Anggota::count();

        $bukuDipinjam = Peminjaman::where('status', 'Dipinjam')->count();

        $bukuTersedia = Buku::sum('stok');

        return view('dashboard.index', compact(
            'totalBuku',
            'totalAnggota',
            'bukuDipinjam',
            'bukuTersedia'
        ));
    }
}