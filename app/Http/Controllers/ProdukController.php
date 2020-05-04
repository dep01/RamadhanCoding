<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Produk;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Produk";
        $produk=Produk::with('kategori')->orderBy('nama_produk','ASC')->get();
        // dd($produk);
        return view('produk.index',compact('title','produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Tambah";
        $kategori=Kategori::orderBy('nama_kategori','ASC')->get();
        return view('produk.create',compact('title','kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_produk'=>'required|string',
            'kategori_id'=>'required|string',
            'harga_produk'=>'required|string|numeric',
            'qty'=>'required|string|numeric',
        ]);
        $produk = Produk::firstOrCreate([
            'nama_produk'=> $request->nama_produk,
        ],
        [
            'id_kategori'=> $request->kategori_id,
            'harga'=> $request->harga_produk,
            'qty'=> $request->qty,
        ]);
        return redirect()->route('Produk')->with(['success'=>'data '.$request->nama_produk.' berhasil ditambahkan']);
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
        $produk = Produk::findOrFail($id);
        $kategori =Kategori::orderBy('nama_kategori','ASC')->get();
        $title ='Ubah';
        return view('produk.edit',compact('title','produk','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_produk' => 'required|string',
            'kategori_id' => 'required|string',
            'harga_produk' => 'required|string|numeric',
            'qty' => 'required|string|numeric'
        ]);
        $produk = Produk::findOrFail($id);
        $produk->update([ 
            'nama_produk' => $request->nama_produk,
            'id_kategori' => $request->kategori_id,
            'harga' => $request->harga_produk,
            'qty' => $request->qty,
        ]);
        return redirect()->route('Produk')->with(['success' => 'Produk berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::where('id_produk','=',$id)->first();
        // dd($kategori);
        if($produk){
            $produk->delete();
            return redirect()->route('Produk')->with(['success'=>'Data berhasil dihapus']);
        }else{
            return redirect()->route('Produk');
        }
    }
}
