<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => $request->cookie('token'),
            'Content-Type' => 'application/json',
        ])->get('http://localhost:3000/barang');

        $res = $response->json();

        $data = [
            'title' => 'Data Barang',
            'barang' => $res['data']
        ];

        return view('barang.barang', $data);
    }

    public function edit(Request $request, $kodebr)
    {
        $response = Http::withHeaders([
            'Authorization' => $request->cookie('token'),
            'Content-Type' => 'application/json',
        ])->get('http://localhost:3000/barang/find/' . $kodebr);

        $res = $response->json();

        $data = [
            'title' => 'Data Barang',
            'barang' => $res['data']
        ];

        return view('barang.editBarang', $data);
    }

    public function add(Request $request)
    {
        $data = [
            'title' => 'Tambah Barang'
        ];

        return view('barang.addBarang', $data);
    }

    public function storeData(Request $request)
    {
        $this->validate($request, [
            'kodebr' => 'required',
            'nama' => 'required',
            'harga' => 'required',
            'gdg' => 'required',
        ]);

        $params = [
            'kodebr' => $request->input('kodebr'),
            'nama' => $request->input('nama'),
            'harga' => $request->input('harga'),
            'gdg' => $request->input('gdg'),
        ];

        $response = Http::withHeaders([
            'Authorization' => $request->cookie('token'),
            'Content-Type' => 'application/json',
        ])->post('http://localhost:3000/barang/', $params);

        $res = $response->json();

        if ($res['status'] != 200) {
            return redirect('/barang')->with('danger', 'Gagal Tambah Data');
        }

        return redirect()->route('barang')->with('success', 'Berhasil Tambah Data');
    }

    public function updateData(Request $request)
    {
        $this->validate($request, [
            'kodebr' => 'required',
            'nama' => 'required',
            'harga' => 'required',
            'gdg' => 'required',
        ]);

        $params = [
            'kodebr' => $request->input('kodebr'),
            'nama' => $request->input('nama'),
            'harga' => $request->input('harga'),
            'gdg' => $request->input('gdg'),
        ];

        $response = Http::withHeaders([
            'Authorization' => $request->cookie('token'),
            'Content-Type' => 'application/json',
        ])->put('http://localhost:3000/barang/' . $params['kodebr'], $params);

        $res = $response->json();

        if ($res['status'] != 200) {
            return redirect('/barang/edit/' . $params['kodebr'])->with('danger', 'Gagal Ubah Data');
        }

        return redirect()->route('barang')->with('success', 'Berhasil Ubah Data');
    }

    public function removeData(Request $request, $kodebr)
    {
        $response = Http::withHeaders([
            'Authorization' => $request->cookie('token'),
            'Content-Type' => 'application/json',
        ])->delete('http://localhost:3000/barang/' . $kodebr);

        $res = $response->json();

        if ($res['status'] != 200) {
            return redirect('/barang')->with('danger', 'Gagal Hapus Data');
        }

        return redirect()->route('barang')->with('success', 'Berhasil Hapus Data');
    }
}
