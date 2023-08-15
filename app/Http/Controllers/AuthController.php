<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'uname' => 'required',
            'password' => 'required',
        ]);

        $params = [
            'username' => $request->input('uname'),
            'password' => $request->input('password')
        ];

        $response = Http::post('http://localhost:3000/login', $params);

        $jsonRes = $response->json();

        if ($jsonRes['status'] = 200) {
            return redirect()->route('barang')->withCookie(cookie('token', $jsonRes['data']['token'], 360));
        } else {
            return redirect()->route('login.page');
        }
    }
}
