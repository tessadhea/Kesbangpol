<?php

namespace App\Http\Controllers;

use App\Models\reject2;
use App\Models\keramaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorekeramaianRequest;
use App\Http\Requests\UpdatekeramaianRequest;
use App\Models\surat4;

class KeramaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {       
        $this->authorize('read_keramaian');
        $user = auth()->user();
        $firstRole = $user->roles->first()->name;
        if($firstRole == 'user'){
            $keramaians= keramaian::latest('updated_at')
            ->where('User_id', auth()->user()->id)
            ->paginate(10);
            if(request('nama')){
                $keramaians= keramaian::latest('updated_at')
                ->where('nama_pemohon','like','%'.request('nama').'%')
                ->where('User_id', auth()->user()->id)
                ->paginate(10);
            }
            $validasi = DB::table('keramaians')->select()->where('status', 'validasi')->count();
            $selesai = DB::table('keramaians')->select()->where('status', 'selesai')->count();
            $belum_validasi = DB::table('keramaians')->select()->where('status', 'belum_validasi')->count();
            return view('keramaian.index',compact('keramaians','validasi','selesai','belum_validasi'));




        }
        $keramaians= keramaian::latest('updated_at')->paginate(10);
        
        if(request('nama')){
            $keramaians = keramaian::where('nama_pemohon','like','%'.request('nama').'%')->paginate(10);
        }
        $validasi = DB::table('keramaians')->select()->where('status', 'validasi')->count();
        $selesai = DB::table('keramaians')->select()->where('status', 'selesai')->count();
        $belum_validasi = DB::table('keramaians')->select()->where('status', 'belum_validasi')->count();
        return view('keramaian.index',compact('keramaians','validasi','selesai','belum_validasi'));
    }
    public function search()
    {       
        $keramaians= keramaian::where('status', 'selesai')->paginate(10);
        $validasi = DB::table('keramaians')->select()->where('status', 'validasi')->count();
        $selesai = DB::table('keramaians')->select()->where('status', 'selesai')->count();
        $belum_validasi = DB::table('keramaians')->select()->where('status', 'belum_validasi')->count();
        return view('keramaian.index',compact('keramaians','validasi','selesai','belum_validasi'));
    }
    public function search1()
    {       
        $keramaians= keramaian::where('status', 'belum_validasi')->paginate(10);
        $validasi = DB::table('keramaians')->select()->where('status', 'validasi')->count();
        $selesai = DB::table('keramaians')->select()->where('status', 'selesai')->count();
        $belum_validasi = DB::table('keramaians')->select()->where('status', 'belum_validasi')->count();
        return view('keramaian.index',compact('keramaians','validasi','selesai','belum_validasi'));
    }
    public function search2()
    {       
        $keramaians= keramaian::where('status', 'validasi')->paginate(10);
        $validasi = DB::table('keramaians')->select()->where('status', 'validasi')->count();
        $selesai = DB::table('keramaians')->select()->where('status', 'selesai')->count();
        $belum_validasi = DB::table('keramaians')->select()->where('status', 'belum_validasi')->count();
        return view('keramaian.index',compact('keramaians','validasi','selesai','belum_validasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $User_id = auth()->user()->id;
        return view('keramaian.create', compact('User_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, keramaian $keramaian)

    {
            $validated = $request->validate([

                'nama_pemohon' => 'unique:keramaians|min:5|max:50',
                'jabatan' => 'required',
                'kegiatan' => 'required',
                'tempat' => 'required',
                'waktu_durasi' => 'required',
                'date' => 'required',
                'permohonan' => 'required|mimes:pdf',
                'ktp' => 'required|mimes:pdf',
                



            ]);
             //ssp
        $filename1 = time().$request->file('permohonan')->getClientOriginalName();
        $path1 = $request->file('permohonan')->storeAs('file_keramaian/permohonan',$filename1,'public');
        //mendagri
        $filename2 = time().$request->file('ktp')->getClientOriginalName();
        $path2 = $request->file('ktp')->storeAs('file_keramaian/ktp',$filename2,'public');
        

       
       
       
       //moveit
        $validated["permohonan"] = $filename1;
        $validated["ktp"] = $filename2;
        $validated["User_id"] = auth()->user()->id;


            keramaian::create($validated);
            session()->flash('success', 'DATA BERHASIL DI TAMBAHKAN');
            return to_route('keramaian.index');
    }
    public function download($filename){

        $filePath = 'file_keramaian/permohonan/' . $filename;
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
        return redirect('keramaian.index')->back()->with('error', 'File not found.');
    }
    public function download1($filename){
    
        $filePath = 'file_keramaian/ktp/' . $filename;
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
        return to_route('keramaian.index'); 
    }
    public function view($filename){
        $path = 'file_keramaian/permohonan/';
          return view('keramaian.view', compact('filename','path'));
      
      
      }
      public function view1($filename){
          $path = 'file_keramaian/ktp/';
            return view('keramaian.view', compact('filename','path'));
        
        
        }

    /**
     * Display the specified resource.
     */
    public function show(keramaian $keramaian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(keramaian $keramaian, reject2 $reject2)
    {
        $pesans = $keramaian->reject2;
        return view('keramaian.edit', compact('keramaian','pesans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, keramaian $keramaian)
    {
        $validated = $request->validate([  
            'nama_pemohon' => 'required|min:5|max:50',
            'jabatan' => 'required',
            'kegiatan' => 'required',
            'tempat' => 'required' ,
            'waktu_durasi' => 'required' ,
            'date' => 'required' ,
            'pemohonan' => 'mimes:pdf',
            'ktp' =>  'mimes:pdf',
           ]);
          //ssp
          if ( $request->file('pemohonan') != '' ) {
            $filename1 = time().$request->file('pemohonan')->getClientOriginalName();
          $path1 = $request->file('pemohonan')->storeAs('file_keramaian/pemohonan',$filename1,'public');
          $validated["pemohonan"] = $filename1;
    
          }if($request->file('ktp') != '')  {
             $filename2 = time().$request->file('ktp')->getClientOriginalName();
            $path2 = $request->file('ktp')->storeAs('file_keramaian/ktp',$filename2,'public');
            $validated["ktp"] = $filename2;
        }
        $keramaian->update(['status' => 'belum_validasi']);
      
        $keramaian->update($validated);
        
    
        session()->flash('success', 'Your izin keramaian data has been updated');
        return to_route('keramaian.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(keramaian $keramaian)
    {
        $keramaian->delete();
        session()->flash('success', 'Your data keramaian has been deleted');
        return back();
    }
    public function tolak(keramaian $keramaian ){
  

  
   
    
        return view('keramaian.tolak',compact('keramaian')); 
    
    
    
    }
    public function send(Request $request, keramaian $keramaian  ){
     
        $request["keramaian_id"] = $keramaian->id;
        reject2::create($request->all());
        $keramaian->update(['status' => 'ditolak']);
        session()->flash('success', 'DATA BERHASIL DI Tolak');
            return to_route('keramaian.index');
    
    
    
    }
    public function pesanDitolak( keramaian $keramaian , reject2 $reject2){
    
        $pesans = $keramaian->reject2;
        
        
        
        return view('keramaian.pesan', compact('pesans'));
        
        
        
            
        }
        public function validasi(keramaian $keramaian ){

                return view('keramaian.surat', compact('keramaian'));
            // $keramaian->update(['status' => 'validasi']);
            // session()->flash('success', 'tervalidasi');
            // return to_route('keramaian.index'); 
        
        
        
        }
        public function selesai(keramaian $keramaian ){

  
            $keramaian->update(['status' => 'selesai']);
            session()->flash('success', 'terselesaikan');
            return to_route('keramaian.index'); 
        
        
        
        }
        public function pdf(keramaian $keramaian , surat4 $surat){

            $surat = $keramaian->surat4;
            $dateraw = $keramaian->surat4->date;
            $start= date_create($dateraw);
            $date = date_format($start,"d-m-Y");
           return view('pdf.keramaianpdf', compact('keramaian','surat','date'));
         
        
            
        
        
        }
        public function final(Request $request, keramaian $keramaian){
            $validated = $request->validate([
                        'final' => 'mimes:pdf',
        
        
        
            ]);
            $filename1 = time().$request->file('final')->getClientOriginalName();
            $path1 = $request->file('final')->storeAs('file_keramaian/final',$filename1,'public');
            $validated["final"] = $filename1;
            $keramaian->update($validated);
        
        
            session()->flash('success', 'Your final file data has been updated');
            return to_route('keramaian.index'); 
        
        
        
        }
        public function viewfinal($filename){
            $path = 'file_keramaian/final/';
              return view('keramaian.view', compact('filename','path'));
          
          
          }
          public function downloadfinal($filename){
            $filePath = 'file_keramaian/final/' . $filename;
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
        return to_route('keramaian.index'); 
          
          }
}
