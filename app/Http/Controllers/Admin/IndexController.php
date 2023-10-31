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
        // ormas monthly
        $January = ormas::whereMonth('created_at', '=', '01')
              ->count();
        $feborm = ormas::whereMonth('created_at', '=', '02')
        ->count();
        $marorm = ormas::whereMonth('created_at', '=', '03')
              ->count();
        $aprorm = ormas::whereMonth('created_at', '=', '04')
        ->count();    
        $meiorm = ormas::whereMonth('created_at', '=', '05')
        ->count();
        $junorm = ormas::whereMonth('created_at', '=', '06')
        ->count();
        $julorm = ormas::whereMonth('created_at', '=', '07')
        ->count();  
         $Augorm = ormas::whereMonth('created_at', '=', '08')
              ->count();
        $septOrm = ormas::whereMonth('created_at', '=', '09')
        ->count();
        $oktoborm =  ormas::whereMonth('created_at', '=', '10')
        ->count();
        $novorm =  ormas::whereMonth('created_at', '=', '11')
        ->count();
        $desorm = ormas::whereMonth('created_at', '=', '12')
        ->count();

        // ibadah monthly
        $Januaryib = ibadah::whereMonth('created_at', '=', '01')
              ->count();
        $febib = ibadah::whereMonth('created_at', '=', '02')
        ->count();
        $marib = ibadah::whereMonth('created_at', '=', '03')
              ->count();
        $aprib = ibadah::whereMonth('created_at', '=', '04')
        ->count();    
        $meiib = ibadah::whereMonth('created_at', '=', '05')
        ->count();
        $junib = ibadah::whereMonth('created_at', '=', '06')
        ->count();
        $julib = ibadah::whereMonth('created_at', '=', '07')
        ->count();  
         $Augib = ibadah::whereMonth('created_at', '=', '08')
              ->count();
        $septib = ibadah::whereMonth('created_at', '=', '09')
        ->count();
        $oktoib =  ibadah::whereMonth('created_at', '=', '10')
        ->count();
        $novib =  ibadah::whereMonth('created_at', '=', '11')
        ->count();
        $desib = ibadah::whereMonth('created_at', '=', '12')
        ->count();
        //penltians monthly
        $Januarypen = penelitian::whereMonth('created_at', '=', '01')
        ->count();
        $febpen = penelitian::whereMonth('created_at', '=', '02')
        ->count();
       $marpen = penelitian::whereMonth('created_at', '=', '03')
        ->count();
        $aprpen = penelitian::whereMonth('created_at', '=', '04')
       ->count();    
        $meipen = penelitian::whereMonth('created_at', '=', '05')
        ->count();
        $junpen = penelitian::whereMonth('created_at', '=', '06')
       ->count();
       $julpen = penelitian::whereMonth('created_at', '=', '07')
        ->count();
        $Augpen = penelitian::whereMonth('created_at', '=', '08')
        ->count();
        $septpen = penelitian::whereMonth('created_at', '=', '09')
       ->count();
       $oktopen =  penelitian::whereMonth('created_at', '=', '10')
       ->count();
        $novpen =  penelitian::whereMonth('created_at', '=', '11')
       ->count();
       $despen = penelitian::whereMonth('created_at', '=', '12')
       ->count();
       //keramiaians monthly
       $Januaryker = keramaian::whereMonth('created_at', '=', '01')
       ->count();
       $febker = keramaian::whereMonth('created_at', '=', '02')
       ->count();
      $marker = keramaian::whereMonth('created_at', '=', '03')
       ->count();
       $aprker = keramaian::whereMonth('created_at', '=', '04')
      ->count();    
       $meiker = keramaian::whereMonth('created_at', '=', '05')
       ->count();
       $junker = keramaian::whereMonth('created_at', '=', '06')
      ->count();
      $julker = keramaian::whereMonth('created_at', '=', '07')
       ->count();
       $Augker = keramaian::whereMonth('created_at', '=', '08')
       ->count();
       $septker = keramaian::whereMonth('created_at', '=', '09')
      ->count();
      $oktoker =  keramaian::whereMonth('created_at', '=', '10')
      ->count();
       $novker =  keramaian::whereMonth('created_at', '=', '11')
      ->count();
      $desker = keramaian::whereMonth('created_at', '=', '12')
      ->count();
      //YEAR REAKPAITULATION
      $ormas2023 = ormas::whereYear('created_at','=', '2023')->count();
      $ibadah2023= ibadah::whereYear('created_at','=', '2023')->count();
      $keramian2023= keramaian::whereYear('created_at','=', '2023')->count();
      $penelitian2023= penelitian::whereYear('created_at','=', '2023')->count();

        
       
            return view('admin.index', compact(
                'ormases','ibadahs','penelitians','keramaians','validasi1','selesai1','belum_validasi1',
                'validasi2','selesai2','belum_validasi2','validasi3','selesai3','belum_validasi3',
                'validasi4','selesai4','belum_validasi4','January','Augorm','septOrm',
                'feborm','marorm','aprorm','meiorm','junorm','julorm','oktoborm','novorm','desorm','Januaryib',
                'febib','marib','aprib','meiib','junib','julib','Augib','septib','oktoib','novib','desib',
                'Januarypen','febpen','meipen','marpen','aprpen','meipen','junpen','julpen','Augpen','septpen',
                 'oktopen','novpen','despen','Januaryker','febker','marker','aprker','meiker','junker','julker',
                'Augker','septker','oktoker','novker','desker','ormas2023','ibadah2023','keramian2023','penelitian2023' ));
    }
}
