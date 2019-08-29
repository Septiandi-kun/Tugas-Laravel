<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use DB;
use App\Http\Requests\BarangFormRequest;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $barangs = Barang::all();
        return view ('barang.index', ['barangs' => $barangs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BarangFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BarangFormRequest $request)
    {
        $barang = new Barang();
        $barang->kode_barang= $request->get('kode_barang');
        $barang->nama_barang = $request->get('nama_barang');
        $barang->stok = $request->get('stok');
        $barang->harga_jual = $request->get('harga_jual');
        $barang->harga_beli = $request->get('harga_beli');
        $barang->save();
        return redirect('barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::whereId($id)->firstOrFail();
        return view('barang.edit', ['barang' => $barang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BarangFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BarangFormRequest $request, $id)
    {
        $barang = Barang::whereId($id)->firstOrFail();
        $barang->kode_barang = $request->get('kode_barang');
        $barang->nama_barang = $request->get('nama_barang');
        $barang->stok = $request->get('stok');
        $barang->harga_jual = $request->get('harga_jual');
        $barang->harga_beli = $request->get('harga_beli');
        $barang->save();
        return redirect(action('BarangController@index', $barang->id))->with('status');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::whereId($id)->firstOrFail();
        $kode_barang = $barang->kode_barang;
        $barang->delete();
        return redirect(action('BarangController@index'))->with('status',
        'Barang dengan kode '.$kode_barang.' telah berhasil dihapus');
    }
}
