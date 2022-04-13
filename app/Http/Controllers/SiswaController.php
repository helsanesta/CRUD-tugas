<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::all();
        return view('list-siswa', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-siswa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:100',
            'nrp' => 'required|numeric',
            'semester' => 'required|numeric|min:1|max:8',
            'jurusan' => 'required|max:100',
            'ipk' => 'required|digits_between:2,4:'
        ]);
        Siswa::create($validatedData);
        return redirect()->route('home')->with('tambah_data', 'Penambahan Data Siswa berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Siswa::where('id', $id)->first();
        return view('detail-siswa', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Siswa::where('id', $id)->first();
        return view('edit-siswa', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:100',
            'nrp' => 'required|numeric',
            'semester' => 'required|numeric|min:1|max:8',
            'jurusan' => 'required|max:100',
            'ipk' => 'required|digits_between:2,4:'
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($validatedData);
        return redirect()->route('home')->with('edit_data', 'Pengeditan Data Siswa berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
		return redirect()->route('home')->with('hapus_data', 'Penghapusan Data Siswa berhasil');
    }
}
