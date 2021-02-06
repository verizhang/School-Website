<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use Illuminate\Http\Request;

use Validator;
use Illuminate\Support\Facades\File; 

class KaryaController extends Controller
{
    public function index()
    {
        $karya = Karya::all();

        return response()->json($karya);
    }

    public function detail($id)
    {
        $karya = Karya::where('id',$id)->get();

        return response()->json($karya);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'karya'=>'required|string',
            'anggota'=>'required|string',
            'link'=>'required|string'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }

        $path = public_path()."/karya";
        $file = $request->file('gambar');
        $file->move($path, $file->getClientOriginalName());

        $karya = Karya::create([
            'karya'=>$request->karya,
            'anggota'=>$request->anggota,
            'link'=>$request->link,
            'gambar'=>'karya/'.$file->getClientOriginalName()
        ]);

        return response()->json([
            'message'=>'ok'
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'karya'=>'required|string',
            'anggota'=>'required|string',
            'link'=>'required|string'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }

        $path = public_path()."/karya";
        $file = $request->file('gambar');
        $file->move($path, $file->getClientOriginalName());

        $karya = Karya::findOrFail($id);
        File::delete(public_path($karya->gambar));
        $karya->update([
            'karya'=>$request->karya,
            'anggota'=>$request->anggota,
            'link'=>$request->link,
            'gambar'=>'karya/'.$file->getClientOriginalName()
        ]);

        return response()->json([
            'message'=>'ok'
        ]);
    }

    public function destroy($id)
    {
        $karya = Karya::findOrFail($id);
        File::delete(public_path($karya->gambar));
        $karya->delete();

        return response()->json([
            'message'=>'ok'
        ]);
    }
}
