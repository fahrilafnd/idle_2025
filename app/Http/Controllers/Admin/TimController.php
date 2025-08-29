<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mahasiswa;
use App\Tim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.tims');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tim = Tim::with('pesertas.mahasiswa', 'kategori', 'submissions')->findOrFail($id);
//        return $tim;
        return view('admin.pages.show_tim', compact('tim'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Session::put('last_edit_page_url', url()->previous());
        $tim = Tim::with('mahasiswa', 'pesertas.mahasiswa')->findOrFail($id);
        $pesertas = [];
        foreach($tim->pesertas as $peserta){
            if($peserta->nim != $tim->mahasiswa->nim){
                array_push($pesertas, $peserta);
            }
        }

        return view('admin.pages.edit_tim', compact('tim', 'pesertas'));
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
        if(count($tim = Tim::where('ketua_tim', $request->ketua)->get()) > 0){
            if($tim->first()->ketua_tim != $request->ketua){
                return redirect()->back()->with('error', 'Tidak boleh merangkap sebagai ketua');
            }
        }
        Tim::updateTim($id, $request->nama_tim, $request->ketua);
        return redirect()->route('admin.tim.index')->with('success', 'Tim Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tim::deleteTim($id);
        return redirect()->route('admin.tim.index')->with('success', 'Tim Berhasil Dihapus');
    }

    public function tandai($id)
    {
        $tim = Tim::with('pesertas')->findOrFail($id);
        if($tim->starred == 0){
            if($tim->update(['starred' => 1])){
                return redirect()->back();
            }
        }else{
            if($tim->update(['starred' => 0])){
                return redirect()->back();
            }
        }
    }
}
