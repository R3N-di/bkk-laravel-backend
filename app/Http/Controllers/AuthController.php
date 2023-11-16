<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * login user
     *
     * @param Request berisi data login
     * @return response()->json()
     **/
    public function login(Request $request)
    {
        // NOTE Jika Email dan Password tidak ada yang sesuai dgn yg di DB
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $auth = Auth::user();
            // $success['token'] = $auth->createToken('auth_token')->plainTextToken;
            $success['name'] = $auth->name;
            $success['email'] = $auth->email;
            $success['role'] = $auth->role;
            $success['jk'] = $auth->jk;
            $success['tgl_lahir'] = $auth->tgl_lahir;
            // $success['is_verified'] = $auth->is_verified;
            // $success['is_lulusan'] = $auth->is_lulusan;
            // $success['status'] = $auth->status;

            return response()->json([
                'statusLogin' => true,
                // 'messageLogin' => 'Anda Berhasil Login!',
                'dataUser' => $success,
            ]);
        }

        // NOTE Jika Data sudah sesuai semua dengan yg ada di DB
        else {
            return response()->json([
                'statusLogin' => false,
                'messageLogin' => 'Gagal Login! Cek Kembali Email dan Password Anda!',
            ]);
        }
    }

    /**
     * Untuk Register User Baru
     *
     * @param Request berisi data register
     * @return response()->json()
     **/
    public function register(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     ''
        // ]);
    }
}
