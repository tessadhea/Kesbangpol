<?php

namespace App\Http\Controllers;

use App\Models\ormas;
use App\Models\rejected;
use App\Models\surat3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;



class OrmasController extends Controller
{ 
    public function index(){
        $this->authorize('read_ormas');
        $user = auth()->user();
        $firstRole = $user->roles->first()->name;
       
         //logic user
        if($firstRole == 'user'){
            $ormases = ormas::latest('updated_at')->where('User_id', auth()->user()->id)->paginate(10);
            if(request('nama')){
                $ormases = ormas::where('nama_ormas','like','%'.request('nama').'%')->where('User_id', auth()->user()->id)->paginate(10);
            }
            $validasi = DB::table('ormas')->select()->where('status', 'validasi')->count();
            $selesai = DB::table('ormas')->select()->where('status', 'selesai')->count();
            $belum_validasi = DB::table('ormas')->select()->where('status', 'belum_validasi')->count();
            $this->authorize('read_ormas');
            return view('ormas.index', compact('ormases','validasi','selesai','belum_validasi'));
        }//endlogicuser

        $ormases = ormas::latest('updated_at')->paginate(10);
        
        if(request('nama')){
            $ormases = ormas::where('nama_ormas','like','%'.request('nama').'%')->paginate(10);
        }
        $validasi = DB::table('ormas')->select()->where('status', 'validasi')->count();
        $selesai = DB::table('ormas')->select()->where('status', 'selesai')->count();
        $belum_validasi = DB::table('ormas')->select()->where('status', 'belum_validasi')->count();
    return view('ormas.index', compact('ormases','validasi','selesai','belum_validasi'));
}
public function search(ormas $status){
    $user = auth()->user();
    $firstRole = $user->roles->first()->name;

    if($firstRole == 'user'){
         $ormases = ormas::where('status', 'selesai')->where('User_id', auth()->user()->id)->paginate(10);
    $validasi = DB::table('ormas')->select()->where('status', 'validasi')->count();
    $selesai = DB::table('ormas')->select()->where('status', 'selesai')->count();
    $belum_validasi = DB::table('ormas')->select()->where('status', 'belum_validasi')->count();
    $this->authorize('read_ormas');
return view('ormas.index', compact('ormases','validasi','selesai','belum_validasi'));
    }
   
    $ormases = ormas::where('status', 'selesai')->paginate(10);
    $validasi = DB::table('ormas')->select()->where('status', 'validasi')->count();
    $selesai = DB::table('ormas')->select()->where('status', 'selesai')->count();
    $belum_validasi = DB::table('ormas')->select()->where('status', 'belum_validasi')->count();
    $this->authorize('read_ormas');
return view('ormas.index', compact('ormases','validasi','selesai','belum_validasi'));
}
public function search1(ormas $status){
   
    $ormases = ormas::where('status', 'belum_validasi')->paginate(10);
    $validasi = DB::table('ormas')->select()->where('status', 'validasi')->count();
    $selesai = DB::table('ormas')->select()->where('status', 'selesai')->count();
    $belum_validasi = DB::table('ormas')->select()->where('status', 'belum_validasi')->count();
    $this->authorize('read_ormas');
return view('ormas.index', compact('ormases','validasi','selesai','belum_validasi'));
}
public function search2(ormas $status){
    $user = auth()->user();
    $firstRole = $user->roles->first()->name;
    if($firstRole =="user"){
        $ormases = ormas::where('status', 'validasi')->paginate(10);
    $validasi = DB::table('ormas')->select()->where('status', 'validasi')->count();
    $selesai = DB::table('ormas')->select()->where('status', 'selesai')->count();
    $belum_validasi = DB::table('ormas')->select()->where('status', 'belum_validasi')->count();
    $this->authorize('read_ormas');
return view('ormas.index', compact('ormases','validasi','selesai','belum_validasi'));
    }
    $ormases = ormas::where('status', 'validasi')->paginate(10);
    $validasi = DB::table('ormas')->select()->where('status', 'validasi')->count();
    $selesai = DB::table('ormas')->select()->where('status', 'selesai')->count();
    $belum_validasi = DB::table('ormas')->select()->where('status', 'belum_validasi')->count();
    $this->authorize('read_ormas');
return view('ormas.index', compact('ormases','validasi','selesai','belum_validasi'));
}
public function create(){
    $user_id = auth()->user()->id;
    $this->middleware('can:tambah_ormas');
    return view('ormas.create',compact('user_id'));



}
public function store(Request $request){
    
    $validated = $request->validate([

                'nama_ormas' => 'unique:ormas|required|min:5|max:50',
                'nama_ketua' => 'required|min:5|max:50',
                'nama_sek' => 'required|min:5|max:50',
                'nama_bend' => 'required|min:5|max:50',
                'bid' => 'required|min:5|max:50',
                'alamat_domisili' => 'required',
                'no_hp' => 'required|min:12|max:20' ,
                'no_hp2' => 'required|min:12|max:20' ,
                'no_hp3' => 'required|min:12|max:20' ,
                'scan_surat_permohonan' => 'required|mimes:pdf',
                'scan_sk_mendagri' =>  'required|mimes:pdf',
                'ad_art' => 'required|mimes:pdf',
                'proker' => 'required|mimes:pdf',
                'ktp' => 'required|mimes:pdf',
                'npwp' => 'required|mimes:pdf',
                'sk_domisili' => 'required|mimes:pdf',
                'foto_kantor' =>'required|mimes:pdf',
                'sk_pernyataan' => 'required|mimes:pdf',
                'Form_ormas' => 'required|mimes:pdf',
               


                
                
              


            ]);

            //ssp
            $filename1 = time().$request->file('scan_surat_permohonan')->getClientOriginalName();
            $path1 = $request->file('scan_surat_permohonan')->storeAs('file_ormas/ssp',$filename1,'public');
            //mendagri
            $filename2 = time().$request->file('scan_sk_mendagri')->getClientOriginalName();
            $path2 = $request->file('scan_sk_mendagri')->storeAs('file_ormas/sk_mendagri',$filename2,'public');
            //ad_art
            $filename3 = time().$request->file('ad_art')->getClientOriginalName();
            $path3 = $request->file('ad_art')->storeAs('file_ormas/ad_art',$filename3,'public');
            //proker
            $filename4 = time().$request->file('proker')->getClientOriginalName();
            $path4 = $request->file('proker')->storeAs('file_ormas/proker',$filename4,'public');
            //ktp
            $filename5 = time().$request->file('ktp')->getClientOriginalName();
            $path5 = $request->file('ktp')->storeAs('file_ormas/ktp',$filename5,'public');
            //npwp
            $filename6 = time().$request->file('npwp')->getClientOriginalName();
            $path6 = $request->file('npwp')->storeAs('file_ormas/npwp',$filename6,'public');
            //sk_domisili
            $filename7 = time().$request->file('sk_domisili')->getClientOriginalName();
            $path7 = $request->file('sk_domisili')->storeAs('file_ormas/sk_domisili',$filename7,'public');
            //foto_kantor
            $filename8 = time().$request->file('foto_kantor')->getClientOriginalName();
            $path8 = $request->file('foto_kantor')->storeAs('file_ormas/foto_kantor',$filename8,'public');
            //sk_pernyataan 
            $filename9 = time().$request->file('sk_pernyataan')->getClientOriginalName();
            $path9= $request->file('sk_pernyataan')->storeAs('file_ormas/sk_pernyataan',$filename9,'public');
            //form ormas
            $filename10 = time().$request->file('Form_ormas')->getClientOriginalName();
            $path10= $request->file('Form_ormas')->storeAs('file_ormas/Form_ormas',$filename10,'public');

           
           
           
           //moveit
            $validated["scan_surat_permohonan"] = $filename1;
            $validated["scan_sk_mendagri"] = $filename2;
            $validated["ad_art"] = $filename3;
            $validated["proker"] = $filename4;
            $validated["ktp"] = $filename5;
            $validated["npwp"] = $filename6;
            $validated["sk_domisili"] = $filename7;
            $validated["foto_kantor"] = $filename8;
            $validated["sk_pernyataan"] = $filename9;
            $validated["Form_ormas"] = $filename10;
            $validated["User_id"] = auth()->user()->id;





    ormas::create($validated);
session()->flash('success', 'DATA BERHASIL DI TAMBAHKAN');
    return to_route('ormas.index');

    



}


public function edit(ormas $ormas, rejected $rejected){
  
    $this->authorize('edit_ormas');
    $pesans = $ormas->rejected;

    return view('ormas.edit', compact('ormas','pesans'));




}
public function validasi(ormas $ormas ){
   
    return view('ormas.surat', compact('ormas'));
   
    // $ormas->update(['status' => 'validasi']);
    // session()->flash('success', 'tervalidasi');
    // return to_route('ormas.index'); 



}
public function pdf(ormas $ormas , surat3 $surat){

    $surat = $ormas->surat3;
    $dateraw = $ormas->surat3->date;
    $start= date_create($dateraw);
    $date = date_format($start,"d-m-Y");
   return view('pdf.ormaspdf', compact('ormas','surat','date'));
 

    


}
public function selesai(ormas $ormas ){

  
    $ormas->update(['status' => 'selesai']);
    session()->flash('success', 'terselesaikan');
    return to_route('ormas.index'); 



}
public function destroy(ormas $ormas)
 
 {

$ormas->delete();
session()->flash('success', 'Your data ormas has been deleted');
return back();


 }
 public function download($filename){

    $filePath = 'file_ormas/ssp/' . $filename;
    if (Storage::disk('public')->exists($filePath)) {
        // Set the appropriate Content-Type header
        $mimeType = Storage::mimeType($filePath);
        $headers = [
            'Content-Type' => $mimeType,
        ];

        // Download the file
        return Storage::download($filePath, $filename, $headers);
    }

    // If the file does not exist, redirect or display an error message
    return redirect('ormas.index')->back()->with('error', 'File not found.');
}
public function download1($filename){

    $filePath = 'file_ormas/sk_mendagri/' . $filename;
    if (Storage::disk('public')->exists($filePath)) {
        // Set the appropriate Content-Type header
        $mimeType = Storage::mimeType($filePath);
        $headers = [
            'Content-Type' => $mimeType,
        ];

        // Download the file
        return Storage::download($filePath, $filename, $headers);
    }

    // If the file does not exist, redirect or display an error message
    session()->flash('success', 'data tidak ada');
    return to_route('ormas.index'); 
}
public function download2($filename){

    $filePath = 'file_ormas/ad_art/' . $filename;
    if (Storage::disk('public')->exists($filePath)) {
        // Set the appropriate Content-Type header
        $mimeType = Storage::mimeType($filePath);
        $headers = [
            'Content-Type' => $mimeType,
        ];

        // Download the file
        return Storage::download($filePath, $filename, $headers);
    }

    // If the file does not exist, redirect or display an error message
    session()->flash('success', 'data tidak ada');
    return to_route('ormas.index'); 
}
public function download3($filename){

    $filePath = 'file_ormas/proker/' . $filename;
    if (Storage::disk('public')->exists($filePath)) {
        // Set the appropriate Content-Type header
        $mimeType = Storage::mimeType($filePath);
        $headers = [
            'Content-Type' => $mimeType,
        ];

        // Download the file
        return Storage::download($filePath, $filename, $headers);
    }

    // If the file does not exist, redirect or display an error message
    session()->flash('success', 'data tidak ada');
    return to_route('ormas.index'); 
}
public function download4($filename){

    $filePath = 'file_ormas/ktp/' . $filename;
    if (Storage::disk('public')->exists($filePath)) {
        // Set the appropriate Content-Type header
        $mimeType = Storage::mimeType($filePath);
        $headers = [
            'Content-Type' => $mimeType,
        ];

        // Download the file
        return Storage::download($filePath, $filename, $headers);
    }

    // If the file does not exist, redirect or display an error message
    session()->flash('success', 'data tidak ada');
    return to_route('ormas.index'); 
}
public function download5($filename){

    $filePath = 'file_ormas/npwp/' . $filename;
    if (Storage::disk('public')->exists($filePath)) {
        // Set the appropriate Content-Type header
        $mimeType = Storage::mimeType($filePath);
        $headers = [
            'Content-Type' => $mimeType,
        ];

        // Download the file
        return Storage::download($filePath, $filename, $headers);
    }

    // If the file does not exist, redirect or display an error message
    session()->flash('success', 'data tidak ada');
    return to_route('ormas.index'); 
}
public function download6($filename){

    $filePath = 'file_ormas/sk_domisili/' . $filename;
    if (Storage::disk('public')->exists($filePath)) {
        // Set the appropriate Content-Type header
        $mimeType = Storage::mimeType($filePath);
        $headers = [
            'Content-Type' => $mimeType,
        ];

        // Download the file
        return Storage::download($filePath, $filename, $headers);
    }

    // If the file does not exist, redirect or display an error message
    session()->flash('success', 'data tidak ada');
    return to_route('ormas.index'); 
}
public function download7($filename){

    $filePath = 'file_ormas/foto_kantor/' . $filename;
    if (Storage::disk('public')->exists($filePath)) {
        // Set the appropriate Content-Type header
        $mimeType = Storage::mimeType($filePath);
        $headers = [
            'Content-Type' => $mimeType,
        ];

        // Download the file
        return Storage::download($filePath, $filename, $headers);
    }

    // If the file does not exist, redirect or display an error message
    session()->flash('success', 'data tidak ada');
    return to_route('ormas.index'); 
}
public function download8($filename){

    $filePath = 'file_ormas/sk_pernyataan/' . $filename;
    if (Storage::disk('public')->exists($filePath)) {
        // Set the appropriate Content-Type header
        $mimeType = Storage::mimeType($filePath);
        $headers = [
            'Content-Type' => $mimeType,
        ];

        // Download the file
        return Storage::download($filePath, $filename, $headers);
    }

    // If the file does not exist, redirect or display an error message
    session()->flash('success', 'data tidak ada');
    return to_route('ormas.index'); 
}
public function download9($filename){

    $filePath = 'file_ormas/Form_ormas/' . $filename;
    if (Storage::disk('public')->exists($filePath)) {
        // Set the appropriate Content-Type header
        $mimeType = Storage::mimeType($filePath);
        $headers = [
            'Content-Type' => $mimeType,
        ];

        // Download the file
        return Storage::download($filePath, $filename, $headers);
    }

    // If the file does not exist, redirect or display an error message
    session()->flash('success', 'data tidak ada');
    return to_route('ormas.index'); 
}

public function view($filename){
  $path = 'file_ormas/ssp/';
    return view('ormas.view', compact('filename','path'));


}
public function view1($filename){
    $path = 'file_ormas/sk_mendagri/';
      return view('ormas.view', compact('filename','path'));
  
  
  }
  public function view2($filename){
    $path = 'file_ormas/ad_art/';
      return view('ormas.view', compact('filename','path'));
  
  
  }
  public function view3($filename){
    $path = 'file_ormas/proker/';
      return view('ormas.view', compact('filename','path'));
  
  
  }
  public function view4($filename){
    $path = 'file_ormas/ktp/';
      return view('ormas.view', compact('filename','path'));
  
  
  }
  public function view5($filename){
    $path = 'file_ormas/npwp/';
      return view('ormas.view', compact('filename','path'));
  
  
  }
  public function view6($filename){
    $path = 'file_ormas/sk_domisili/';
      return view('ormas.view', compact('filename','path'));
  
  
  }
  public function view7($filename){
    $path = 'file_ormas/foto_kantor/';
      return view('ormas.view', compact('filename','path'));
  
  
  }
  public function view8($filename){
    $path = 'file_ormas/sk_pernyataan/';
      return view('ormas.view', compact('filename','path'));
  
  
  }
  public function view9($filename){
    $path = 'file_ormas/Form_ormas/';
      return view('ormas.view', compact('filename','path'));
  
  
  }
  public function update(Request $request  , ormas $ormas ){

    $validated = $request->validate([ 'nama_ormas' => 'required|min:5|max:50',
    'nama_ketua' => 'required|min:5|max:50',
    'nama_sek' => 'required|min:5|max:50',
    'nama_bend' => 'required|min:5|max:50',
    'alamat_domisili' => 'required',
    'no_hp' => 'required|min:12|max:20' ,
    'no_hp2' => 'required|min:12|max:20' ,
    'no_hp3' => 'required|min:12|max:20' ,
    'scan_surat_permohonan' => 'mimes:pdf',
    'scan_sk_mendagri' =>  'mimes:pdf',
    'ad_art' => 'mimes:pdf',
    'proker' => 'mimes:pdf',
    'ktp' => 'mimes:pdf',
    'npwp' => 'mimes:pdf',
    'sk_domisili' => 'mimes:pdf',
    'foto_kantor' =>'mimes:pdf',
    'sk_pernyataan' => 'mimes:pdf',
    'Form_ormas' => 'mimes:pdf',]);
      //ssp
      if ( $request->file('scan_surat_permohonan') != '' ) {
        $filename1 = time().$request->file('scan_surat_permohonan')->getClientOriginalName();
      $path1 = $request->file('scan_surat_permohonan')->storeAs('file_ormas/ssp',$filename1,'public');
      $validated["scan_surat_permohonan"] = $filename1;

      }if($request->file('scan_sk_mendagri') != '')  {
         $filename2 = time().$request->file('scan_sk_mendagri')->getClientOriginalName();
        $path2 = $request->file('scan_sk_mendagri')->storeAs('file_ormas/sk_mendagri',$filename2,'public');
        $validated["scan_sk_mendagri"] = $filename2;
    }if($request->file('ad_art') != '')  {
        $filename3 = time().$request->file('ad_art')->getClientOriginalName();
        $path3 = $request->file('ad_art')->storeAs('file_ormas/ad_art',$filename3,'public');
        $validated["ad_art"] = $filename3;
   }if($request->file('proker') != '')  {
    $filename4 = time().$request->file('proker')->getClientOriginalName();
      $path4 = $request->file('proker')->storeAs('file_ormas/proker',$filename4,'public');
      $validated["proker"] = $filename4;
}if($request->file('ktp') != '')  {
    $filename5 = time().$request->file('ktp')->getClientOriginalName();
    $path5 = $request->file('ktp')->storeAs('file_ormas/ktp',$filename5,'public');
    $validated["ktp"] = $filename5;
}if($request->file('npwp') != '')  {
    $filename6 = time().$request->file('npwp')->getClientOriginalName();
    $path6 = $request->file('npwp')->storeAs('file_ormas/npwp',$filename6,'public');
    $validated["npwp"] = $filename6;
      
}if ($request->file('sk_domisili') != '') {
    $filename7 = time().$request->file('sk_domisili')->getClientOriginalName();
    $path7 = $request->file('sk_domisili')->storeAs('file_ormas/sk_domisili',$filename7,'public');
    $validated["sk_domisili"] = $filename7;
}if ($request->file('foto_kantor') != '') {
    $filename8 = time().$request->file('foto_kantor')->getClientOriginalName();
    $path8 = $request->file('foto_kantor')->storeAs('file_ormas/foto_kantor',$filename8,'public');
    $validated["foto_kantor"] = $filename8;
}if ($request->file('sk_pernyataan') != '') {
    $filename9 = time().$request->file('sk_pernyataan')->getClientOriginalName();
    $path9= $request->file('sk_pernyataan')->storeAs('file_ormas/sk_pernyataan',$filename9,'public');
    $validated["sk_pernyataan"] = $filename9;
   
}if ($request->file('Form_ormas') != '') {
    $filename10 = time().$request->file('Form_ormas')->getClientOriginalName();
    $path10= $request->file('Form_ormas')->storeAs('file_ormas/Form_ormas',$filename10,'public');
    $validated["Form_ormas"] = $filename10;
}
$ormas->update(['status' => 'belum_validasi']);
  
    $ormas->update($validated);
    

    session()->flash('success', 'Your ormas data has been updated');
    return to_route('ormas.index'); 


 }
 public function tolak(ormas $ormas ){
  

  
   
    
    return view('ormas.tolak',compact('ormas')); 



}
public function send(Request $request, ormas $ormas  ){
 
    $request["ormas_id"] = $ormas->id;
    rejected::create($request->all());
    $ormas->update(['status' => 'ditolak']);
    session()->flash('success', 'DATA BERHASIL DI Tolak');
        return to_route('ormas.index');



}
public function pesanDitolak( ormas $ormas , rejected $rejected){

$pesans = $ormas->rejected;



return view('ormas.pesan', compact('pesans'));



    
}
public function resubmit(ormas $ormas ){

  
    $ormas->update(['status' => 'belum_validasi']);
    session()->flash('success', 'resubmit');
    return to_route('ormas.index'); 



}
public function final(Request $request, ormas $ormas){
    $validated = $request->validate([
                'final' => 'mimes:pdf',



    ]);
    $filename1 = time().$request->file('final')->getClientOriginalName();
    $path1 = $request->file('final')->storeAs('file_ormas/final',$filename1,'public');
    $validated["final"] = $filename1;
    $ormas->update($validated);


    session()->flash('success', 'Your final file data has been updated');
    return to_route('ormas.index'); 



}
public function viewfinal($filename){
    $path = 'file_ormas/final/';
      return view('ormas.view', compact('filename','path'));
  
  
  }
  public function downloadfinal($filename){
    $filePath = 'file_ormas/final/' . $filename;
if (Storage::disk('public')->exists($filePath)) {
    // Set the appropriate Content-Type header
    $mimeType = Storage::mimeType($filePath);
    $headers = [
        'Content-Type' => $mimeType,
    ];

    // Download the file
    return Storage::download($filePath, $filename, $headers);
}

// If the file does not exist, redirect or display an error message
session()->flash('success', 'data tidak ada');
return to_route('ormas.index'); 
  
  }



}