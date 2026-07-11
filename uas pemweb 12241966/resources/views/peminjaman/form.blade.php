<div class="mb-3">

    <label>Anggota</label>

    <select name="anggota_id" class="form-select select2">

    <option value="">-- Pilih Anggota --</option>

    @foreach($anggotas as $anggota)

        <option value="{{ $anggota->id }}"

            {{ old('anggota_id', $peminjaman->anggota_id ?? '') == $anggota->id ? 'selected' : '' }}>

            {{ $anggota->nama }}

        </option>

    @endforeach

    </select>

</div>

<div class="mb-3">

    <label>Buku</label>

    <select name="buku_id" class="form-select select2">

    <option value="">-- Pilih Buku --</option>

    @foreach($bukus as $buku)

        <option value="{{ $buku->id }}"

            {{ old('buku_id', $peminjaman->buku_id ?? '') == $buku->id ? 'selected' : '' }}>

            {{ $buku->judul }} (Stok: {{ $buku->stok }})

        </option>

    @endforeach

    </select>


</div>

<div class="mb-3">

<label>Tanggal Pinjam</label>

<input
type="date"
name="tgl_pinjam"
class="form-control"
value="{{ old('tgl_pinjam',$peminjaman->tgl_pinjam ?? date('Y-m-d')) }}">

</div>

<div class="mb-3">

<label>Tanggal Kembali</label>

<input
type="date"
name="tgl_kembali"
class="form-control"
value="{{ old('tgl_kembali',$peminjaman->tgl_kembali ?? '') }}">

</div>

<div class="mb-3">

<label>Status</label>

<select
name="status"
class="form-control">

<option value="Dipinjam"
@selected(old('status',$peminjaman->status ?? '')=='Dipinjam')>

Dipinjam

</option>

<option value="Dikembalikan"
@selected(old('status',$peminjaman->status ?? '')=='Dikembalikan')>

Dikembalikan

</option>

</select>

</div>

<button class="btn btn-success">

Simpan

</button>

<a href="{{ route('peminjaman.index') }}"
class="btn btn-secondary">

Kembali

</a>
<script>

document.addEventListener('DOMContentLoaded', function () {

    $('.select2').select2({

        width: '100%',

        placeholder: 'Ketik untuk mencari...',

        allowClear: true,

        minimumInputLength: 0

    });

});

</script>