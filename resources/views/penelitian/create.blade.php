@include('layouts.mhead')
<body>

<div id="app">


@include('layouts.headbar')

@include('layouts.sidebar')

<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      Daftarkan Rekomendasi Penelitian
    </h1>
    <a href="{{ route('penelitian.index') }}" class=" text-3xl hover:text-4xl">  <span class="icon"><i class="mdi mdi-arrow-left-bold-circle  "></i></span></a>
  
  </div>

  <section class="section main-section">
    <div class="card mb-6">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-ballot"></i></span>
          Tambah Penelitian
        </p>
      </header>
      <div class="card-content">
        <form method="POST" action="{{ route('penelitian.penelitian.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="User_id" value="{{ $user_id }}">
          <div class="field">
            <label class="label">Nama Pemohon </label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input class="input" id="nama_pemohon" name="nama_pemohon" type="text" placeholder="Name">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
              @error('nama_pemohon')
            <p class=" text-xs text-red-500">{{ $message }}</p>
            @enderror
            </div>
          </div>
          <div class="field">
            <label class="label">NIM </label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input class="input" id="nim" name="nim" type="text" placeholder="Name">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
              @error('nim')
            <p class=" text-xs text-red-500">{{ $message }}</p>
            @enderror
            </div>
          </div>
          <div class="field">
            <label class="label">Lokasi Penelitian</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input class="input" id="lokasi" name="lokasi" type="text" placeholder="Name">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
              @error('lokasi')
            <p class=" text-xs text-red-500">{{ $message }}</p>
            @enderror
            </div>
          </div>
          <div class="field">
            <label class="label">Durasi Penelitian</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input class="input" id="waktu" name="waktu" type="text" placeholder="Name">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
              @error('waktu')
            <p class=" text-xs text-red-500">{{ $message }}</p>
            @enderror
            </div>
          </div>
          <div class="field">
            <label class="label">Penanggung Jawab</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input class="input" id="penanggung_jawab" name="penanggung_jawab" type="text" placeholder="Name">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
              @error('penanggung_jawab')
            <p class=" text-xs text-red-500">{{ $message }}</p>
            @enderror
            </div>
          </div>
          <div class="field">
            <label class="label">Instansi</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input class="input" id="instansi" name="instansi" type="text" placeholder="Name">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
              @error('instansi')
            <p class=" text-xs text-red-500">{{ $message }}</p>
            @enderror
            </div>
          </div>
          <div class="field">
            <label class="label">Surat Pengantar Dari Kampus</label>
            <div class="field-body">
              <div class="field">
                <label for="pengantar" class="sr-only">Choose file</label>
                <input type="file" name="pengantar" id="pengantar" class="block w-full border border-black shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400
                  file:border-0
                  file:bg-gray-100 file:mr-4
                  file:py-3 file:px-4
                  dark:file:bg-gray-700 dark:file:text-gray-400">
                </div>
              </div>
              @error('pengantar')
            <p class=" text-xs text-red-500">{{ $message }}</p>
            @enderror
            </div>
            <div class="field">
              <label class="label">KTP</label>
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
