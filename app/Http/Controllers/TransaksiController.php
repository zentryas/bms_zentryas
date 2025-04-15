<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Inertia\Inertia;
use Faker\Factory as Faker;

class TransaksiController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        return Inertia::render('Transaksi/Index', ['transaksi' => $transaksi]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create()
    {
        return Inertia::render('Transaksi/Create');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_penjual' => 'required',
            'nama_pembeli' => 'required',
            'harga' => 'required',
        ]);

        $faker = Faker::create();

        $transaksi = new Transaksi();
        $transaksi->kode_transaksi = 'TRX-' . strtoupper($faker->bothify('??###'));
        $transaksi->nama_penjual = $request->nama_penjual;
        $transaksi->nama_pembeli = $request->nama_pembeli;
        $transaksi->harga = $request->harga;
        $transaksi->save();

        return redirect()->route('transaksi.index')->with([
            'toast' => 'success',
            'message' => 'Data berhasil disimpan!',
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function edit(Transaksi $transaksi)
    {
        return Inertia::render('Transaksi/Edit', ['transaksi' => $transaksi]);
    }

    public function transaksi_update(Request $request, $id)
    {
        $request->validate([
            'nama_penjual' => 'required',
            'nama_pembeli' => 'required',
            'harga' => 'required',
        ]);

        $transaksi = Transaksi::find($id);

        $transaksi->update([
            'nama_penjual' => $request->nama_penjual,
            'nama_pembeli' => $request->nama_pembeli,
            'harga' => $request->harga,
        ]);

        return redirect()->route('transaksi.index')->with([
            'toast' => 'success',
            'message' => 'Data berhasil diupdate!',
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return redirect()->back()->with([
            'toast' => 'success',
            'message' => 'Data berhasil dihapus!',
        ]);
    }
}
