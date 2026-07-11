<div class="mb-3">
    <label>Kode Buku</label>
    <input type="text" name="kode_buku"
        class="form-control"
        value="{{ old('kode_buku', $buku->kode_buku ?? '') }}">
</div>

<div class="mb-3">
    <label>Judul Buku</label>
    <input type="text" name="judul"
        class="form-control"
        value="{{ old('judul', $buku->judul ?? '') }}">
</div>

<div class="mb-3">
    <label>Penulis</label>
    <input type="text" name="penulis"
        class="form-control"
        value="{{ old('penulis', $buku->penulis ?? '') }}">
</div>

<div class="mb-3">
    <label>Penerbit</label>
    <input type="text" name="penerbit"
        class="form-control"
        value="{{ old('penerbit', $buku->penerbit ?? '') }}">
</div>

<div class="mb-3">
    <label>Tahun Terbit</label>
    <input type="number" name="tahun"
        class="form-control"
        value="{{ old('tahun', $buku->tahun ?? '') }}">
</div>

<div class="mb-3">
    <label>Stok</label>
    <input type="number" name="stok"
        class="form-control"
        value="{{ old('stok', $buku->stok ?? '') }}">
</div>

<button class="btn btn-success">
    Simpan
</button>

<a href="{{ route('buku.index') }}" class="btn btn-secondary">
    Kembali
</a>