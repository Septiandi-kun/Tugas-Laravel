@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">TESSSSS....</div>

                <h1>Input Barang Baru</h1>
                @foreach ($errors->all() as $error)
                <h4>{{ $error }}</h4>
                @endforeach
                @if (session('status'))
                <div>
                {{ session('status') }}
                </div>
                @endif
                

                <form action="{{ url('barang') }}" method="post">
                {!! csrf_field() !!}
                <table border="2" style="text-align: center;">
                <tr>
                <td>Kode:<input type="text" name="kode_barang"/><td>
                <td>Nama:<input type="text" name="nama_barang"/><td>
                <td>Stok:<input type="text" name="stok"/><td>
                <td>Harga Jual <input type="text" name="harga_jual"/><td>
                <td>Harga Beli <input type="text" name="harga_beli"/><td>
                </td>
                </tr>
                </table>
                </br>
                <input type="submit" value="Simpan" name="submit"/>
                </form>

                </br>
                </br>


                @foreach ($errors->all() as $error)
                <h4>{{ $error }}</h4>
                @endforeach
                @if (session('status'))
                <div>
                {{ session('status') }}
                </div>
                @endif
                <table border="3" style="text-align: center;">
                <tr>
                <td>Kode Barang</td>
                <td>Nama Barang</td>
                <td>Stok</td>
                <td>Harga Jual</td>
                <td>Harga Beli</td>
                <td>Hapus</td>
                <td>Edit</td>
                </tr>
                @foreach ($barangs as $barang)                
                <tr>
                <td>{{ $barang->kode_barang }}</td>
                <td>{{ $barang->nama_barang }}</td>
                <td>{{ $barang->stok }}</td>
                <td>{{ $barang->harga_jual }}</td>
                <td>{{ $barang->harga_beli }}</td>
                <td>
                    <form action="{{route('barang.destroy', $barang->id)}}" method="post">
                        {{method_field("DELETE")}}
                        {{ csrf_field() }}
                    <input type = "submit" name="hapus" value ="Hapus" />
                    </form>
                </td>
                <td>
                    <a href="{!! action('BarangController@edit', $barang->id) !!}" 
                        data-toggle= "modal" data-target = "#myModal" >EDIT</a>
                </td>
                </tr>

                @endforeach

                
                </table>


    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ubah Data Barang</h4>
                </div>
                <!-- body modal -->
                @foreach ($errors->all() as $error)
                <h4>{{ $error }}</h4>
                @endforeach
                @if (session('status'))
                <div>
                {{ session('status') }}
                </div>
                @endif

                <div class="modal-body">
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
                </div>
                <!-- footer modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button>
                </div>
            </div>
        </div>
    </div>
                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection