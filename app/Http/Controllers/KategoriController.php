<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "kategori";
        $kategori=Kategori::orderBy('nama_kategori','ASC')->get();
        // dd($kategori);
        return view('kategori.index',compact('title','kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request,[
            'name'=>'required|string'
        ]);
        $kategori = Kategori::create([
            'nama_kategori'=> $request->name
        ]);
        return redirect()->route('Kategori')->with(['success'=>'data berhasil disimpan']);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Cara 1
        $kategori = Kategori::where('id_kategori','=',$id)->first();
        // dd($kategori);
        if($kategori){
            $kategori->delete();
            return redirect()->route('Kategori')->with(['success'=>'Data berhasil dihapus']);
        }else{
            return redirect()->route('Kategori');
        }
        //cara 2
        // try {
        //     $kategori=Kategori::findOrFail($id);
        //     $kategori->delete();
        //     return redirect()->route('Kategori')->with(['success'=>'Data berhasil dihapus']);
        // } catch (\Throwable $th) {
        //    dd($th->getErrorMessage());
        // }



    }
}
