<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Hash;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        $user = User::where('id', $user_id)->with('profile')->first();
        
        return response()->json($user);
    }

    public function all()
    {
        $users = User::with('profile')->get();
        
        return response()->json($users);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
            'kelas' => 'required|string',
            'jurusan' => 'required|string',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string',
            'status' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        
        $user = User::findOrFail($user_id);

        $user->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        $profile = Profile::where('user_id', $user_id);

        $profile->update([
            'user_id' => $user->id,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'status' => $request->status
        ]);

        return response()->json([
            "message"=>"ok"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        $profile = Profile::where('user_id',$user_id)->delete();
        $user = User::findOrFail($user_id)->delete();

        return response()->json([
            'message'=>'ok'
        ]);
    }
}
