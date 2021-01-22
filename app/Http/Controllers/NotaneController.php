<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Load Package Validator
use App\Notane; // Load Model Rekening Ndoro
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class NotaneController extends Controller
{
    public function UploadNota(Request $request) {

        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
          ]);
  
        
  
          if ($request->file('file')) {
            $imagePath = $request->file('file');
            $imageName = md5(time()).'.jpg';
            $pathe = '/uploads/'.$imageName;
            $path = $request->file->move(public_path('uploads'), $imageName);

          }


  
          Notane::create([
            'nama_gambar' => $imageName,
            'diskripsi' => $imageName,
            'lokasi_gambar' =>  $pathe,
        ]);

          print_r($pathe);

    }

    public function getLastID()
    {
        $data = Notane::select('id_nota')->orderBy('id_nota','DESC')->first();
        return $data;
    }
}
