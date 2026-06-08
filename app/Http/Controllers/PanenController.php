<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HasilPanen;

class PanenController extends Controller
{
    public function index()
    {
        $dataPanen = HasilPanen::all();
        return view('panen.index', compact('dataPanen'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_komoditas' => 'required',
            'jumlah_kg' => 'required|numeric',
        ]);

        HasilPanen::create([
            'nama_komoditas' => $request->nama_komoditas,
            'jumlah_kg' => $request->jumlah_kg,
            'tanggal_panen' => $request->tanggal_panen,
        ]);

        return redirect('/data-panen');
    }
}