<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $validationRules = [
        'judul' => 'required',
        'penulis' => 'required',
        'penerbit' => 'required',
        'tahun_terbit' => 'required',
        'jumlah' => 'required',
    ];

 public function index()
    {
        $data['dataBuku'] = Buku::all();
        return view('buku.index', $data);
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
      // Validasi input sesuai aturan
        $validatedData = $request->validate($this->validationRules);

        // Simpan ke database
        Buku::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('buku.index')->with('success', 'Penambahan Data Berhasil!');
    }

    public function edit($id)
    {
        $data['dataBuku'] = Buku::findOrFail($id);
        return view('buku.edit', $data);
    }

    public function update(Request $request, $id)
    {
        // Validasi dengan pengecualian unique email untuk data ini


        $validatedData = $request->validate($rules);

        // Update data
        $buku = Buku::findOrFail($id);
        $buku->update($validatedData);

        return redirect()->route('buku.index')->with('success', 'Perubahan Data Berhasil!');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Data berhasil dihapus!');
    }
}
