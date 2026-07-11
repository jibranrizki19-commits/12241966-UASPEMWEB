<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index(Request $request)

{

    $search = $request->search;

    $anggotas = Anggota::when($search, function ($query) use ($search) {

        $query->where('nama', 'like', "%{$search}%")

              ->orWhere('email', 'like', "%{$search}%")

              ->orWhere('no_hp', 'like', "%{$search}%");

    })

    ->orderBy('nama', 'asc')

    ->paginate(10)

    ->withQueryString();

    return view('anggota.index', compact('anggotas', 'search'));

}

    public function create()
    {
        return view('anggota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email|unique:anggotas'
        ]);

        Anggota::create($request->all());

        return redirect()->route('anggota.index')
            ->with('success', 'Data anggota berhasil ditambahkan.');
    }

    public function edit(Anggota $anggota)
{
    return view('anggota.edit', compact('anggota'));
}

    public function update(Request $request, Anggota $anggota)
{
    $request->validate([
        'nama' => 'required',
        'alamat' => 'required',
        'no_hp' => 'required',
        'email' => 'required|email|unique:anggotas,email,' . $anggota->id,
    ]);

    $anggota->update($request->all());

    return redirect()->route('anggota.index')
        ->with('success', 'Data anggota berhasil diupdate.');
}

    public function destroy(Anggota $anggota)
    {
        $anggota->delete();

        return redirect()->route('anggota.index')
            ->with('success', 'Data anggota berhasil dihapus.');
    }
}