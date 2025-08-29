<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Charts\DoughnutChart;
use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $totalTimChart = new DoughnutChart;
        $totalPesertaChart = new DoughnutChart;

        $dataController = new AjaxController();
        $dataTotalTim = $dataController->getTimsData();
        $dataTotalPeserta = $dataController->getMahasiswasData();

        $totalPesertaChart->labels($dataTotalPeserta["angkatan"]);

        foreach ($dataTotalPeserta["data"] as $prodi => $dataByProdi){
            $dataAngkatan = [];
            foreach ($dataByProdi as $angkatan => $value){
                array_push($dataAngkatan, $value);
            }
            $totalPesertaChart->dataset($prodi, 'column', $dataAngkatan);
        }

        $totalTimChart->labels($dataTotalTim["label"]);
        $totalTimChart->dataset('Total Tim', 'pie', $dataTotalTim["value"])->color($dataTotalTim["color"]);

        return view('admin.pages.dashboard', compact('totalTimChart', 'totalPesertaChart'));
    }
    public function ChangePassword(){
      return view('auth.passwords.change');
    }
    public function PostPassword(Request $request){
        $id = $request['user'];
        $user = User::findOrFail($id);
        if( $user && strlen($request['password'])>= 8 ){
            $user->update([
              'password' => Hash::make($request['password']),
            ]);
            return redirect()->route('admin.dashboard')->with('success', 'Kata sandi berhasil diubah');
        }else{
            return redirect()->route('admin.dashboard')->with('error', 'Kesalahan dalam mengubah sandi');
        }
    }
}
