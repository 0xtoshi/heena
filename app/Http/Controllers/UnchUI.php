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
        return view('perfect_heena/UnchRekening');   
    }

    public function UnchKasMasuk()
    {
        return view('perfect_heena/UnchKasMasuk');   
    }

    public function UnchKasKeluar()
    {
        return view('perfect_heena/UnchKasKeluar');   
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
