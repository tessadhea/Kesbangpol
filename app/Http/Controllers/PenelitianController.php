<?php

namespace App\Http\Controllers;

use App\Models\reject;
use App\Models\surat1;
use App\Models\surat2;

use App\Models\penelitian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorepenelitianRequest;
use App\Http\Requests\UpdatepenelitianRequest;

class PenelitianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(penelitian $penelitian)
    {   
        $this->authorize('read_penelitian');
        $user = auth()->user();
        $firstRole = $user->roles->first()->name;
        //logic user
        if($firstRole == 'user'){
            $penelitians = penelitian::latest('updated_at')
            ->where('User_id', auth()->user()->id)
            ->paginate(10);
            if(request('nama')){
                $penelitians = penelitian::where('nama_pemohon','like','%'.request('nama').'%')
                ->where('User_id', auth()->user()->id)
                ->paginate(10);
            }
            $validasi = DB::table('penelitians')->select()->where('status', 'validasi')->count();
            $selesai = DB::table('penelitians')->select()->where('status', 'selesai')->count();
            $belum_validasi = DB::table('penelitians')->select()->where('status', 'belum_validasi')->count();
            return view('penelitian.index',compact('penelitians','validasi','selesai','belum_validasi'));
            }
            //endlogicuser
           
    
        $penelitians = penelitian::latest('updated_at')->paginate(10);
        
        if(request('nama')){
            $penelitians = penelitian::where('nama_pemohon','like','%'.request('nama').'%')->paginate(10);
        }
        $validasi = DB::table('penelitians')->select()->where('status', 'validasi')->count();
        $selesai = DB::table('penelitians')->select()->where('status', 'selesai')->count();
        $belum_validasi = DB::table('penelitians')->select()->where('status', 'belum_validasi')->count();
        return view('penelitian.index',compact('penelitians','validasi','selesai','belum_validasi'));
    }
    public function search(penelitian $penelitian)
    {
        $penelitians = penelitian::where('status', 'selesai')->paginate(10);
        $validasi = DB::table('penelitians')->select()->where('status', 'validasi')->count();
        $selesai = DB::table('penelitians')->select()->where('status', 'selesai')->count();
        $belum_validasi = DB::table('penelitians')->select()->where('status', 'belum_validasi')->count();
        return view('penelitian.index',compact('penelitians','validasi','selesai','belum_validasi'));
    }
    public function search1(penelitian $penelitian)
    {
        $penelitians = penelitian::where('status', 'belum_validasi')->paginate(10);
        $validasi = DB::table('penelitians')->select()->where('status', 'validasi')->count();
        $selesai = DB::table('penelitians')->select()->where('status', 'selesai')->count();
        $belum_validasi = DB::table('penelitians')->select()->where('status', 'belum_validasi')->count();
        return view('penelitian.index',compact('penelitians','validasi','selesai','belum_validasi'));
    }
    public function search2(penelitian $penelitian)
    {
        $penelitians = penelitian::where('status', 'validasi')->paginate(10);
        $validasi = DB::table('penelitians')->select()->where('status', 'validasi')->count();
        $selesai = DB::table('penelitians')->select()->where('status', 'selesai')->count();
        $belum_validasi = DB::table('penelitians')->select()->where('status', 'belum_validasi')->count();
        return view('penelitian.index',compact('penelitians','validasi','selesai','belum_validasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user_id = auth()->user()->id;
        $this->middleware('can:tambah_penelitian');
        return view('penelitian.create',compact('user_id'));
    
    }

   
    public function store(Request $request)
    {

        $validated = $request->validate([

            'nama_pemohon' => 'unique:penelitians|required|min:5|max:50',
            'nim' => 'required',
            'lokasi' => 'required',
            'waktu' => 'required',
            'penanggung_jawab' => 'required' ,
            'instansi' => 'required' ,
            'pengantar' => 'required|mimes:pdf',
            'ktp' =>  'required|mimes:pdf',
           


            
            
          


        ]);

        //ssp
        $filename1 = time().$request->file('pengantar')->getClientOriginalName();
        $path1 = $request->file('pengantar')->storeAs('file_penelitian/pengantar',$filename1,'public');
        //mendagri
        $filename2 = time().$request->file('ktp')->getClientOriginalName();
        $path2 = $request->file('ktp')->storeAs('file_penelitian/ktp',$filename2,'public');
        

       
       
       
       //moveit
        $validated["pengantar"] = $filename1;
        $validated["ktp"] = $filename2;
        $validated["User_id"] = auth()->user()->id;


            penelitian::create($validated);
            session()->flash('success', 'DATA BERHASIL DI TAMBAHKAN');
            return to_route('penelitian.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(penelitian $penelitian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(penelitian $penelitian, reject $reject)
    {
        $pesans = $penelitian->reject;
        return view('penelitian.edit', compact('penelitian','pesans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, penelitian $penelitian)
    {
        $validated = $request->validate([  
        'nama_pemohon' => 'required|min:5|max:50',
        'nim' => 'required',
        'lokasi' => 'required',
        'waktu' => 'required',
        'penanggung_jawab' => 'required' ,
        'instansi' => 'required' ,
        'pengantar' => 'mimes:pdf',
        'ktp' =>  'mimes:pdf',
       ]);
      //ssp
      if ( $request->file('pengantar') != '' ) {
        $filename1 = time().$request->file('pengantar')->getClientOriginalName();
      $path1 = $request->file('pengantar')->storeAs('file_penelitian/pengantar',$filename1,'public');
      $validated["pengantar"] = $filename1;

      }if($request->file('ktp') != '')  {
         $filename2 = time().$request->file('ktp')->getClientOriginalName();
        $path2 = $request->file('ktp')->storeAs('file_penelitian/ktp',$filename2,'public');
        $validated["ktp"] = $filename2;
    }
    $penelitian->update(['status' => 'belum_validasi']);
  
    $penelitian->update($validated);
    

    session()->flash('success', 'Your ormas data has been updated');
    return to_route('penelitian.index'); 


    }
    public function final(Request $request, penelitian $penelitian){
        $validated = $request->validate([
                    'final' => 'mimes:pdf',



        ]);
        $filename1 = time().$request->file('final')->getClientOriginalName();
        $path1 = $request->file('final')->storeAs('file_penelitian/final',$filename1,'public');
        $validated["final"] = $filename1;
        $penelitian->update($validated);
    

        session()->flash('success', 'Your final file data has been updated');
        return to_route('penelitian.index'); 



    }
    public function download($filename){

        $filePath = 'file_penelitian/pengantar/' . $filename;
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
        return redirect('penelitian.index')->back()->with('error', 'File not found.');
    }
    public function download1($filename){
    
        $filePath = 'file_penelitian/ktp/' . $filename;
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
        return to_route('penelitian.index'); 
    }
    public function view($filename){
        $path = 'file_penelitian/pengantar/';
          return view('penelitian.view', compact('filename','path'));
      
      
      }
      public function view1($filename){
          $path = 'file_penelitian/ktp/';
            return view('penelitian.view', compact('filename','path'));
        
        
        }
        public function viewfinal($filename){
            $path = 'file_penelitian/final/';
              return view('penelitian.view', compact('filename','path'));
          
          
          }
          public function downloadfinal($filename){
            $filePath = 'file_penelitian/final/' . $filename;
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
        return to_route('penelitian.index'); 
          
          }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(penelitian $penelitian)
    {
        $penelitian->delete();
session()->flash('success', 'Your data penelitian has been deleted');
return back();

    }
    public function validasi(penelitian $penelitian ){

        return view('penelitian.surat', compact('penelitian'));
        // $penelitian->update(['status' => 'validasi']);
        // session()->flash('success', 'tervalidasi');
        // return to_route('penelitian.index'); 
    
    
    
    }
    public function pdf(penelitian $penelitian, surat2 $surat2){

        $surat = $penelitian->surat2;
        $dateraw = $penelitian->surat2->date;
        $start= date_create($dateraw);
        $date = date_format($start,"d-m-Y");
    
        return view('pdf.penelitianpdf', compact('penelitian','surat','date'));
}
public function tolak(penelitian $penelitian ){
  

  
   
    
    return view('penelitian.tolak',compact('penelitian')); 



}
public function send(Request $request, penelitian $penelitian  ){
 
    $request["penelitian_id"] = $penelitian->id;
    reject::create($request->all());
    $penelitian->update(['status' => 'ditolak']);
    session()->flash('success', 'DATA BERHASIL DI Tolak');
        return to_route('penelitian.index');



}
public function pesanDitolak( penelitian $penelitian , reject $reject){

    $pesans = $penelitian->reject;
    
    
    
    return view('penelitian.pesan', compact('pesans'));
    
    
    
        
    }
    public function resubmit(penelitian $penelitian){
        $penelitian->update(['status'=>'belum_validasi']);
        session()->flash('success', 'BERHASIL Resubmit');

        return to_route('penelitian.index');






    }
    public function selesai(penelitian $penelitian ){

  
        $penelitian->update(['status' => 'selesai']);
        session()->flash('success', 'terselesaikan');
        return to_route('penelitian.index'); 
    
    
    
    }
}