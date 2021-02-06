<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;


use Validator;

class MapelController extends Controller
{
    public function index()
    {
        $mapel = Mapel::all();
        
        return response()->json($mapel);
    }

    public function detail($id)
    {
        $mapel = Mapel::where('id',$id)->get();
        
        return response()->json($mapel);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'mapel'=>'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }

        $mapel = Mapel::create([
            'mapel'=>$request->mapel,
        ]);

        return response()->json([
            'message'=>'ok'
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'mapel'=>'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }

        $mapel = Mapel::findOrFail($id);
        $mapel->update([
            'mapel'=>$request->mapel,
        ]);

        return response()->json([
            'message'=>'ok'
        ]);
    }

    public function destroy($id)
    {
        $karya = Mapel::findOrFail($id);
        $karya->delete();

        return response()->json([
            'message'=>'ok'
        ]);
    }
}
