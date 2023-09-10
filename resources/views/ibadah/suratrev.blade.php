@include('layouts.mhead')
<body>

<div id="app">


@include('layouts.headbar')

@include('layouts.sidebar')



<section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <h1 class="title">
       Atribut Surat
      </h1>
      <button  onclick="goBack()" class="text-3xl hover:text-4xl"> <span class="icon"><i class="mdi mdi-arrow-left-bold-circle  "></i></span></button> 
    </div>
  
    <section class="section main-section">
      <div class="card mb-6">
        <header class="card-header">
          <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-ballot"></i></span>
           surat
          </p>
        </header>
        <div class="card-content">
          <form method="POST" action="{{ route('ibadah.ibadah.suratrev.update', $surat->id) }}">
              @csrf
            
              <div class="field">
                <label class="label">Nomor Surat</label>
                <div class="flex w-full">
                <input type="text" value="{{ $surat->no1 }}" name="no1" placeholder="no.1" class="input">
                
                 </div>
              </div>
            <div class="field">
              <label class="label">Periode ketua</label>
              <div class="field-body">
                <div class="field">
                  <div class="control icons-left">
                    <input value="{{ $surat->pketua}}" class="input" id="pketua" name="pketua" type="text" >
                    
                  </div>
                </div>
                @error('pketua')
              <p class=" text-xs text-red-500">{{ $message }}</p>
              @enderror
          
            </div>
            <div class="field">
                <label class="label">Periode sekertaris dan bendahara</label>
                <div class="field-body">
                  <div class="field">
                    <div class="control icons-left">
                      <input value="{{ $surat->pother }}"   class="input" id="pother" name="pother" type="text" >
                      
                    </div>
                  </div>
                  @error('pother')
                <p class=" text-xs text-red-500">{{ $message }}</p>
                @enderror
            
              </div>
              <div class="field">
                <label class="label">tanggal surat dibuat</label>
                <div class="field-body">
                  <div class="field">
                    <div class="control icons-left">
                      <input value="{{ $surat->date}}" class="input" id="date" name="date" type="date" >
                      
                    </div>
                  </div>
                  @error('date')
                <p class=" text-xs text-red-500">{{ $message }}</p>
                @enderror
            
              </div>
            <hr>
  
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
  function goBack() {
            // Navigate back to the previous page using browser's history
            window.history.back();
        }
</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=658339141622648&ev=PageView&noscript=1"/></noscript>

<!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">

</body>
</html>
