<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
   public function index(Request $request)

{

    $search = $request->search;

    $bukus = Buku::when($search, function ($query) use ($search) {

    $query->where('judul', 'like', "%{$search}%")

          ->orWhere('penulis', 'like', "%{$search}%")

          ->orWhere('kode_buku', 'like', "%{$search}%");

})

->orderBy('kode_buku', 'asc')

->paginate(10)

->withQueryString();

    return view('buku.index', compact('bukus', 'search'));

}

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'kode_buku' => 'required|unique:bukus',
        'judul' => 'required',
        'penulis' => 'required',
        'penerbit' => 'required',
        'tahun' => 'required|numeric',
        'stok' => 'required|numeric',
    ]);

    Buku::create($request->all());

    return redirect()->route('buku.index')
        ->with('success', 'Data buku berhasil ditambahkan.');
}

    public function edit(Buku $buku)
{
    return view('buku.edit', compact('buku'));
}

   public function update(Request $request, Buku $buku)
{
    $request->validate([
        'kode_buku' => 'required|unique:bukus,kode_buku,' . $buku->id,
        'judul' => 'required',
        'penulis' => 'required',
        'penerbit' => 'required',
        'tahun' => 'required|numeric',
        'stok' => 'required|numeric',
    ]);

    $buku->update($request->all());

    return redirect()->route('buku.index')
        ->with('success', 'Data buku berhasil diperbarui.');
}

    public function destroy(Buku $buku)
{
    $buku->delete();

    return redirect()->route('buku.index')
        ->with('success', 'Data buku berhasil dihapus.');
}
}