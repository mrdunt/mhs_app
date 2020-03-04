<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use Illuminate\Support\Facades\DB;
class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::all();

        return view('mahasiswas.index', compact('mahasiswas'));
    }
    public function data()
    {
        $mahasiswas = Mahasiswa::all();

        return view('mahasiswas.index', compact('mahasiswas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'alamat'=>'required',
            'jurusan'=>'required'
        ]);

        $mahasiswa = new Mahasiswa([
            'name' => $request->get('name'),
            'alamat' => $request->get('alamat'),
            'jurusan' => $request->get('jurusan')
            ]);
        $mahasiswa->save();
        return redirect('/mahasiswas')->with('success', 'Mahasiswa saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mahasiswa = DB::table('mahasiswas')->where('nik', $id)->first();

        return view('mahasiswas.edit', compact('mahasiswa'));
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
        $request->validate([
            'name'=>'required',
            'jurusan'=>'required',
            'alamat'=>'required'
        ]);
        $mahasiswa = DB::table('mahasiswas')->where('nik', $id)->first();
        $mahasiswa->name =  $request->get('name');
        $mahasiswa->jurusan = $request->get('jurusan');
        $mahasiswa->alamat = $request->get('alamat');
        DB::table('mahasiswas')->where('nik', $mahasiswa->nik)->update([
            'name' => $mahasiswa->name,
            'alamat' => $mahasiswa->alamat
            ]);


        return redirect('/index')->with('success', 'Mahasiswa updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $contact = Contact::find($id);
        // $contact->delete();
        DB::table('mahasiswas')->where('nik', '=', $id)->delete();
        return redirect('/index')->with('success', 'Contact deleted!');
    }
}
