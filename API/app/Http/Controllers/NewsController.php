<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

use Validator;
use Illuminate\Support\Facades\File; 
class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();

        return response()->json($news);
    }

    public function detail($id)
    {
        $news = News::where('id',$id)->get();

        return response()->json($news);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'judul'=>'required|string',
            'subjudul'=>'required|string',
            'isi'=>'required|string',
            'kategori'=>'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }

        $path = public_path()."/news";
        $file = $request->file('gambar');
        $file->move($path, $file->getClientOriginalName());

        $news = News::create([
            'judul'=>$request->judul,
            'subjudul'=>$request->subjudul,
            'isi'=>$request->isi,
            'kategori'=>$request->kategori,
            'gambar'=>'news/'.$file->getClientOriginalName()
        ]);

        return response()->json([
            'message'=>'ok'
        ]);
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(),[
            'judul'=>'required|string',
            'subjudul'=>'required|string',
            'isi'=>'required|string',
            'kategori'=>'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }

        $path = public_path()."/news";
        $file = $request->file('gambar');
        $file->move($path, $file->getClientOriginalName());



        $news = News::findOrFail($id);
        File::delete(public_path($news->gambar));
        $news->update([
            'judul'=>$request->judul,
            'subjudul'=>$request->subjudul,
            'isi'=>$request->isi,
            'kategori'=>$request->kategori,
            'gambar'=>'news/'.$file->getClientOriginalName()
        ]);

        return response()->json([
            'message'=>'ok'
        ]);
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        File::delete(public_path($news->gambar));
        $news->delete();

        return response()->json([
            'message'=>'ok'
        ]);
    }
}
