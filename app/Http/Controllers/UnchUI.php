<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rekening;
use App\Pengguna;
use App\Notane;
use App\Kas;

class UnchUI extends Controller
{
    public function UnchLogin()
    {
        return view('perfect_heena/UnchLogin');     
    }

    public function UnchDashboard()
    {
        return view('perfect_heena/UnchDashboard');   
    }

    public function UnchRekening()
    {
        $data_rekening = Rekening::all();
        return view('perfect_heena/UnchRekening', [ 'data_rek' => $data_rekening ]);   
    }

    public function UnchKasMasuk(Request $request)
    {
        if ($request->session()->has('pengguna')) {
            $oceng_session = session('pengguna');
        }

        $now = new \DateTime('now');
        $month = $now->format('m');
        $year = $now->format('Y');

        
        $data_rekening = Rekening::all();

        $data_kas = Kas::whereYear('tanggal','=', $year)
                    ->whereMonth('tanggal', '=', $month)
                    ->where('tipe','=','kas_masuk')
                    ->join('notanes', 'kas.id_nota', '=', 'notanes.id_nota')
                    ->get();

        
        return view('perfect_heena/UnchKasMasuk', [ 'data_kas' => $data_kas, 'session' => $oceng_session, 'rekening' => $data_rekening ]);   
    }

    public function UnchKasKeluar(Request $request)
    {
        if ($request->session()->has('pengguna')) {
            $oceng_session = session('pengguna');
        }

        $now = new \DateTime('now');
        $month = $now->format('m');
        $year = $now->format('Y');

        
        $data_rekening = Rekening::all();

        $data_kas = Kas::whereYear('tanggal','=', $year)
                    ->whereMonth('tanggal', '=', $month)
                    ->where('tipe','=','kas_keluar')
                    ->join('notanes', 'kas.id_nota', '=', 'notanes.id_nota')
                    ->get();

        
        return view('perfect_heena/UnchKasKeluar', [ 'data_kas' => $data_kas, 'session' => $oceng_session, 'rekening' => $data_rekening ]); 
    }

    public function UnchProfil()
    {
        return view('perfect_heena/UnchProfil');   
    }

    public function UnchRekap()
    {
        return view('perfect_heena/UnchRekap');   
    }
}
