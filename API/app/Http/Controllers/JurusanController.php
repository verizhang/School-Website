<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

use Validator;
use Illuminate\Support\Facades\File; 

class JurusanController extends Controller
{

    public function index()
    {
        $jurusan = Jurusan::all();

        return response()->json($jurusan);
    }

    public function detail($id)
    {
        $jurusan = Jurusan::where('id',$id)->get();

        return response()->json($jurusan);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'jurusan'=>'required|string',
            'deskripsi'=>'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }

        $path = public_path()."/jurusan";
        $file = $request->file('gambar');
        $file->move($path, $file->getClientOriginalName());

        $jurusan = Jurusan::create([
            'jurusan'=>$request->jurusan,
            'deskripsi'=>$request->deskripsi,
            'gambar'=>'jurusan/'.$file->getClientOriginalName()
        ]);

        return response()->json([
            'message'=>'ok'
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'jurusan'=>'required|string',
            'deskripsi'=>'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }

        $path = public_path()."/jurusan";
        $file = $request->file('gambar');
        $file->move($path, $file->getClientOriginalName());

        $jurusan = Jurusan::findOrFail($id);
        File::delete(public_path($jurusan->gambar));
        $jurusan->update([
            'jurusan'=>$request->jurusan,
            'deskripsi'=>$request->deskripsi,
            'gambar'=>'jurusan/'.$file->getClientOriginalName()
        ]);

        return response()->json([
            'message'=>'ok'
        ]);
    }

    public function destroy($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        File::delete(public_path($jurusan->gambar));
        $jurusan->delete();

        return response()->json([
            'message'=>'ok'
        ]);
    }
}
