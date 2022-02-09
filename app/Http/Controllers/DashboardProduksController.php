<?php

namespace App\Http\Controllers;

use App\Models\Produks;
use Illuminate\Http\Request;
use App\Models\Category;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardProduksController extends Controller
{
    public function create()
    {
        return view('dashboard.produks.create',[
            'categories'=> category::all()
        ]);
    }
    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Produks::class,'slug', $request->judul_produks);
 
         return response()->json(['slug'=>$slug]);
     }
    /** 
     * Display a listing of the resource.
     * 
     * @return\Illuminate\Http\Response
    */
    public function index()
    {
       return view('dashboard.produks.index',[
            'produks'=> produks::all()
        ]);
    }
    public function show(produks $produk)
    {
        //
        return view('dashboard.produks.show',[
            'produks'=> $produk
        ]);
    }
    public function store(Request $request)
    {
        $validateDate = $request->validate([
            'judul_produks' => 'required|max:225',
            'slug' => 'required',
            'harga' => 'required',
            'category_id' => 'required',
            // 'isi_produks' => 'required'
        ]);

        $path = Storage::putFile(
            'public/images',
            $request->file('foto'),
        );
        
        $validateDate['foto']=$path;
        $validateDate['isi_produks']='';
        Produks::create($validateDate);
 
         return redirect('/dashboard/produks')->with('sukses', 'produks Baru Berhasil Ditambahkan');

     }
     public function destroy(Produks $produk)
    {
        Produks::destroy($produk->id);

        return redirect('/dashboard/produks')->with('sukses', 'Data Berita Berhasil Dihapus');
    }
    public function edit(Produks $produk)
    {
        return view('dashboard.produks.edit',[
            'produks'=> $produk,
            'categories'=> Category::all()
        ]);
    }
    public function update(Request $request, Produks $produk)
    {
        $rules = [
            'judul_produks' => 'required|max:225',
            'slug' => 'required',
            'harga' => 'required',
            'category_id' => 'required',
            'foto' => 'image|file|max:10000'
        ];
        
        if($request->file('foto')){
            $path = Storage::putFile(
                'public/images',
                $request->file('foto'),
            );

            $validateDate['foto']=$path;
        }

        if($request->slug != $produk->slug){
            $rules['slug']='required|unique:beritas';
        }
        $validatedData['excerpt'] = Str::limit(strip_tags($request->isi_produks), 100);
        $validateDate['isi_produks']='';
        $validatedData = $request->validate($rules);
        Produks::where('id', $produk->id)
            ->update($validatedData);
        return redirect('/dashboard/produks')->with('sukses', 'Produk Berhasil Di Update');
    }
}