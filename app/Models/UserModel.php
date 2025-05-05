<?php

namespace App\Http\Controllers\Api;

use App\Models\UserModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Handle the registration request.
     */
    public function __invoke(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'username'  => 'required|unique:user_models,username',
            'nama'      => 'required',
            'password'  => 'required|min:5|confirmed',
            'level_id'  => 'required|integer',
            'image'     => 'required|string',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }

        // Simpan user baru
        $user = UserModel::create([
            'username'  => $request->username,
            'nama'      => $request->nama,
            'password'  => bcrypt($request->password),
            'level_id'  => $request->level_id,
            'image'     => $request->image,
        ]);

        // Respons berhasil
        return response()->json([
            'success' => true,
            'user'    => $user,
        ], 201);
    }
}
