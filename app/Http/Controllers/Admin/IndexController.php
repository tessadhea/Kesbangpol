<?php

namespace App\Http\Controllers\Admin;

use App\Models\ormas;
use App\Models\ibadah;
use App\Models\keramaian;
use App\Models\penelitian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
        $ormases = ormas::all()->count();
        $ibadahs = ibadah::all()->count();
        $penelitians = penelitian::all()->count();
        $keramaians = keramaian::all()->count();
        $validasi1 = DB::table('ormas')->select()->where('status', 'validasi')->count();
        $selesai1 = DB::table('ormas')->select()->where('status', 'selesai')->count();
        $validasi2 = DB::table('ibadahs')->select()->where('status', 'validasi')->count();
        $selesai2 = DB::table('ibadahs')->select()->where('status', 'selesai')->count();
        $belum_validasi2= DB::table('ibadahs')->select()->where('status', 'belum_validasi')->count();
        $belum_validasi1 = DB::table('ormas')->select()->where('status', 'belum_validasi')->count();
        $validasi3 = DB::table('penelitians')->select()->where('status', 'validasi')->count();
        $selesai3 = DB::table('penelitians')->select()->where('status', 'selesai')->count();
        $belum_validasi3 = DB::table('penelitians')->select()->where('status', 'belum_validasi')->count();
        $validasi4 = DB::table('keramaians')->select()->where('status', 'validasi')->count();
        $selesai4 = DB::table('keramaians')->select()->where('status', 'selesai')->count();
        $belum_validasi4 = DB::table('keramaians')->select()->where('status', 'belum_validasi')->count();
        $January = ormas::whereMonth('created_at', '=', '01')
              ->count();
         $Augorm = ormas::whereMonth('created_at', '=', '08')
              ->count();
        $septOrm = ormas::whereMonth('created_at', '=', '09')
        ->count();
        
       
            return view('admin.index', compact(
                'ormases','ibadahs','penelitians','keramaians','validasi1','selesai1','belum_validasi1','validasi2','selesai2','belum_validasi2','validasi3','selesai3','belum_validasi3','validasi4','selesai4','belum_validasi4','January','Augorm','septOrm'));
    }
}
