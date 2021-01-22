<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Load Package Validator
use App\Kas; // Load Model Rekening Ndoro
use Illuminate\Support\Arr; //Load Library array

class KasController extends Controller
{
    
    public function TambahKas(Request $request) {

        $validator = Validator::make($request->all(), [
            'nominal' => 'required',
            'keterangan' => 'required',
            'id_nota' => 'required',
            'id_rekening' => 'required',
            'id_pengguna' => 'required',
            'tipe' => 'required'
        ]);
        
        // API Validator Yeyy Ndoro 

    	if ($validator->fails()) {
           return response()->json([
					'error' => true, 'messages' => $validator->messages() 
				], 400);
           exit;
        }

        Kas::create([
            'nominal' => $request->input('nominal'),
            'keterangan' => $request->input('keterangan'),
            'id_nota' => $request->input('id_nota'),
            'id_rekening' => $request->input('id_rekening'),
            'id_pengguna' => $request->input('id_pengguna'),
            'tipe' => $request->input('tipe'),
        ]);

        return ['error' => false, 'messages' => ['Sukses Menambahkan Rekening! ']];


    }

    public function DeleteKas(Request $request) {

        $validator = Validator::make($request->all(), [
            'id_kas' => 'required|exists:rekenings',
        ]);
        
        // API Validator Yeyy Ndoro 

    	if ($validator->fails()) {
           return response()->json([
					'error' => true, 'messages' => $validator->messages() 
				], 400);
           exit;
        }

        Rekening::where('id_kas', $request->input('id_kas'))->delete();

        return ['error' => false, 'messages' => ['Sukses Menghapus Rekening! ']];

    }
    
}
