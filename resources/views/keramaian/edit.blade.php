@include('layouts.mhead')
<body>

<div id="app">


@include('layouts.headbar')

@include('layouts.sidebar')

<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      Detail Izin Keramaian
    
    </h1>
    
    <a href="{{ route('keramaian.index') }}" class=" text-3xl hover:text-4xl">  <span class="icon"><i class="mdi mdi-arrow-left-bold-circle  "></i></span></a>
  
  </div>
  <div class=" flex flex-row-reverse items-center mt-2 ">
    <h1 class="title">
      
    </h1>
   
   
   
   
        @if(auth()->user()->can('validasi_ormas') && $keramaian->status === 'belum_validasi')

        <form method="POST" action="{{ route('keramaian.keramaian.validasi', $keramaian->id) }}" onsubmit="return confirm ('apakah anda yakin ingin validasi data?');">
          @csrf
         
    <button type="submit" class="button blue ml-2">Validasi Data</a>
  </form>
    @endif
    {{-- @if(auth()->user()->can('validasi_ormas') && $penelitian->status === 'ditolak')

    <form method="POST" action="{{ route('penelitian.penelitian.resubmit', $penelitian->id) }}" onsubmit="return confirm ('apakah anda yakin ingin submit lagi data?');">
      @csrf
     
<button type="submit" class="button blue ml-2">resubmit</a>
</form>
@endif --}}
    @if(auth()->user()->can('tolak_ormas') && $keramaian->status === 'belum_validasi')

    <form method="POST" action="{{ route('keramaian.keramaian.tolak', $keramaian->id) }}" onsubmit="return confirm ('apakah anda yakin ingin menolak data?');">
      @csrf
     
<button type="submit" class="button red">Tolak Data</a>
</form>
@endif
    @if(auth()->user()->can('validasi_ormas') && $keramaian->status === 'validasi')

    <form method="POST" action="{{ route('keramaian.keramaian.selesai', $keramaian->id) }}" onsubmit="return confirm ('apakah anda yakin ingin menyelesaikan proses?');">
      @csrf
     
<button  @if($keramaian->final == '') disabled @endif type="submit" class="button blue">Selesaikan Proses</a>
</form>
@endif
@if(auth()->user()->can('view_surat') && $keramaian->status === 'validasi')

<form method="POST" action="{{ route('keramaian.keramaian.suratrev', $keramaian->id) }}" onsubmit="return confirm ('apakah anda yakin ingin menyelesaikan proses?');">
  @csrf
 
<button type="submit" class="button light mr-3">Edit Atribut Surat</a>
</form>
@endif
@if(auth()->user()->can('view_surat') && $keramaian->status === 'validasi')

<form method="GET" action="{{ route('keramaian.keramaian.pdf', $keramaian->id) }}" >
  @csrf
 
<button type="submit" class="button green mr-3">Tinjau Surat</a>
</form>
@endif
  </div>

  <section class="section main-section">
    @if( $keramaian->status === 'validasi' &&  $keramaian->final != '')
    
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
      @if($keramaian->status === 'validasi' &&  $keramaian->final == '')
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
    @if($keramaian->status === 'ditolak')
    @foreach($pesans as $pesan)
    <div class="notification red mt-1" x-data="{open: true}" x-show="open">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
          <div>
            <span class="icon"><i class="mdi mdi-buffer"></i></span>
            <b>pesan perbaikan : {{ $pesan->pesan }} </b> 
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
          Detail Data Izin keramaian
        </p>
      </header>
      <div class="card-content">
        <form method="POST" action="{{ route('keramaian.keramaian.update', $keramaian->id) }}" enctype="multipart/form-data">
            @csrf
          
          <div class="field">
            <label class="label">Nama Pemohon</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input value="{{ $keramaian->nama_pemohon }}" class="input" id="nama_pemohon" name="nama_pemohon" type="text" placeholder="Name">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
              @error('nama_pemohon')
            <p class=" text-xs text-red-500">{{ $message }}</p>
            @enderror
            </div>
          </div>
          <div class="field">
            <label class="label">Jabatan</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input  value="{{ $keramaian->jabatan }}" class="input" id="jabatan" name="jabatan" type="text" placeholder="Name">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
              @error('jabatan')
            <p class=" text-xs text-red-500">{{ $message }}</p>
            @enderror
            </div>
          </div>
          <div class="field">
            <label class="label">Jenis Kegiatan</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input value="{{ $keramaian->kegiatan }}" class="input" id="kegiatan" name="kegiatan" type="text" placeholder="Name">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
              @error('kegiatan')
            <p class=" text-xs text-red-500">{{ $message }}</p>
            @enderror
            </div>
          </div>
          <div class="field">
            <label class="label">Tempat Pelaksanaan</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input value="{{ $keramaian->tempat }}" class="input" id="tempat" name="tempat" type="text" placeholder="Name">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
              @error('tempat')
            <p class=" text-xs text-red-500">{{ $message }}</p>
            @enderror
            </div>
          </div>
          <div class="field">
            <label class="label">Durasi Pelaksanaan</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input value="{{ $keramaian->waktu_durasi }}" class="input" id="waktu_durasi" name="waktu_durasi" type="text" placeholder="Name">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
              @error('waktu_durasi')
            <p class=" text-xs text-red-500">{{ $message }}</p>
            @enderror
            </div>
          </div>
          <div class="field">
            <label class="label">Hari/Tanggal</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input value="{{ $keramaian->date }}" class="input" id="date" name="date" type="text" placeholder="Name">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
              @error('date')
            <p class=" text-xs text-red-500">{{ $message }}</p>
            @enderror
            </div>
          </div>
          <div class="field">
            <label class="label">Surat Permohonan (Tentang Kegiatan Apa): {{ $keramaian->permohonan }}</label>
            <div class="field-body">
              <div class="field">
                <label for="permohonan" class="sr-only">Choose file</label>
                <input type="file" name="permohonan" id="permohonan" class="block w-full border border-black shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400
                 file:border-0
                  file:bg-gray-100 file:mr-4
                  file:py-3 file:px-4
                  dark:file:bg-gray-700 dark:file:text-gray-400">
                </div>
              </div>
              @error('permohonan')
            <p class=" text-xs text-red-500">{{ $message }}</p>
            @enderror
            <a id="downloadLink1" href="{{ route('keramaian.keramaian.permohonan', ['filename' => $keramaian->permohonan]) }}" class="button blue my-2 ml-1" >
                Download
               </a>
               <a id="downloadLink" href="{{ route('keramaian.keramaian.permohonanView', ['filename' => $keramaian->permohonan]) }}" class="button light my-2 ml-1" >
                View
               </a>
            </div>
            <div class="field">
              <label class="label">KTP: {{ $keramaian->ktp }}</label>
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
              <a id="downloadLink1" href="{{ route('keramaian.keramaian.ktp', ['filename' => $keramaian->ktp]) }}" class="button blue my-2 ml-1" >
                Download
               </a>
               <a id="downloadLink" href="{{ route('keramaian.keramaian.ktpView', ['filename' => $keramaian->ktp]) }}" class="button light my-2 ml-1" >
                View
               </a>
              </div>
                    </div>
          

          <hr>
          @if($keramaian->status == "belum_validasi" && auth()->user()->can('update_keramaian') || $keramaian->status == "ditolak")
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
    @if($keramaian->status == 'validasi')
    <div class="card mb-6">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-ballot"></i></span>
       Final PDF
        </p>
      </header>
      <div class="card-content">
        <form method="POST" action="{{ route('keramaian.keramaian.final', $keramaian->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="field">
              <label class="label">Final PDF: {{ $keramaian->final }} </label>
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
              @if($keramaian->final != '' )
              <a id="downloadLink" href="{{ route('keramaian.keramaian.finalD', ['filename' => $keramaian->final]) }}" class="button light my-2 ml-1" >
                Download
              </a>
              <a id="downloadLink" href="{{ route('keramaian.keramaian.finalview', ['filename' => $keramaian->final]) }}" class="button blue my-2 ml-1" >
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
