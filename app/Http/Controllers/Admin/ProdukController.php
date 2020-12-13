<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\NewProduk;
use Image;

class ProdukController extends Controller
{
    public function listProduk(Request $request, $pages){
        $session = $request->session()->get('admin');
        if ($session == null) {
            return redirect()->route("admin.login");
        }

        $produk = DB::table('produk')->latest()->get();
        return view('admin.listProduk',compact('pages','produk'));
    }

    public function newProduk(Request $request){
        $session = $request->session()->get('admin');
        if ($session == null) {
            return redirect()->route("admin.login");
        }
        $pages = 'new-produk';
        return view('admin.addProduk', compact('pages'));
    }

    public function saveProduk(Request $request){
        $request->validate([
            'nama_produk' => 'required|string',
            'foto_produk' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'deskripsi' => 'required|string',
            'harga' => 'required|string',
            'diskon' => 'required|string',
            'stok' => 'required|string',
            'kondisi' => 'required|string',
            'berat' => 'required|string',
            'kategori' => 'required|string'
        ]);
        $gambar = $request->file('foto_produk');
        $nama_foto = time().'_'.$gambar->getClientOriginalName();
        $tujuan_upload = "assets/images/products/";

        $img = Image::make($gambar->getRealPath());

        NewProduk::create([
            'nama' => $request->nama_produk,
            'harga' => $request->harga,
            'kategori' => $request->kategori,
            'gambar' => $nama_foto,
            'deskripsi' => $request->deskripsi,
            'diskon' => $request->diskon,
            'stok' => $request->stok,
            'kondisi' => $request->kondisi,
            'berat' => $request->berat,
        ]);
        
        /** Change resoluution image and save to path **/
        $img->resize(600,600)->save($tujuan_upload.$nama_foto);

        return redirect()->route('admin.list-produk','list-produk')->with('saved','Produk baru ditambahkan');
    }

    public function editProduk(Request $request, $id){
        $pages = 'edit-produk';
        $session = $request->session()->get('admin');
        if ($session == null) {
            return redirect()->route("admin.login");
        }
        $produk = DB::table('produk')->where('id',$id)->first();

        return view('admin.editProduk', compact('pages','produk'));
    }

    public function saveEdit(Request $request,$id){
        $session = $request->session()->get('admin');
        if ($session == null) {
            return redirect()->route("admin.login");
        }
        $request->validate([
            'nama_produk' => 'required|string',
            'deskripsi' => 'required|string',
            'harga' => 'required|string',
            'diskon' => 'required|string',
            'stok' => 'required|string',
            'berat' => 'required|string',
        ]);

        DB::table('produk')->where('id',$id)->update([
            'nama' => $request->nama_produk,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'diskon' => $request->diskon,
            'stok' => $request->stok,
            'berat' => $request->berat,
        ]);

        return redirect()->route('admin.list-produk','list-produk')->with('changed','Produk berhasil diedit');
    }

    public function deleteProduk(Request $request, $id){
        $session = $request->session()->get('admin');
        if ($session == null) {
            return redirect()->route("admin.login");
        }

        DB::table('produk')->where('id',$id)->delete();

        return redirect()->route('admin.list-produk','list-produk')->with('deleted','Produk berhasil dihapus!');
    }
}