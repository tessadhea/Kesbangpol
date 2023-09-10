@include('layouts.mhead')
<body>

<div id="app">


@include('layouts.headbar')

@include('layouts.sidebar')

<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      Edit Data Ormas


    </h1>
   
    <a href="{{ route('ormas.index') }}" class=" text-3xl hover:text-4xl">  <span class="icon"><i class="mdi mdi-arrow-left-bold-circle  "></i></span></a>
   
   
        
    
  </div>
  
  <div class=" flex flex-row-reverse items-center mt-2 ">
    <h1 class="title">
      
    </h1>
   
   
   
   
        @if(auth()->user()->can('validasi_ormas') && $ormas->status === 'belum_validasi')

        <form method="GET" action="{{ route('ormas.ormas.validasi', $ormas->id) }}" onsubmit="return confirm ('apakah anda yakin ingin validasi data?');">
          @csrf
         
    <button type="submit" class="button blue ml-2">Validasi Data</a>
  </form>
    @endif
    @if(auth()->user()->can('validasi_ormas') && $ormas->status === 'ditolak')

    <form method="POST" action="{{ route('ormas.ormas.resubmit', $ormas->id) }}" onsubmit="return confirm ('apakah anda yakin ingin submit lagi data?');">
      @csrf
     
<button type="submit" class="button blue ml-2">Resubmit</a>
</form>
@endif
    @if(auth()->user()->can('tolak_ormas') && $ormas->status === 'belum_validasi')

    <form method="POST" action="{{ route('ormas.ormas.tolak', $ormas->id) }}" onsubmit="return confirm ('apakah anda yakin ingin menolak data?');">
      @csrf
     
<button type="submit" class="button red">Tolak Data</a>
</form>
@endif
    @if(auth()->user()->can('selesai_ormas') && $ormas->status === 'validasi')

    <form method="POST" action="{{ route('ormas.ormas.selesai', $ormas->id) }}" onsubmit="return confirm ('apakah anda yakin ingin menyelesaikan proses?');">
      @csrf
     
<button type="submit"  @if($ormas->final == '') disabled @endif class="button blue">Selesaikan Proses</a>
</form>
@endif
@if(auth()->user()->can('view_surat') && $ormas->status === 'validasi')

<form method="POST" action="{{ route('ormas.ormas.suratrev', $ormas->id) }}" onsubmit="return confirm ('apakah anda yakin ingin menyelesaikan proses?');">
  @csrf
 
<button type="submit" class="button light mr-3">Edit Atribut Surat</a>
</form>
@endif
@if(auth()->user()->can('view_surat') && $ormas->status === 'validasi')

<form method="GET" action="{{ route('ormas.ormas.pdf', $ormas->id) }}" >
  @csrf
 
<button type="submit" class="button green mr-3">Tinjau Surat</a>
</form>
@endif
  </div>

  
</section>

  <section class="section main-section">
    @if( $ormas->status === 'validasi' &&  $ormas->final != '')
    
    <div class="notification green mt-1" x-data="{open: true}" x-show="open">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
          <div>
            <span class="icon"><i class="mdi mdi-buffer"></i></span>
            <b> PDF Final Telah Diupload </b> 
          </div>
         
          <button @click="open = false" type="button" class="button small textual ">Dismiss</button>
        </div>
      </div>
      @endif
      @if($ormas->status === 'validasi' &&  $ormas->final == '')
      <div class="notification blue mt-1" x-data="{open: true}" x-show="open">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
          <div>
            <span class="icon"><i class="mdi mdi-buffer"></i></span>
            <b> PDF Final Belum Diupload </b> 
          </div>
         
          <button @click="open = false" type="button" class="button small textual ">Dismiss</button>
        </div>
      </div>

  @endif
    @if($ormas->status === 'ditolak')
    @foreach($pesans as $pesan)
    <div class="notification red mt-1" x-data="{open: true}" x-show="open">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
          <div>
            <span class="icon"><i class="mdi mdi-buffer"></i></span>
            <b>Pesan Perbaikan : {{ $pesan->pesan }} </b> 
          </div>
          <form class="button  red " method="POST" action="{{ route('ormas.pesan.destroy', $pesan->id) }}" onsubmit="return confirm ('apakah anda yakin ingin menghapus data?');">
            @csrf
            @method('DELETE')
                <button type="submit"><i class="mdi mdi-trash-can"></i></button>
          </form>
          <button @click="open = false" type="button" class="button small textual ">Dismiss</button>
        </div>
      </div>
      @endforeach

  @endif
    <div class="card mb-6">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-ballot"></i></span>
          Tambah Ormas
        </p>
      </header>
      <div class="card-content">
        <form method="POST" action="{{ route('ormas.ormas.update', $ormas->id) }}" enctype="multipart/form-data">
            @csrf
          <div class="field">
            <label class="label">Nama Ormas</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input value="{{ $ormas->nama_ormas }}" class="input" id="name" name="nama_ormas" type="text" placeholder="Name">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
              @error('nama_ormas')
            <p class=" text-xs text-red-500">{{ $message }}</p>
            @enderror
            </div>
          </div>
          <div class="field">
            <label class="label">Nama Ketua</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input value= "{{ $ormas->nama_ketua }}" class="input" id="name" name="nama_ketua" type="text" placeholder="Name">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
              @error('nama_ketua')
            <p class=" text-xs text-red-500">{{ $message }}</p>
            @enderror
            </div>
          </div>
           <div class="field">
            <label class="label">Nama Sekertaris</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input value="{{ $ormas->nama_sek }}" class="input" id="nama_sek" name="nama_sek" type="text" placeholder="Name">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
              @error('nama_sek')
            <p class=" text-xs text-red-500">{{ $message }}</p>
            @enderror
            </div>
            <div class="field">
              <label class="label">Nama Bendahara</label>
              <div class="field-body">
                <div class="field">
                  <div class="control icons-left">
                    <input value="{{ $ormas->nama_bend }}" class="input" id="nama_bend" name="nama_bend" type="text" placeholder="Name">
                    <span class="icon left"><i class="mdi mdi-account"></i></span>
                  </div>
                </div>
                @error('nama_bend')
              <p class=" text-xs text-red-500">{{ $message }}</p>
              @enderror
              </div>
          </div>
          <div class="field">
            <label class="label">Alamat Domisili</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input value= "{{ $ormas->alamat_domisili }}" class="input" id="name" name="alamat_domisili" type="text" placeholder="Name">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
              @error('alamat_domisili')
            <p class=" text-xs text-red-500">{{ $message }}</p>
            @enderror
            </div>
          </div>
          <div class="field">
            <label class="label">Nomor Hp Ketua</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input  value="{{ $ormas->no_hp }}" class="input" id="no_hp" name="no_hp" type="text" placeholder="Name">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
              @error('no_hp')
            <p class=" text-xs text-red-500">{{ $message }}</p>
            @enderror
            </div>
          </div>
          <div class="field">
            <label class="label">Nomor Hp Sekertaris</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input value="{{ $ormas->no_hp2 }}" class="input" id="no_hp2" name="no_hp2" type="text" placeholder="Name">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
              @error('no_hp2')
            <p class=" text-xs text-red-500">{{ $message }}</p>
            @enderror
            </div>
          </div>
          <div class="field">
            <label class="label">Nomor Hp Bendahara</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input value="{{ $ormas->no_hp3 }}" class="input" id="no_hp3" name="no_hp3" type="text" placeholder="Name">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
              @error('no_hp3')
            <p class=" text-xs text-red-500">{{ $message }}</p>
            @enderror
            </div>
          </div>
          <div class="field">
            <label class="label">Scan Surat Permohonan : {{ $ormas->scan_surat_permohonan }}</label>
            <div class="field-body">
              <div class="field">
                <label for="scan_surat_permohonan" class="sr-only">Choose file</label>
                <input  type="file" name="scan_surat_permohonan" id="scan_surat_permohonan" class="block w-full border border-black shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400
                   file:border-0
                  file:bg-gray-100 file:mr-4
                  file:py-3 file:px-4
                  dark:file:bg-gray-700 dark:file:text-gray-400">
                </div>
              </div>
              @error('scan_surat_permohonan')
            <p class=" text-xs text-red-500">{{ $message }}</p>
            @enderror
            <a id="downloadLink" href="{{ route('ormas.ormas.ssp', ['filename' => $ormas->scan_surat_permohonan]) }}" class="button blue my-2 ml-1" >
             Download
            </a>
            <a id="downloadLink" href="{{ route('ormas.ormas.sspView', ['filename' => $ormas->scan_surat_permohonan]) }}" class="button light my-2 ml-1" >
              View
             </a>


            </div>
            <div class="field">
              <label class="label">Scan Surat Keterangan Mendagri : {{ $ormas->scan_sk_mendagri }}</label>
              <div class="field-body">
                <div class="field">
                  <label for="scan_sk_mendagri" class="sr-only">Choose file</label>
                  <input value="{{ asset('storage/file_ormas/sk_mendagri/'.$ormas->scan_sk_mendagri) }}" type="file" name="scan_sk_mendagri" id="scan_sk_mendagri" class="block w-full border border-black shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400
                     file:border-0
                    file:bg-gray-100 file:mr-4
                    file:py-3 file:px-4
                    dark:file:bg-gray-700 dark:file:text-gray-400">
                  </div>
                </div>
                @error('scan_sk_mendagri')
              <p class=" text-xs text-red-500">{{ $message }}</p>
              @enderror
              <a id="downloadLink1" href="{{ route('ormas.ormas.mendagri', ['filename' => $ormas->scan_sk_mendagri]) }}" class="button blue my-2 ml-1" >
                Download
               </a>
               <a id="downloadLink" href="{{ route('ormas.ormas.mendagriView', ['filename' => $ormas->scan_sk_mendagri]) }}" class="button light my-2 ml-1" >
                View
               </a>
              </div>
              <div class="field">
                <label class="label">AD ART : {{ $ormas->ad_art }}</label>
                <div class="field-body">
                  <div class="field">
                    <label for="ad_art" class="sr-only">Choose file</label>
                    <input type="file" name="ad_art" id="ad_art" class="block w-full border border-black shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400
                       file:border-0
                      file:bg-gray-100 file:mr-4
                      file:py-3 file:px-4
                      dark:file:bg-gray-700 dark:file:text-gray-400">
                    </div>
                  </div>
                  @error('ad_art')
                <p class=" text-xs text-red-500">{{ $message }}</p>
                @enderror
                <a id="downloadLink" href="{{ route('ormas.ormas.adart', ['filename' => $ormas->ad_art]) }}" class="button blue my-2 ml-1" >
                  Download
                 </a>
                 <a id="downloadLink" href="{{ route('ormas.ormas.adartiView', ['filename' =>$ormas->ad_art]) }}" class="button light my-2 ml-1" >
                  View
                 </a>
                </div>
                <div class="field">
                  <label class="label">Program Kerja : {{ $ormas->proker }}</label>
                  <div class="field-body">
                    <div class="field">
                      <label for="proker" class="sr-only">Choose file</label>
                      <input type="file" name="proker" id="proker" class="block w-full border border-black shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400
                         file:border-0
                        file:bg-gray-100 file:mr-4
                        file:py-3 file:px-4
                        dark:file:bg-gray-700 dark:file:text-gray-400">
                      </div>
                    </div>
                    @error('proker')
                  <p class=" text-xs text-red-500">{{ $message }}</p>
                  @enderror
                  <a id="downloadLink" href="{{ route('ormas.ormas.proker', ['filename' => $ormas->proker]) }}" class="button blue my-2 ml-1" >
                    Download
                   </a>
                   <a id="downloadLink" href="{{ route('ormas.ormas.prokerView', ['filename' =>$ormas->proker]) }}" class="button light my-2 ml-1" >
                    View
                   </a>
                  </div>
                  <div class="field">
                    <label class="label">Foto KTP : {{ $ormas->ktp }}</label>
                    <div class="field-body">
                      <div class="field">
                        <label for="ktp" class="sr-only">Choose file</label>
                        <input type="file" name="ktp" id="ktp" class="block w-full border border-black shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400
                         file:border-0
                          file:bg-gray-100 file:mr-4
                          file:py-3 file:px-4
                          dark:file:bg-gray-700 dark:file:text-gray-400">
                        </div>
                      </div>
                      @error('ktp')
                    <p class=" text-xs text-red-500">{{ $message }}</p>
                    @enderror
                    <a id="downloadLink" href="{{ route('ormas.ormas.ktp', ['filename' => $ormas->ktp]) }}" class="button blue my-2 ml-1" >
                      Download
                     </a>
                     <a id="downloadLink" href="{{ route('ormas.ormas.ktpView', ['filename' =>$ormas->ktp]) }}" class="button light my-2 ml-1" >
                      View
                     </a>
                    </div>
                    <div class="field">
                      <label class="label">Scan NPWP : {{ $ormas->npwp }}</label>
                      <div class="field-body">
                        <div class="field">
                          <label for="npwp" class="sr-only">Choose file</label>
                          <input type="file" name="npwp" id="npwp" class="block w-full border border-black shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400
                             file:border-0
                            file:bg-gray-100 file:mr-4
                            file:py-3 file:px-4
                            dark:file:bg-gray-700 dark:file:text-gray-400">
                          </div>
                        </div>
                        @error('npwp')
                      <p class=" text-xs text-red-500">{{ $message }}</p>
                      @enderror
                      <a id="downloadLink" href="{{ route('ormas.ormas.npwp', ['filename' => $ormas->npwp]) }}" class="button blue my-2 ml-1" >
                        Download
                       </a>
                       <a id="downloadLink" href="{{ route('ormas.ormas.npwpView', ['filename' =>$ormas->npwp]) }}" class="button light my-2 ml-1" >
                        View
                       </a>
                      </div>
                      <div class="field">
                      <label class="label">Scan Surat Keterangan Domisili :  {{ $ormas->sk_domisili }} </label>
                      <div class="field-body">
                        <div class="field">
                          <label for="sk_domisili" class="sr-only">Choose file</label>
                          <input type="file" name="sk_domisili" id="sk_domisili" class="block w-full border border-black shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400
                           file:border-0
                            file:bg-gray-100 file:mr-4
                            file:py-3 file:px-4
                            dark:file:bg-gray-700 dark:file:text-gray-400">
                          </div>
                        </div>
                        @error('sk_domisili')
                      <p class=" text-xs text-red-500">{{ $message }}</p>
                      @enderror
                      <a id="downloadLink" href="{{ route('ormas.ormas.domisili', ['filename' => $ormas->sk_domisili]) }}" class="button blue my-2 ml-1" >
                        Download
                       </a>
                       <a id="downloadLink" href="{{ route('ormas.ormas.domisiliView', ['filename' =>$ormas->sk_domisili]) }}" class="button light my-2 ml-1" >
                        View
                       </a>
                      </div>
                      <div class="field">
                        <label class="label">Foto Kantor Sekertariat :  {{ $ormas->foto_kantor }} </label>
                        <div class="field-body">
                          <div class="field">
                            <label for="foto_kantor" class="sr-only">Choose file</label>
                            <input type="file" name="foto_kantor" id="foto_kantor" class="block w-full border border-black shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400
                               file:border-0
                              file:bg-gray-100 file:mr-4
                              file:py-3 file:px-4
                              dark:file:bg-gray-700 dark:file:text-gray-400">
                            </div>
                          </div>
                          @error('foto_kantor')
                        <p class=" text-xs text-red-500">{{ $message }}</p>
                        @enderror
                        <a id="downloadLink" href="{{ route('ormas.ormas.kantor', ['filename' => $ormas->foto_kantor]) }}" class="button blue my-2 ml-1" >
                          Download
                          <a id="downloadLink" href="{{ route('ormas.ormas.kantorView', ['filename' =>$ormas->foto_kantor]) }}" class="button light my-2 ml-1" >
                            View
                           </a>
                        </div>
                        <div class="field">
                          <label class="label">Scan Pernyataan : {{ $ormas->sk_pernyataan }}</label>
                          <div class="field-body">
                            <div class="field">
                              <label for="sk_pernyataan" class="sr-only">Choose file</label>
                              <input type="file" name="sk_pernyataan" id="sk_pernyataan" class="block w-full border border-black shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400
                                file:border-0
                                file:bg-gray-100 file:mr-4
                                file:py-3 file:px-4
                                dark:file:bg-gray-700 dark:file:text-gray-400">
                              </div>
                            </div>
                            @error('sk_pernyataan')
                          <p class=" text-xs text-red-500">{{ $message }}</p>
                          @enderror
                          <a id="downloadLink" href="{{ route('ormas.ormas.pernyataan', ['filename' => $ormas->sk_pernyataan]) }}" class="button blue my-2 ml-1" >
                            Download
                           </a>
                           <a id="downloadLink" href="{{ route('ormas.ormas.pernyataanView', ['filename' =>$ormas->sk_pernyataan]) }}" class="button light my-2 ml-1" >
                            View
                           </a>
                          </div>
                          <div class="field">
                            <label class="label">Form Pengisian Data Ormas : {{ $ormas->Form_ormas }}</label>
                            <div class="field-body">
                              <div class="field">
                                <label for="Form_ormas" class="sr-only">Choose file</label>
                                <input type="file" name="Form_ormas" id="Form_ormas" class="block w-full border border-black shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400
                                  file:border-0
                                  file:bg-gray-100 file:mr-4
                                  file:py-3 file:px-4
                                  dark:file:bg-gray-700 dark:file:text-gray-400">
                                </div>
                              </div>
                              @error('Form_ormas')
                            <p class=" text-xs text-red-500">{{ $message }}</p>
                            @enderror
                            <a id="downloadLink" href="{{ route('ormas.ormas.data', ['filename' => $ormas->Form_ormas]) }}" class="button blue my-2 ml-1" >
                              Download
                             </a>
                             <a id="downloadLink" href="{{ route('ormas.ormas.dataView', ['filename' =>$ormas->Form_ormas]) }}" class="button light my-2 ml-1" >
                              View
                             </a>
                            </div>
          </div>
          

          <hr>
          @role('user')
          @if($ormas->status == 'belum_validasi' || $ormas->status == 'ditolak' )
<div class="card-content">
  <div class="field">
          <div class="field grouped">
            <div class="control">
              <button type="submit" class="button green">
                Submit
              </button>
            </div>
            <div class="control">
              <button type="reset" class="button red">
                Reset
              </button>
            </div>
          </div>
        </div>
        </div>
        @endif
        @endrole
        </form>
      </div>
    </div>
   
    @unlessrole('user')
    @if($ormas->status == 'validasi')
    <div class="card mb-6">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-ballot"></i></span>
       Final pdf
        </p>
      </header>
      <div class="card-content">
        <form method="POST" action="{{ route('ormas.ormas.final', $ormas->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="field">
              <label class="label">Final PDF: {{ $ormas->final }} </label>
              <div class="field-body">
                <div class="field">
                  <label for="final" class="sr-only">Choose file</label>
                  <input type="file" name="final" id="final" class="block w-full border border-black shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400
                    file:border-0
                    file:bg-gray-100 file:mr-4
                    file:py-3 file:px-4
                    dark:file:bg-gray-700 dark:file:text-gray-400">
                  </div>
                </div>
                @error('final')
              <p class=" text-xs text-red-500">{{ $message }}</p>
              @enderror
              @if($ormas->final != '' )
              <a id="downloadLink" href="{{ route('ormas.ormas.finalD', ['filename' => $ormas->final]) }}" class="button light my-2 ml-1" >
                download
              </a>
              <a id="downloadLink" href="{{ route('ormas.ormas.finalview', ['filename' => $ormas->final]) }}" class="button blue my-2 ml-1" >
                  View
                 </a>
                 @endif
                
              </div>
          </div>
          
          

          <hr>
<div class="card-content">
  <div class="field">
          <div class="field grouped">
            <div class="control">
              <button type="submit" class="button green">
                Submit
              </button>
            </div>
            <div class="control">
              <button type="reset" class="button red">
                Reset
              </button>
            </div>
          </div>
        </div>
        </div>
        </form>
      </div>
    </div>
@endif
@endunlessrole('user')
    
  </section>
 

@include('layouts.mfooter')

<div id="sample-modal" class="modal">
  <div class="modal-background --jb-modal-close"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Sample modal</p>
    </header>
    <section class="modal-card-body">
      <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
      <p>This is sample modal</p>
    </section>
    <footer class="modal-card-foot">
      <button class="button --jb-modal-close">Cancel</button>
      <button class="button red --jb-modal-close">Confirm</button>
    </footer>
  </div>
</div>

<div id="sample-modal-2" class="modal">
  <div class="modal-background --jb-modal-close"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Sample modal</p>
    </header>
    <section class="modal-card-body">
      <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
      <p>This is sample modal</p>
    </section>
    <footer class="modal-card-foot">
      <button class="button --jb-modal-close">Cancel</button>
      <button class="button blue --jb-modal-close">Confirm</button>
    </footer>
  </div>
</div>

</div>

<!-- Scripts below are for demo only -->
<script type="text/javascript" src="js/main.min.js?v=1628755089081"></script>


<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '658339141622648');
  fbq('track', 'PageView');
  
  // Attach an event listener to the download link
  document.getElementById('downloadLink','downloadLink1').addEventListener('click', function (event) {
    // Prevent the default behavior (i.e., immediately downloading the file)
    event.preventDefault();

    // Show a message to the user
    alert('The download will start shortly.');

    // Wait for a short delay before triggering the download
    setTimeout(function () {
      // Get the download link URL
      var downloadUrl = event.target.getAttribute('href');

      // Initiate the file download
      window.location.href = downloadUrl;
    }, 1000); // Change the delay value (in milliseconds) if you want to adjust the message display time
  });
</script>

<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=658339141622648&ev=PageView&noscript=1"/></noscript>

<!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">

</body>
</html>
