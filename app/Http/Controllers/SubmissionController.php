<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Submission;
use App\Tim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubmissionController extends Controller
{
    public function getPageSubmit($token)
    {
        $kategoris = Kategori::get();
        $tim = Tim::with('kategori')
            ->where('submissionid', $token)->get()->first();
        $kategori = Kategori::with('tims')
            ->where('id', $tim->id_kategori)->get()->first();
        if ($tim == null) {
            abort(404);
        }
        if ($tim->babak == 1) {
            return view('pages.submission_1', compact('kategoris','kategori', 'tim'));
        } elseif ($tim->babak == 2){
            return view('pages.submission_2', compact('kategoris','kategori', 'tim'));
        } else {
            return view('pages.submission_3', compact('kategoris','kategori', 'tim'));
        }
        return $tim;
        return $token;
        // TODO : return page submit
    }

    public function submitFile(Request $request, $token)
    {
        $kategoris = Kategori::get();
        $tim = Tim::with('kategori')
            ->where('submissionid', $token)->get()->first();
        if ($tim == null) {
            abort(404);
        }

        if($tim->babak == 1){
            $val_data = $request->validate([
                'file' => 'required|mimes:pdf,zip,rar'
            ]);

            $path = "submission-1";

            $sub = Submission::createSubmissionPenyisihan1($tim->id, $request->judul, $path, $token, $request->file('file'));

            if($sub){
                return redirect('/')->with('success', 'Upload Berhasil');
            } else{
                return redirect()->back()->with('error', 'Upload Gagal');
            }
        } elseif ($tim->babak == 2){
            if($tim->id_kategori == 2) {
                $data = json_encode(['link' => $request->link]);
                $path = json_encode(['link2' => $request->link2]);
    
                $sub = Submission::createSubmissionPenyisihan2($tim->id, $request->judul, $path, $data, $token);
                if($sub){
                    return redirect('/')->with('success', 'Upload Berhasil');
                } else{
                    return redirect()->back()->with('error', 'Upload Gagal');
                }
            } else {
                $val_data = $request->validate([
                'file' => 'required|mimes:zip,pdf'
                ]);
    
                $data = json_encode(['link' => $request->link]);
    
                $path = "submission-2";
    
                $sub = Submission::createSubmissionPenyisihan2($tim->id, $request->judul, $path, $data, $token, $request->file('file'));
                if($sub){
                    return redirect('/')->with('success', 'Upload Berhasil');
                } else{
                    return redirect()->back()->with('error', 'Upload Gagal');
                }
            }

        } else {
            $val_data = $request->validate([
                'file' => 'required|mimes:zip,pdf'
            ]);

            $path = "submission-final";

            $sub = Submission::createSubmissionFinal($tim->id, $request->judul, $path, $token, $request->file('file'));

            if($sub){
                return redirect('/')->with('success', 'Upload Berhasil');
            } else{
                return redirect()->back()->with('error', 'Upload Gagal');
            }
        }
    }
}
