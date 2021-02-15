<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use Illuminate\Http\Request;

use Validator;
use Illuminate\Support\Facades\File; 

class EkskulController extends Controller
{

    public function index()
    {
        $ekskuls = Ekskul::all();

        return response()->json($ekskuls);
    }

    public function detail($id)
    {
        $ekskuls = Ekskul::where('id',$id)->get();

        return response()->json($ekskuls);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'ekskul'=>'required|string',
            'deskripsi'=>'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }

        $path = public_path()."/ekskul";
        $file = $request->file('gambar');
        $file->move($path, $file->getClientOriginalName());

        $ekskul = Ekskul::create([
            'ekskul'=>$request->ekskul,
            'deskripsi'=>$request->deskripsi,
            'gambar'=>'ekskul/'.$file->getClientOriginalName()
        ]);

        return response()->json([
            'message'=>'ok'
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'ekskul'=>'required|string',
            'deskripsi'=>'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }

        $path = public_path()."/ekskul";
        $file = $request->file('gambar');
        $file->move($path, $file->getClientOriginalName());

        $ekskul = Ekskul::findOrFail($id);
        File::delete(public_path($ekskul->gambar));
        $ekskul->update([
            'ekskul'=>$request->ekskul,
            'deskripsi'=>$request->deskripsi,
            'gambar'=>'ekskul/'.$file->getClientOriginalName()
        ]);

        return response()->json([
            'message'=>'ok'
        ]);
    }

    public function destroy($id)
    {
        $ekskul = Ekskul::findOrFail($id);
        File::delete(public_path($ekskul->gambar));
        $ekskul->delete();
        
        return response()->json([
            'message'=>'ok'
        ]);
    }
}
