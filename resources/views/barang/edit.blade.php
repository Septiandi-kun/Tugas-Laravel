<h1>Ubah Kategori</h1>
@foreach ($errors->all() as $error)
<h4>{{ $error }}</h4>
@endforeach
@if (session('status'))
<div>
{{ session('status') }}
</div>
@endif

<form action="{{ route('barang.update', $barang->id) }}" method="POST">
{{ method_field("PUT") }}
{{ csrf_field() }}
<table>
    <tr>
        <td>Kode Barang <input type="text" name="kode_barang" value="{{ $barang->kode_barang }}"/></td>
        <td>Nama Barang <input type="text" name="nama_barang" value="{{ $barang->nama_barang }}"/></td>
        <td>Stok <input type="text" name="stok" value="{{ $barang->stok }}"/></td>
        <td>Harga Jual <input type="text" name="harga_jual" value="{{ $barang->harga_jual }}"/></td>
        <td>Harga Beli <input type="text" name="harga_beli" value="{{ $barang->harga_beli }}"/></td>
    </tr>
</table>
<input type="submit" value="Simpan" name="submit"/>
</form>