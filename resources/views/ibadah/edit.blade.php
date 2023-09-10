@include('layouts.mhead')
<body>

<div id="app">


@include('layouts.headbar')

@include('layouts.sidebar')

<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
    Detail Rumah Ibadah
    </h1>
    
    <a href="{{ route('ibadah.index') }}" class=" text-3xl hover:text-4xl">  <span class="icon"><i class="mdi mdi-arrow-left-bold-circle  "></i></span></a>
  
  </div>
  <div class=" flex flex-row-reverse items-center mt-2 ">
    <h1 class="title">
      
    </h1>
   
   
   
   
        @if(auth()->user()->can('validasi_ibadah') && $ibadah->status === 'belum_validasi')

        <form method="GET" action="{{ route('ibadah.ibadah.validasi', $ibadah->id) }}" onsubmit="return confirm ('apakah anda yakin ingin validasi data?');">
          @csrf
         
    <button type="submit" class="button blue ml-2">Validasi Data</a>
  </form>
    @endif
    @if(auth()->user()->can('validasi_ibadah') && $ibadah->status === 'ditolak')

    <form method="POST" action="{{ route('ibadah.ibadah.resubmit', $ibadah->id) }}" onsubmit="return confirm ('apakah anda yakin ingin submit lagi data?');">
      @csrf
     
<button type="submit" class="button blue ml-2">Resubmit</a>
</form>
@endif
    @if(auth()->user()->can('tolak_ibadah') && $ibadah->status === 'belum_validasi')

    <form method="POST" action="{{ route('ibadah.ibadah.tolak', $ibadah->id) }}" onsubmit="return confirm ('apakah anda yakin ingin menolak data?');">
      @csrf
     
<button type="submit" class="button red">Tolak Data</a>
</form>
@endif
    @if(auth()->user()->can('selesai_ibadah') && $ibadah->status === 'validasi')

    <form method="POST" action="{{ route('ibadah.ibadah.selesai', $ibadah->id) }}" onsubmit="return confirm ('apakah anda yakin ingin menyelesaikan proses?');">
      @csrf
     
<button type="submit"  @if($ibadah->final == '') disabled @endif  class="button blue">Selesaikan Proses</a>
</form>
@endif
@if(auth()->user()->can('view_surat') && $ibadah->status === 'validasi')

<form method="POST" action="{{ route('ibadah.ibadah.suratrev', $ibadah->id) }}" onsubmit="return confirm ('apakah anda yakin ingin menyelesaikan proses?');">
  @csrf
 
<button type="submit" class="button light mr-3">Edit Atribut Surat</a>
</form>
@endif
@if(auth()->user()->can('view_surat') && $ibadah->status === 'validasi')

<form method="GET" action="{{ route('ibadah.ibadah.pdf', $ibadah->id) }}" >
  @csrf
 
<button type="submit" class="button green mr-3">Tinjau Surat</a>
</form>
@endif
  </div>

  <section class="section main-section">
    @if( $ibadah->status === 'validasi' &&  $ibadah->final != '')
    
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
      @if($ibadah->status === 'validasi' &&  $ibadah->final == '')
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
    @if($ibadah->status === 'ditolak')
    @foreach($pesans as $pesan)
    <div class="notification red mt-1" x-data="{open: true}" x-show="open">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
          <div>
            <span class="icon"><i class="mdi mdi-buffer"></i></span>
            <b>pesan perbaikan untuk {{ $ibadah->nama_RmIbadah }} : {{ $pesan->pesan }} </b> 
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
         detail data
        </p>
      </header>
      <div class="card-content">
        <form method="POST" action="{{ route('ibadah.ibadah.update', $ibadah->id) }}" enctype="multipart/form-data">
            @csrf
            
          <div class="field">
            <label class="label">nama Rumah Ibadah</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input value="{{ $ibadah->nama_RmIbadah }}" class="input" id="nama_RmIbadah" name="nama_RmIbadah" type="text" placeholder="{{ $ibadah->nama_RmIbadah }}">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
              @error('nama_RmIbadah')
            <p class=" text-xs text-red-500">{{ $message }}</p>
            @enderror
            </div>
          </div>
          <div class="field">
            <label class="label">nama ketua</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input  class="input" id="nama_ketua" name="nama_ketua" type="text" placeholder="Name" value="{{ $ibadah->nama_ketua }}">
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
                  <input  value="{{ $ibadah->nama_sekertaris }}" class="input" id="nama_sekertaris" name="nama_sekertaris" type="text" placeholder="Name">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
              @error('nama_sekertaris')
            <p class=" text-xs text-red-500">{{ $message }}</p>
            @enderror
            </div>
          </div>
          <div class="field">
            <label class="label">Nama Bendahara</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input value="{{ $ibadah->nama_bendahara }}" class="input" id="nama_bendahara" name="nama_bendahara" type="text" placeholder="Name">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
              @error('nama_bendahara')
            <p class=" text-xs text-red-500">{{ $message }}</p>
            @enderror
            </div>
          </div>
          <div class="field">
            <label class="label">alamat</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input value="{{ $ibadah->alamat }}" class="input" id="alamat" name="alamat" type="text" placeholder="Name">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
              @error('alamat')
            <p class=" text-xs text-red-500">{{ $message }}</p>
            @enderror
            </div>
          </div>
          <div class="field">
            <label class="label">nomor hp</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input value="{{ $ibadah->no_hp }}" class="input" id="no_hp" name="no_hp" type="text" placeholder="Name">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
              @error('no_hp')
            <p class=" text-xs text-red-500">{{ $message }}</p>
            @enderror
            </div>
          </div>
          <div class="field">
            <label class="label">Surat Permohonan Penerbitan SKTM dari Pengurus rumah ibadat :{{ $ibadah->SKTM }}</label>
            <div class="field-body">
              <div class="field">
                <label for="SKTM" class="sr-only">Choose file</label>
                <input type="file" name="SKTM" id="SKTM" class="block w-full border border-black shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400
                  file:bg-transparent file:border-0
                  file:bg-gray-100 file:mr-4
                  file:py-3 file:px-4
                  dark:file:bg-gray-700 dark:file:text-gray-400">
                </div>
              </div>
              @error('SKTM')
            <p class=" text-xs text-red-500">{{ $message }}</p>
            @enderror
            <a id="downloadLink" href="{{ route('ibadah.ibadah.SKTM', ['filename' => $ibadah->SKTM]) }}" class="button blue my-2 ml-1" >
              download
             </a>
             <a id="downloadLink" href="{{ route('ibadah.ibadah.SKTMView', ['filename' => $ibadah->SKTM]) }}" class="button light my-2 ml-1" >
               view
              </a>
            </div>
            <div class="field">
              <label class="label">Surat Keterangan Telah Mendaftar Dari Kementrian Agama : {{ $ibadah->sk_kementrian }}</label>
              <div class="field-body">
                <div class="field">
                  <label for="sk_kementrian" class="sr-only">Choose file</label>
                  <input type="file" name="sk_kementrian" id="sk_kementrian" class="block w-full border border-black shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400
                    file:bg-transparent file:border-0
                    file:bg-gray-100 file:mr-4
                    file:py-3 file:px-4
                    dark:file:bg-gray-700 dark:file:text-gray-400">
                  </div>
                </div>
                @error('sk_kementrian')
              <p class=" text-xs text-red-500">{{ $message }}</p>
              @enderror
              <a id="downloadLink" href="{{ route('ibadah.ibadah.sk_kementrian', ['filename' => $ibadah->sk_kementrian]) }}" class="button blue my-2 ml-1" >
                download
               </a>
               <a id="downloadLink" href="{{ route('ibadah.ibadah.sk_kementrianView', ['filename' => $ibadah->sk_kementrian]) }}" class="button light my-2 ml-1" >
                 view
                </a>
              </div>
              <div class="field">
                <label class="label">surat Keputusan Tentang Sususnan Pengurus Rumah Ibadat Secara Sah dari PUSAT : {{ $ibadah->sk_SpengurusPusat }} </label>
                <div class="field-body">
                  <div class="field">
                    <label for="sk_SpengurusPusat" class="sr-only">Choose file</label>
                    <input type="file" name="sk_SpengurusPusat" id="sk_SpengurusPusat" class="block w-full border border-black shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400
                      file:bg-transparent file:border-0
                      file:bg-gray-100 file:mr-4
                      file:py-3 file:px-4
                      dark:file:bg-gray-700 dark:file:text-gray-400">
                    </div>
                  </div>
                  @error('sk_SpengurusPusat')
                <p class=" text-xs text-red-500">{{ $message }}</p>
                @enderror
                <a id="downloadLink" href="{{ route('ibadah.ibadah.sk_SpengurusPusat', ['filename' => $ibadah->sk_SpengurusPusat]) }}" class="button blue my-2 ml-1" >
                  download
                 </a>
                 <a id="downloadLink" href="{{ route('ibadah.ibadah.sk_SpengurusPusatView', ['filename' => $ibadah->sk_SpengurusPusat]) }}" class="button light my-2 ml-1" >
                   view
                  </a>
                </div>
                <div class="field">
                  <label class="label">surat Keputusan Tentang Sususnan Pengurus Rumah Ibadat Secara Sah : {{ $ibadah->sk_Spengurus }}</label>
                  <div class="field-body">
                    <div class="field">
                      <label for="sk_Spengurus" class="sr-only">Choose file</label>
                      <input type="file" name="sk_Spengurus" id="sk_Spengurus" class="block w-full border border-black shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400
                        file:bg-transparent file:border-0
                        file:bg-gray-100 file:mr-4
                        file:py-3 file:px-4
                        dark:file:bg-gray-700 dark:file:text-gray-400">
                      </div>
                    </div>
                    @error('sk_Spengurus')
                  <p class=" text-xs text-red-500">{{ $message }}</p>
                  @enderror
                  <a id="downloadLink" href="{{ route('ibadah.ibadah.sk_pengurus', ['filename' => $ibadah->sk_Spengurus]) }}" class="button blue my-2 ml-1" >
                    download
                   </a>
                   <a id="downloadLink" href="{{ route('ibadah.ibadah.sk_pengurusView', ['filename' => $ibadah->sk_Spengurus]) }}" class="button light my-2 ml-1" >
                     view
                    </a>
                  </div>
                  <div class="field">
                    <label class="label">Biodata Pengurus Rumah Ibadat :{{ $ibadah->bio_pengurus }}</label>
                    <div class="field-body">
                      <div class="field">
                        <label for="bio_pengurus" class="sr-only">Choose file</label>
                        <input type="file" name="bio_pengurus" id="bio_pengurus" class="block w-full border border-black shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400
                          file:bg-transparent file:border-0
                          file:bg-gray-100 file:mr-4
                          file:py-3 file:px-4
                          dark:file:bg-gray-700 dark:file:text-gray-400">
                        </div>
                      </div>
                      @error('bio_pengurus')
                    <p class=" text-xs text-red-500">{{ $message }}</p>
                    @enderror
                    <a id="downloadLink" href="{{ route('ibadah.ibadah.bio_pengurus', ['filename' => $ibadah->bio_pengurus]) }}" class="button blue my-2 ml-1" >
                      download
                     </a>
                     <a id="downloadLink" href="{{ route('ibadah.ibadah.bio_pengurusView', ['filename' => $ibadah->bio_pengurus]) }}" class="button light my-2 ml-1" >
                       view
                      </a>
                    </div>
                    <div class="field">
                      <label class="label">Pas Foto Pengurus Rumah Ibadat :{{ $ibadah->pasfoto_pengurus }}</label>
                      <div class="field-body">
                        <div class="field">
                          <label for="pasfoto_pengurus" class="sr-only">Choose file</label>
                          <input type="file" name="pasfoto_pengurus" id="pasfoto_pengurus" class="block w-full border border-black shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400
                            file:bg-transparent file:border-0
                            file:bg-gray-100 file:mr-4
                            file:py-3 file:px-4
                            dark:file:bg-gray-700 dark:file:text-gray-400">
                          </div>
                        </div>
                        @error('pasfoto_pengurus')
                      <p class=" text-xs text-red-500">{{ $message }}</p>
                      @enderror
                      <a id="downloadLink" href="{{ route('ibadah.ibadah.pasfoto_pengurus', ['filename' => $ibadah->pasfoto_pengurus]) }}" class="button blue my-2 ml-1" >
                        download
                       </a>
                       <a id="downloadLink" href="{{ route('ibadah.ibadah.pasfoto_pengurusView', ['filename' => $ibadah->pasfoto_pengurus]) }}" class="button light my-2 ml-1" >
                         view
                        </a>
                      </div>
                      <div class="field">
                        <label class="label">KTP Pengurus Rumah Ibadat : {{ $ibadah->ktp_pengurus }}</label>
                        <div class="field-body">
                          <div class="field">
                            <label for="ktp_pengurus" class="sr-only">Choose file</label>
                            <input type="file" name="ktp_pengurus" id="ktp_pengurus" class="block w-full border border-black shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400
                              file:bg-transparent file:border-0
                              file:bg-gray-100 file:mr-4
                              file:py-3 file:px-4
                              dark:file:bg-gray-700 dark:file:text-gray-400">
                            </div>
                          </div>
                          @error('ktp_pengurus')
                        <p class=" text-xs text-red-500">{{ $message }}</p>
                        @enderror
                        <a id="downloadLink" href="{{ route('ibadah.ibadah.ktp_pengurus', ['filename' => $ibadah->ktp_pengurus]) }}" class="button blue my-2 ml-1" >
                          download
                         </a>
                         <a id="downloadLink" href="{{ route('ibadah.ibadah.ktp_pengurusView', ['filename' => $ibadah->ktp_pengurus]) }}" class="button light my-2 ml-1" >
                           view
                          </a>
                      </div>
                      
                      <div class="field">
                        <label class="label">Surat Keterangan Domisili : {{ $ibadah->sk_domisili }}</label>
                        <div class="field-body">
                          <div class="field">
                            <label for="sk_domisili" class="sr-only">Choose file</label>
                            <input type="file" name="sk_domisili" id="sk_domisili" class="block w-full border border-black shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400
                              file:bg-transparent file:border-0
                              file:bg-gray-100 file:mr-4
                              file:py-3 file:px-4
                              dark:file:bg-gray-700 dark:file:text-gray-400">
                            </div>
                          </div>
                          @error('sk_domisili')
                        <p class=" text-xs text-red-500">{{ $message }}</p>
                        @enderror
                        <a id="downloadLink" href="{{ route('ibadah.ibadah.sk_domisili', ['filename' => $ibadah->sk_domisili]) }}" class="button blue my-2 ml-1" >
                          download
                         </a>
                         <a id="downloadLink" href="{{ route('ibadah.ibadah.sk_domisiliView', ['filename' => $ibadah->sk_domisili]) }}" class="button light my-2 ml-1" >
                           view
                          </a>
                        </div>
                        <div class="field">
                          <label class="label">Foto Rumah Ibadah :{{ $ibadah->foto_ibadah }}</label>
                          <div class="field-body">
                            <div class="field">
                              <label for="foto_ibadah" class="sr-only">Choose file</label>
                              <input type="file" name="foto_ibadah" id="foto_ibadah" class="block w-full border border-black shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400
                                file:bg-transparent file:border-0
                                file:bg-gray-100 file:mr-4
                                file:py-3 file:px-4
                                dark:file:bg-gray-700 dark:file:text-gray-400">
                              </div>
                            </div>
                            @error('foto_ibadah')
                          <p class=" text-xs text-red-500">{{ $message }}</p>
                          @enderror
                          <a id="downloadLink" href="{{ route('ibadah.ibadah.foto_ibadah', ['filename' => $ibadah->foto_ibadah]) }}" class="button blue my-2 ml-1" >
                            download
                           </a>
                           <a id="downloadLink" href="{{ route('ibadah.ibadah.foto_ibadahView', ['filename' => $ibadah->foto_ibadah]) }}" class="button light my-2 ml-1" >
                             view
                            </a>
                          </div>
                        </div>
                    </div>
          

          <hr>
          @if($ibadah->status == 'belum_validasi' || $ibadah->status == 'ditolak' )
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
        </form>
      </div>
    </div>
    @if($ibadah->status == 'validasi')
    <div class="card mb-6">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-ballot"></i></span>
       Final pdf
        </p>
      </header>
      <div class="card-content">
        <form method="POST" action="{{ route('ibadah.ibadah.final', $ibadah->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="field">
              <label class="label">Final PDF: {{ $ibadah->final }} </label>
              <div class="field-body">
                <div class="field">
                  <label for="final" class="sr-only">Choose file</label>
                  <input type="file" name="final" id="final" class="block w-full border border-black shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400
                    file:bg-transparent file:border-0
                    file:bg-gray-100 file:mr-4
                    file:py-3 file:px-4
                    dark:file:bg-gray-700 dark:file:text-gray-400">
                  </div>
                </div>
                @error('final')
              <p class=" text-xs text-red-500">{{ $message }}</p>
              @enderror
              @if($ibadah->final != '' )
              <a id="downloadLink" href="{{ route('ibadah.ibadah.finalD', ['filename' => $ibadah->final]) }}" class="button light my-2 ml-1" >
                download
              </a>
              <a id="downloadLink" href="{{ route('ibadah.ibadah.finalview', ['filename' => $ibadah->final]) }}" class="button blue my-2 ml-1" >
                  view
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
</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=658339141622648&ev=PageView&noscript=1"/></noscript>

<!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">

</body>
</html>
