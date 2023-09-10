@include('layouts.mhead')
<body>

<div id="app">


@include('layouts.headbar')

@include('layouts.sidebar')

<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      Daftarkan Ormas
    </h1>
    
    <a href="{{ route('ormas.index') }}" class=" text-3xl hover:text-4xl">  <span class="icon"><i class="mdi mdi-arrow-left-bold-circle  "></i></span></a>
  
  </div>

  <section class="section main-section">
    <div class="card mb-6">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-ballot"></i></span>
          Tambah Ormas
        </p>
      </header>
      <div class="card-content">
        <form method="POST" action="{{ route('ormas.ormas.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="User_id" value="{{ $user_id }}">
          <div class="field">
            <label class="label">Nama Ormas</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input class="input" id="nama_ormas" name="nama_ormas" type="text" placeholder="Name">
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
                  <input class="input" id="nama_ketua" name="nama_ketua" type="text" placeholder="Name">
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
                  <input class="input" id="nama_sek" name="nama_sek" type="text" placeholder="Name">
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
                    <input class="input" id="nama_bend" name="nama_bend" type="text" placeholder="Name">
                    <span class="icon left"><i class="mdi mdi-account"></i></span>
                  </div>
                </div>
                @error('nama_bend')
              <p class=" text-xs text-red-500">{{ $message }}</p>
              @enderror
              </div>
          </div>
          <div class="field">
            <label class="label">Bidang Kegiatan</label>
            <div class="field-body">

              <div class="field">
                <div class="control icons-left">
                  <input class="input" id="bid" name="bid" type="text" placeholder="Name">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
              @error('bid')
            <p class=" text-xs text-red-500">{{ $message }}</p>
            @enderror
            </div>
        </div>
          <div class="field">
            <label class="label">Alamat Domisili</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input class="input" id="alamat_domisili" name="alamat_domisili" type="text" placeholder="Name">
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
                  <input class="input" id="no_hp" name="no_hp" type="text" placeholder="Name">
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
                  <input class="input" id="no_hp2" name="no_hp2" type="text" placeholder="Name">
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
                  <input class="input" id="no_hp3" name="no_hp3" type="text" placeholder="Name">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
              @error('no_hp3')
            <p class=" text-xs text-red-500">{{ $message }}</p>
            @enderror
            </div>
          </div>
          <div class="field">
            <label class="label">Scan Surat Permohonan</label>
            <div class="field-body">
              <div class="field">
                <label for="file-input-medium" class="sr-only">Choose file</label>
                <input type="file" name="scan_surat_permohonan" id="file-input-medium" class="block w-full border border-black shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400
                  file:border-0
                  file:bg-gray-100 file:mr-4
                  file:py-3 file:px-4
                  dark:file:bg-gray-700 dark:file:text-gray-400">
                </div>
              </div>
              @error('scan_surat_permohonan')
            <p class=" text-xs text-red-500">{{ $message }}</p>
            @enderror
            </div>
            <div class="field">
              <label class="label">Scan Surat Keterangan Mendagri</label>
              <div class="field-body">
                <div class="field">
                  <label for="scan_sk_mendagri" class="sr-only">Choose file</label>
                  <input type="file" name="scan_sk_mendagri" id="scan_sk_mendagri" class="block w-full border border-black shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400
                     file:border-0
                    file:bg-gray-100 file:mr-4
                    file:py-3 file:px-4
                    dark:file:bg-gray-700 dark:file:text-gray-400">
                  </div>
                </div>
                @error('scan_sk_mendagri')
              <p class=" text-xs text-red-500">{{ $message }}</p>
              @enderror
              </div>
              <div class="field">
                <label class="label">AD ART</label>
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
                </div>
                <div class="field">
                  <label class="label">Program Kerja</label>
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
                  </div>
                  <div class="field">
                    <label class="label">Foto KTP</label>
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
                    <div class="field">
                      <label class="label">Scan NPWP</label>
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
                      </div>
                      <div class="field">
                      <label class="label">Scan Surat Keterangan Domisili</label>
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
                      </div>
                      <div class="field">
                        <label class="label">Foto Kantor Sekertariat</label>
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
                        </div>
                        <div class="field">
                          <label class="label">Scan Pernyataan</label>
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
                          </div>
                          <div class="field">
                            <label class="label">Form Pengisian Data Ormas</label>
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
