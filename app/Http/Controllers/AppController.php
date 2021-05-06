<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class AppController extends Controller
{
    public function berandablog()
    {
        return view('blogfrontend.beranda-blog');
    }

    public function profilblog()
    {
        return view('blogfrontend.profil-blog');
    }

    public function layananblog()
    {
        return view('blogfrontend.layanan-blog');
    }

    public function informasiblog()
    {
        return view('blogfrontend.informasi-blog');
    }

    public function kontakblog()
    {
        return view('blogfrontend.kontak-blog');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function dashboardanggota()
    {
        return view('anggotafrontend.dashboard-anggota');
    }

    public function simulasianggota()
    {
        return view('anggotafrontend.simulasi-anggota');
    }

    //Simpanan
    public function simpanankuanggota()
    {
        return view('anggotafrontend.simpanan.simpananku-anggota');
    }

    public function historyperubahansimpanananggota()
    {
        return view('anggotafrontend.simpanan.historyperubahan-anggota');
    }

    public function historypenarikansimpanananggota()
    {
        return view('anggotafrontend.simpanan.historypenarikan-anggota');
    }

    public function accountstatementsimpanananggota()
    {
        return view('anggotafrontend.simpanan.accountstatement-anggota');
    }

    public function linksimpanankuanggota()
    {
        return view('anggotafrontend.link.simpanan.linksimpananku-anggota');
    }

    //Simplus
    public function simpluskuanggota()
    {
        return view('anggotafrontend.simplus.simplusku-anggota');
    }

    public function accountstatementsimplusanggota()
    {
        return view('anggotafrontend.simplus.accountstatement-anggota');
    }

    public function historypengajuansimplusanggota()
    {
        return view('anggotafrontend.simplus.historypengajuan-anggota');
    }

    public function historypencairansimplusanggota()
    {
        return view('anggotafrontend.simplus.historypencairan-anggota');
    }

    public function linksimpluskuanggota()
    {
        return view('anggotafrontend.link.simplus.linksimplusku-anggota');
    }


    //Pinjaman
    public function pinjamankuanggota()
    {
        return view('anggotafrontend.pinjaman.pinjamanku-anggota');
    }

    public function linkpinjamankuanggota()
    {
        return view('anggotafrontend.link.pinjaman.linkpinjamanku-anggota');
    }

    public function historypengajuanpinjamananggota()
    {
        return view('anggotafrontend.pinjaman.historypengajuan-anggota');
    }

    public function historypembayaranpinjamananggota()
    {
        return view('anggotafrontend.pinjaman.historypembayaran-anggota');
    }

    public function historypelunasanpinjamananggota()
    {
        return view('anggotafrontend.pinjaman.historypelunasan-anggota');
    }

    public function jadwalangsuranpinjamananggota()
    {
        return view('anggotafrontend.pinjaman.jadwalangsuran-anggota');
    }

    //Pengajuan
    public function pengajuankuanggota()
    {
        return view('anggotafrontend.pengajuan.pengajuanku-anggota');
    }

    public function perubahansimpanananggota()
    {
        return view('anggotafrontend.pengajuan.perubahansimpanan-anggota');
    }

    public function penarikansimpanananggota()
    {
        return view('anggotafrontend.pengajuan.penarikansimpanan-anggota');
    }

    public function pengajuansimplusanggota()
    {
        return view('anggotafrontend.pengajuan.pengajuansimplus-anggota');
    }

    public function pembukaansimplusanggota()
    {
        return view('anggotafrontend.pengajuan.pembukaansimplus-anggota');
    }

    public function pencairansimplusanggota()
    {
        return view('anggotafrontend.pengajuan.pencairansimplus-anggota');
    }

    public function pinjamanbaruanggota()
    {
        return view('anggotafrontend.pengajuan.pinjamanbaru-anggota');
    }

    public function pengajuanpinjamananggota()
    {
        return view('anggotafrontend.pengajuan.pengajuanpinjaman-anggota');
    }

    public function rehabpinjamananggota()
    {
        return view('anggotafrontend.pengajuan.rehabpinjaman-anggota');
    }

    public function pembayaranangsurananggota()
    {
        return view('anggotafrontend.pengajuan.pembayaranangsuran-anggota');
    }

    public function pelunasanpinjamananggota()
    {
        return view('anggotafrontend.pengajuan.pelunasanpinjaman-anggota');
    }
}
