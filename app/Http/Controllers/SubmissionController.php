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
            return view('pages.submission_1', compact('kategoris', 'kategori', 'tim'));
        } elseif ($tim->babak == 2) {
            return view('pages.submission_2', compact('kategoris', 'kategori', 'tim'));
        } else {
            return view('pages.submission_3', compact('kategoris', 'kategori', 'tim'));
        }
        return $tim;
        return $token;
        // TODO : return page submit
    }

    public function submitFile(Request $request, $token)
    {
        $tim = Tim::with('kategori')
            ->where('submissionid', $token)->first();
        if (!$tim) {
            abort(404);
        }

        // Validasi file
        $val_data = $request->validate([
            'file' => 'required|file|max:5120|mimes:pdf,zip,rar', // max 5MB
            'judul' => 'required|string|max:255',
        ]);

        // Tentukan folder berdasarkan babak
        if ($tim->babak == 1) {
            $folder = "submission-1";
            $file = $request->file('file');
            $filename = basename($file->getClientOriginalName()); // hanya nama file, bersih dari "/"
            $path = $file->storeAs($folder, $filename); // simpan file

            $sub = Submission::createSubmissionPenyisihan1(
                $tim->id,
                $request->judul,
                $folder,    // simpan folder saja
                $token,
                $filename   // nama file murni
            );
        } elseif ($tim->babak == 2) {
            $folder = "submission-2";
            $file = $request->file('file');
            $filename = $file ? basename($file->getClientOriginalName()) : null;

            $data = json_encode(['link' => $request->link]);
            $sub = Submission::createSubmissionPenyisihan2(
                $tim->id,
                $request->judul,
                $folder,
                $data,
                $token,
                $filename
            );

            if ($file) {
                $file->storeAs($folder, $filename);
            }
        } else { // final
            $folder = "submission-final";
            $file = $request->file('file');
            $filename = basename($file->getClientOriginalName());
            $path = $file->storeAs($folder, $filename);

            $sub = Submission::createSubmissionFinal(
                $tim->id,
                $request->judul,
                $folder,
                $token,
                $filename
            );
        }

        if ($sub) {
            return redirect('/')->with('success', 'Upload Berhasil');
        } else {
            return redirect()->back()->with('error', 'Upload Gagal');
        }
    }
}
