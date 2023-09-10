<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\ibadah;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Requests\StoreibadahRequest;
use App\Http\Requests\UpdateibadahRequest;
use App\Models\rejected_ibadah;
use App\Models\surat1;
use Illuminate\Http\Request;
class IbadahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ibadah $ibadah)
    {
        $user = auth()->user();
        $firstRole = $user->roles->first()->name;
       // logic for user
       if($firstRole == 'user'){
            $this->authorize('read_ibadah');
            $ibadahs = ibadah::latest('updated_at')->where('User_id', auth()->user()->id)->paginate(10);
            if(request('nama')){
                $ibadahs = ibadah::where('nama_RmIbadah','like','%'.request('nama').'%')
                ->where('User_id', auth()->user()->id)
                ->paginate(10);
            }
            $validasi = DB::table('ibadahs')->select()->where('status', 'validasi')->count();
            $selesai = DB::table('ibadahs')->select()->where('status', 'selesai')->count();
            $belum_validasi = DB::table('ibadahs')->select()->where('status', 'belum_validasi')->count();
            return view('ibadah.index' ,compact('ibadahs','validasi','selesai','belum_validasi'));

        }
        //end logic user


        $ibadahs = ibadah::latest('updated_at')->paginate(10);
        if(request('nama')){
            $ibadahs = ibadah::where('nama_RmIbadah','like','%'.request('nama').'%')
            ->paginate(10);
        }

        $validasi = DB::table('ibadahs')->select()->where('status', 'validasi')->count();
        $selesai = DB::table('ibadahs')->select()->where('status', 'selesai')->count();
        $belum_validasi = DB::table('ibadahs')->select()->where('status', 'belum_validasi')->count();
        $this->authorize('read_ibadah');
        return view('ibadah.index' ,compact('ibadahs','validasi','selesai','belum_validasi'));
    }
    public function search(ibadah $ibadah)
    {
        $ibadahs = ibadah::where('status', 'selesai')->paginate(10);
        $validasi = DB::table('ibadahs')->select()->where('status', 'validasi')->count();
        $selesai = DB::table('ibadahs')->select()->where('status', 'selesai')->count();
        $belum_validasi = DB::table('ibadahs')->select()->where('status', 'belum_validasi')->count();
        $this->authorize('read_ibadah');
        return view('ibadah.index' ,compact('ibadahs','validasi','selesai','belum_validasi'));
    }
    public function search1(ibadah $ibadah)
    {
        $ibadahs = ibadah::where('status', 'belum_validasi')->paginate(10);
        $validasi = DB::table('ibadahs')->select()->where('status', 'validasi')->count();
        $selesai = DB::table('ibadahs')->select()->where('status', 'selesai')->count();
        $belum_validasi = DB::table('ibadahs')->select()->where('status', 'belum_validasi')->count();
        $this->authorize('read_ibadah');
        return view('ibadah.index' ,compact('ibadahs','validasi','selesai','belum_validasi'));
    }
    public function search2(ibadah $ibadah)
    {
        $ibadahs = ibadah::where('status', 'validasi')->paginate(10);
        $validasi = DB::table('ibadahs')->select()->where('status', 'validasi')->count();
        $selesai = DB::table('ibadahs')->select()->where('status', 'selesai')->count();
        $belum_validasi = DB::table('ibadahs')->select()->where('status', 'belum_validasi')->count();
        $this->authorize('read_ibadah');
        return view('ibadah.index' ,compact('ibadahs','validasi','selesai','belum_validasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user_id = auth()->user()->id;
       
        return view('ibadah.create',compact('user_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          
    $validated = $request->validate([

        'nama_RmIbadah' => 'unique:ibadahs|required|min:5|max:50',
        'nama_ketua' => 'required|min:5|max:50',
        'nama_sekertaris' =>'required|min:5|max:50',
        'nama_bendahara' => 'required|min:5|max:50' ,
        'alamat' => 'required',
        'no_hp' => 'required|min:12|max:20' ,
        'SKTM' =>  'required|mimes:pdf',
        'sk_kementrian' => 'required|mimes:pdf',
        'sk_SpengurusPusat' => 'required|mimes:pdf',
        'sk_Spengurus' => 'required|mimes:pdf',
        'bio_pengurus' => 'required|mimes:pdf',
        'pasfoto_pengurus' => 'required|mimes:pdf',
        'ktp_pengurus' =>'required|mimes:pdf',
        'sk_domisili' => 'required|mimes:pdf',
        'foto_ibadah' => 'required|mimes:pdf',
       


        
        
      


    ]);

    //ssp
    $filename1 = time().$request->file('SKTM')->getClientOriginalName();
    $path1 = $request->file('SKTM')->storeAs('file_ibadah/SKTM',$filename1,'public');
    //mendagri
    $filename2 = time().$request->file('sk_kementrian')->getClientOriginalName();
    $path2 = $request->file('sk_kementrian')->storeAs('file_ibadah/sk_kementrian',$filename2,'public');
    //ad_art
    $filename3 = time().$request->file('sk_SpengurusPusat')->getClientOriginalName();
    $path3 = $request->file('sk_SpengurusPusat')->storeAs('file_ibadah/sk_SpengurusPusat',$filename3,'public');
    //foto_kantor
    $filename4 = time().$request->file('sk_Spengurus')->getClientOriginalName();
    $path8 = $request->file('sk_Spengurus')->storeAs('file_ibadah/sk_Spengurus',$filename4,'public');
    //proker
    $filename5 = time().$request->file('bio_pengurus')->getClientOriginalName();
    $path4 = $request->file('bio_pengurus')->storeAs('file_ibadah/bio_pengurus',$filename5,'public');
    //ktp
    $filename6 = time().$request->file('pasfoto_pengurus')->getClientOriginalName();
    $path5 = $request->file('pasfoto_pengurus')->storeAs('file_ibadah/pasfoto_pengurus',$filename6,'public');
    //npwp
    $filename7 = time().$request->file('ktp_pengurus')->getClientOriginalName();
    $path6 = $request->file('ktp_pengurus')->storeAs('file_ibadah/ktp_pengurus',$filename7,'public');
    //sk_domisili
    $filename8 = time().$request->file('sk_domisili')->getClientOriginalName();
    $path7 = $request->file('sk_domisili')->storeAs('file_ibadah/sk_domisili',$filename8,'public');
    //sk_pernyataan 
    $filename9 = time().$request->file('foto_ibadah')->getClientOriginalName();
    $path9= $request->file('foto_ibadah')->storeAs('file_ibadah/foto_ibadah',$filename9,'public');
  

   
   
   
   //moveit
    $validated["SKTM"] = $filename1;
    $validated["sk_kementrian"] = $filename2;
    $validated["sk_SpengurusPusat"] = $filename3;
    $validated["sk_Spengurus"] = $filename4;
    $validated["bio_pengurus"] = $filename5;
    $validated["pasfoto_pengurus"] = $filename6;
    $validated["ktp_pengurus"] = $filename7;
    $validated["sk_domisili"] = $filename8;
    $validated["foto_ibadah"] = $filename9;
  
    $validated["User_id"] = auth()->user()->id;





ibadah::create($validated);
session()->flash('success', 'DATA BERHASIL DI TAMBAHKAN');
return to_route('ibadah.index');
    }

   
     
    public function edit(ibadah $ibadah, rejected_ibadah $rejected_ibadah)

    {   
        $this->authorize('edit_ibadah');
        $pesans = $ibadah->rejected_ibadah;
        return view('ibadah.edit',compact('ibadah','pesans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ibadah $ibadah)
    {
        $validated = $request->validate([ 
            'nama_RmIbadah' => 'min:5|max:50',
            'nama_ketua' => 'min:5|max:50',
            'nama_sekertaris' =>'min:5|max:50',
            'nama_bendahara' => 'min:5|max:50' ,
            'alamat' => '',
            'no_hp' => 'min:12|max:20' ,
            'SKTM' =>  'mimes:pdf',
            'sk_kementrian' => '|mimes:pdf',
            'sk_SpengurusPusat' => '|mimes:pdf',
            'sk_Spengurus' => 'mimes:pdf',
            'bio_pengurus' => 'mimes:pdf',
            'pasfoto_pengurus' => 'mimes:pdf',
            'ktp_pengurus' =>'mimes:pdf',
            'sk_domisili' => 'mimes:pdf',
            'foto_ibadah' => 'mimes:pdf',]);
          //ssp
          if ( $request->file('SKTM') != '' ) {
            $filename1 = time().$request->file('SKTM')->getClientOriginalName();
          $path1 = $request->file('SKTM')->storeAs('file_ibadah/SKTM',$filename1,'public');
          $validated["SKTM"] = $filename1;
    
          }if($request->file('sk_kementrian') != '')  {
             $filename2 = time().$request->file('sk_kementrian')->getClientOriginalName();
            $path2 = $request->file('sk_kementrian')->storeAs('file_ibadah/sk_kementrian',$filename2,'public');
            $validated["sk_kementrian"] = $filename2;
        }if($request->file('sk_SpengurusPusat') != '')  {
            $filename3 = time().$request->file('sk_SpengurusPusat')->getClientOriginalName();
            $path3 = $request->file('ad_art')->storeAs('file_ibadah/sk_SpengurusPusat',$filename3,'public');
            $validated["sk_SpengurusPusat"] = $filename3;
       }if($request->file('sk_Spengurus') != '')  {
        $filename4 = time().$request->file('sk_Spengurus')->getClientOriginalName();
          $path4 = $request->file('sk_Spengurus')->storeAs('file_ibadah/sk_Spengurus',$filename4,'public');
          $validated["sk_Spengurus"] = $filename4;
    }if($request->file('bio_pengurus') != '')  {
        $filename5 = time().$request->file('bio_pengurus')->getClientOriginalName();
        $path5 = $request->file('bio_pengurus')->storeAs('file_ibadah/bio_pengurus',$filename5,'public');
        $validated["bio_pengurus"] = $filename5;
    }if($request->file('pasfoto_pengurus') != '')  {
        $filename6 = time().$request->file('pasfoto_pengurus')->getClientOriginalName();
        $path6 = $request->file('pasfoto_pengurus')->storeAs('file_ibadah/pasfoto_pengurus',$filename6,'public');
        $validated["pasfoto_pengurus"] = $filename6;
          
    }if ($request->file('ktp_pengurus') != '') {
        $filename7 = time().$request->file('ktp_pengurus')->getClientOriginalName();
        $path7 = $request->file('ktp_pengurus')->storeAs('file_ibadah/ktp_pengurus',$filename7,'public');
        $validated["ktp_pengurus"] = $filename7;
    }if ($request->file('sk_domisili') != '') {
        $filename8 = time().$request->file('sk_domisili')->getClientOriginalName();
        $path8 = $request->file('sk_domisili')->storeAs('file_ibadah/sk_domisili',$filename8,'public');
        $validated["sk_domisili"] = $filename8;
    }if ($request->file('foto_ibadah') != '') {
        $filename9 = time().$request->file('foto_ibadah')->getClientOriginalName();
        $path9= $request->file('foto_ibadah')->storeAs('file_ibadah/foto_ibadah',$filename9,'public');
        $validated["foto_ibadah"] = $filename9;
       
    }
    $ibadah->update(['status' => 'belum_validasi']);
      
        $ibadah->update($validated);
        $ibadah->update(['status' => 'belum_validasi']);
    
        session()->flash('success', 'Your rumah ibadah data has been updated');
        return to_route('ibadah.index'); 
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ibadah $ibadah)
    {
        $ibadah->delete();
session()->flash('success', 'Your data rumah ibadah has been deleted');
return back();
    }
    public function validasi(ibadah $ibadah ){

                return view('ibadah.surat', compact('ibadah'));
        // $ibadah->update(['status' => 'validasi']);
        // session()->flash('success', 'tervalidasi');
        // return to_route('ibadah.index'); 
}
public function download($filename){

    $filePath = 'file_ibadah/SKTM/' . $filename;
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
    return redirect('ibadah.index')->back()->with('error', 'File not found.');
}
public function download1($filename){

    $filePath = 'file_ibadah/sk_kementrian/' . $filename;
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
    return redirect('ibadah.index')->back()->with('error', 'File not found.');
}
public function download2($filename){

    $filePath = 'file_ibadah/sk_SpengurusPusat/' . $filename;
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
    return redirect('ibadah.index')->back()->with('error', 'File not found.');
}
public function download3($filename){

    $filePath = 'file_ibadah/sk_Spengurus/' . $filename;
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
    return redirect('ibadah.index')->back()->with('error', 'File not found.');
}
public function download4($filename){

    $filePath = 'file_ibadah/bio_pengurus/' . $filename;
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
    return redirect('ibadah.index')->back()->with('error', 'File not found.');
}
public function download5($filename){

    $filePath = 'file_ibadah/pasfoto_pengurus/' . $filename;
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
    return redirect('ibadah.index')->back()->with('error', 'File not found.');
}
public function download6($filename){

    $filePath = 'file_ibadah/ktp_pengurus/' . $filename;
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
    
    return redirect('ibadah.index')->back()->with('error', 'File not found.');
}
public function download7($filename){

    $filePath = 'file_ibadah/sk_domisili/' . $filename;
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
    return redirect('ibadah.index')->back()->with('error', 'File not found.');
}
public function download8($filename){

    $filePath = 'file_ibadah/foto_ibadah/' . $filename;
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
    return redirect('ibadah.index')->back()->with('error', 'File not found.');
}
public function view($filename){
    $path = 'file_ibadah/SKTM/';
      return view('ibadah.view', compact('filename','path'));
  
  
  }
  public function view1($filename){
    $path = 'file_ibadah/sk_kementrian/';
      return view('ibadah.view', compact('filename','path'));
  
  
  }
  public function view2($filename){
    $path = 'file_ibadah/sk_SpengurusPusat/';
      return view('ibadah.view', compact('filename','path'));
  
  
  }
  public function view3($filename){
    $path = 'file_ibadah/sk_Spengurus/';
      return view('ibadah.view', compact('filename','path'));
  
  
  }
  public function view4($filename){
    $path = 'file_ibadah/bio_pengurus/';
      return view('ibadah.view', compact('filename','path'));
  
  
  }
  public function view5($filename){
    $path = 'file_ibadah/pasfoto_pengurus/';
      return view('ibadah.view', compact('filename','path'));
  
  
  }
  public function view6($filename){
    $path = 'file_ibadah/ktp_pengurus/';
      return view('ibadah.view', compact('filename','path'));
  
  
  }
  public function view7($filename){
    $path = 'file_ibadah/sk_domisili/';
      return view('ibadah.view', compact('filename','path'));
  
  
  }
  public function view8($filename){
    $path = 'file_ibadah/foto_ibadah/';
      return view('ibadah.view', compact('filename','path'));
  
  
  }
  public function selesai(ibadah $ibadah ){

  
    $ibadah->update(['status' => 'selesai']);
    session()->flash('success', 'terselesaikan');
    return to_route('ibadah.index'); 



}
public function tolak(ibadah $ibadah ){
  

  
   
    
    return view('ibadah.tolak',compact('ibadah')); 



}
public function send(Request $request, ibadah $ibadah  ){
 
    $request["ibadah_id"] = $ibadah->id;
    rejected_ibadah::create($request->all());
    $ibadah->update(['status' => 'ditolak']);

    session()->flash('success', 'DATA BERHASIL DI Tolak');
        return to_route('ibadah.index');



}
public function pesanDitolak( ibadah $ibadah , rejected_ibadah $rejected){

$pesans = $ibadah->rejected_ibadah;



return view('ibadah.pesan', compact('pesans'));



    
}
public function resubmit(ibadah $ibadah ){

  
    $ibadah->update(['status' => 'belum_validasi']);
    session()->flash('success', 'resubmit');
    return to_route('ibadah.index'); 



}
public function pdf(ibadah $ibadah , surat1 $surat1){
    $no1 = $ibadah->surat1->no1;
    $no2 = $ibadah->surat1->no2;
    $no3 = $ibadah->surat1->no3;
    $no4 = $ibadah->surat1->no4;
    $no5 = $ibadah->surat1->no5;
    $no6 = $ibadah->surat1->no6;
    $pketua = $ibadah->surat1->pketua;
    $pother = $ibadah->surat1->pother;
    $dateraw = $ibadah->surat1->date;
    $start= date_create($dateraw);
    $date = date_format($start,"d-m-Y");

    return view('pdf.ibadahpdf', compact('ibadah','no1','no2','no3','no4','no5','no6','pketua','pother','date'));

   
  
 
     
 
 
 }
 public function final(Request $request, ibadah $ibadah){
    $validated = $request->validate([
                'final' => 'mimes:pdf',



    ]);
    $filename1 = time().$request->file('final')->getClientOriginalName();
    $path1 = $request->file('final')->storeAs('file_ibadah/final',$filename1,'public');
    $validated["final"] = $filename1;
    $ibadah->update($validated);


    session()->flash('success', 'Your final file data has been updated');
    return to_route('ibadah.index'); 



}
public function viewfinal($filename){
    $path = 'file_ibadah/final/';
      return view('ibadah.view', compact('filename','path'));
  
  
  }
  public function downloadfinal($filename){
    $filePath = 'file_ibadah/final/' . $filename;
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
return to_route('ibadah.index'); 
  
  }

  
}
