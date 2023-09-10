@include('layouts.mhead')
<body>

<div id="app">


@include('layouts.headbar')

@include('layouts.sidebar')

<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      Detail Roles
    </h1>
    <a href="{{ route('admin.roles.index') }}" class=" text-3xl hover:text-4xl">  <span class="icon"><i class="mdi mdi-arrow-left-bold-circle  "></i></span></a>
  </div>
  @if(session()->has('success'))
  <div class="notification green mt-1" x-data="{open: true}" x-show="open">
      <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
        <div>
          <span class="icon"><i class="mdi mdi-buffer"></i></span>
          <b>{{ session('success') }}</b> 
        </div>
        <button @click="open = false" type="button" class="button small textual ">Dismiss</button>
      </div>
    </div>

@endif

  <section class="section main-section">
    <div class="card mb-0">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-ballot"></i></span>
         Roles
        </p>
      </header>
      <div class="card-content">
        <form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
            @csrf
            @method('PUT')
          <div class="field">
            <label class="label">Nama Role</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input class="input" id="name" name="name" type="text" placeholder="Name" value="{{ $role->name }}">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
              @error('name')
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

  <div class="section main-section">
    <div class="card mb-0">
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><i class="mdi mdi-ballot-outline"></i></span>
        Role Permission
      </p>
    </header>
    <div class="card-content">
      
          
      <div class="field">
        <label class="label">Permission</label>
        <div class="field-body">
          <div class="field">
            @if ($role->permissions)
            @foreach($role->permissions as $role_permission)
            <label class="switch mr-2 my-2">
            
              <form class="button  blue " method="POST" action="{{ route('admin.roles.permissions.revoke',[$role->id, $role_permission->id]) }}" onsubmit="return confirm ('apakah anda yakin ingin drop permission?');">
                @csrf
                @method('DELETE')
                    <button type="submit">{{ $role_permission->name }}</button>
              </form>
              
            </label>
           @endforeach
           @endif
            
            
          </div>
        </div>
      </div>
     
      
    </div>
  </div>
  </div>

  <div class="section main-section">
    <div class="card mb-0">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-ballot"></i></span>
          Assign Permission
        </p>
      </header>
      <div class="card-content">
        <form method="POST" action="{{ route('admin.roles.permissions', $role->id) }}">
            @csrf
            
          <div class="field">
           
            <div class="field">
              <label class="label">Nama Permission</label>
              <div class="field-body">
                <div class="field">
                  @foreach ($permissions as $permission )
                  <label class="switch mr-3">
                    <input type="checkbox" value="{{ $permission->name }}" name="permission">
                    <span class="check"></span>
                    <span class="control-label">{{ $permission->name }}</span>
                  </label>
                  @endforeach
                </div>
              </div>
            </div>
          <hr>

          <div class="field grouped">
            <div class="control">
              <button type="submit" class="button green">
                Assign
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





  </div>




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
