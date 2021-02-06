<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Mapel;
use Illuminate\Http\Request;

use Validator;
use Illuminate\Support\Facades\File; 

class MateriController extends Controller
{
    public function index()
    {
        $materi = Mapel::with('materi')->get();

        return response()->json($materi);
    }

    public function detail($id)
    {
        $materi = Mapel::where('id',$id)->get();
        return response()->json($materi);

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'mapel_id'=>'required|integer',
            'judul'=>'required|string',
            'deskripsi'=>'required|string'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }

        $path = public_path()."/file";
        $file = $request->file('file');
        $file->move($path, $file->getClientOriginalName());

        $materi = Materi::create([
            'mapel_id'=>$request->mapel_id,
            'judul'=>$request->judul,
            'deskripsi'=>$request->deskripsi,
            'file'=>'file/'.$file->getClientOriginalName()
        ]);

        return response()->json([
            'message'=>'ok'
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'mapel_id'=>'required|integer',
            'judul'=>'required|string',
            'deskripsi'=>'required|string'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }

        $path = public_path()."/file";
        $file = $request->file('file');
        $file->move($path, $file->getClientOriginalName());

        $materi = Materi::findOrFail($id);
        File::delete(public_path($materi->file));
        $materi->update([
            'mapel_id'=>$request->mapel_id,
            'judul'=>$request->judul,
            'deskripsi'=>$request->deskripsi,
            'file'=>'file/'.$file->getClientOriginalName()
        ]);

        return response()->json([
            'message'=>'ok'
        ]);
    }

    public function destroy($id)
    {
        $materi = Materi::findOrFail($id);
        File::delete(public_path($materi->file));
        $materi->delete();

        return response()->json([
            'message'=>'ok'
        ]);
    }
}
