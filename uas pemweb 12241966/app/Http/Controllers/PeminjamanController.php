<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\Anggota;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index(Request $request)

{

    $search = $request->search;

    $peminjamans = Peminjaman::with(['anggota', 'buku'])

        ->when($search, function ($query) use ($search) {

            $query->whereHas('anggota', function ($q) use ($search) {

                $q->where('nama', 'like', "%{$search}%");

            })

            ->orWhereHas('buku', function ($q) use ($search) {

                $q->where('judul', 'like', "%{$search}%");

            });

        })

        ->join('anggotas', 'peminjamen.anggota_id', '=', 'anggotas.id')

        ->orderBy('anggotas.nama', 'asc')

        ->select('peminjamen.*')

        ->paginate(10)

        ->withQueryString();

    return view('peminjaman.index', compact('peminjamans', 'search'));

}

    public function create()
    {
        $bukus = Buku::orderBy('judul')->get();
        $anggotas = Anggota::orderBy('nama')->get();

        return view('peminjaman.create', compact('bukus','anggotas'));
    }

    public function store(Request $request)

{

    $request->validate([

        'anggota_id' => 'required',

        'buku_id' => 'required',

        'tgl_pinjam' => 'required|date',

    ]);

    $buku = Buku::findOrFail($request->buku_id);


    if ($buku->stok <= 0) {

        return back()

            ->withInput()

            ->withErrors([

                'buku_id' => 'Buku tidak dapat dipinjam karena stok habis.'

            ]);

    }

    Peminjaman::create([

        'anggota_id' => $request->anggota_id,

        'buku_id' => $request->buku_id,

        'tgl_pinjam' => $request->tgl_pinjam,

        'status' => 'Dipinjam'

    ]);


    $buku->decrement('stok');

    return redirect()->route('peminjaman.index')

        ->with('success', 'Peminjaman berhasil ditambahkan.');

}

    public function edit(Peminjaman $peminjaman)
    {
        $bukus = Buku::orderBy('judul')->get();
        $anggotas = Anggota::orderBy('nama')->get();

        return view('peminjaman.edit', compact(
            'peminjaman',
            'bukus',
            'anggotas'
        ));
    }

    public function update(Request $request, Peminjaman $peminjaman)

{

    $request->validate([

        'anggota_id' => 'required',

        'buku_id' => 'required',

        'tgl_pinjam' => 'required|date',

        'tgl_kembali' => 'nullable|date',

        'status' => 'required'

    ]);

    $buku = Buku::findOrFail($peminjaman->buku_id);


    if ($peminjaman->status == 'Dipinjam' && $request->status == 'Dikembalikan') {

        $buku->increment('stok');

    }


    if ($peminjaman->status == 'Dikembalikan' && $request->status == 'Dipinjam') {

        if ($buku->stok <= 0) {

    return back()

        ->withInput()

        ->withErrors([

            'buku_id' => 'Buku tidak dapat dipinjam karena stok habis.'

        ]);

}

        $buku->decrement('stok');

    }

    $peminjaman->update([

        'anggota_id' => $request->anggota_id,

        'buku_id' => $request->buku_id,

        'tgl_pinjam' => $request->tgl_pinjam,

        'tgl_kembali' => $request->tgl_kembali,

        'status' => $request->status,

    ]);

    return redirect()->route('peminjaman.index')

        ->with('success', 'Data peminjaman berhasil diperbarui.');

}

    public function destroy(Peminjaman $peminjaman)
    {
        if($peminjaman->status=="Dipinjam"){
            Buku::find($peminjaman->buku_id)->increment('stok');
        }

        $peminjaman->delete();

        return redirect()->route('peminjaman.index')
                ->with('success','Data berhasil dihapus.');
    }
}