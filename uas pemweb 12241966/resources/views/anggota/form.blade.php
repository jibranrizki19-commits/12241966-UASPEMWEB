<div class="mb-3">
    <label>Nama Anggota</label>
    <input type="text"
        name="nama"
        class="form-control"
        value="{{ old('nama', $anggota->nama ?? '') }}">
</div>

<div class="mb-3">
    <label>Alamat</label>
    <textarea
        name="alamat"
        class="form-control"
        rows="3">{{ old('alamat', $anggota->alamat ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label>No HP</label>
    <input type="text"
        name="no_hp"
        class="form-control"
        value="{{ old('no_hp', $anggota->no_hp ?? '') }}">
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email"
        name="email"
        class="form-control"
        value="{{ old('email', $anggota->email ?? '') }}">
</div>

<button class="btn btn-success">
    Simpan
</button>

<a href="{{ route('anggota.index') }}"
    class="btn btn-secondary">

    Kembali

</a>