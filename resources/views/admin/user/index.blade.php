@include('layouts.mhead')
<body>

<div id="app">


@include('layouts.headbar')

@include('layouts.sidebar')



<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      Daftar Akun
    </h1>
 
  </div>
</section>

  <section class="section main-section">
   


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



  <div class="flex mb-4">
    <div class="card w-full">
      <div class="card-content">
        <div class="flex items-center justify-between">
          <div class="widget-label">
            <h3>
             Admin
            </h3>
            <h1>
             {{ $admin }}
            </h1>
          </div>
          <span class="icon widget-icon text-green-500"><i class="mdi mdi-security mdi-48px"></i></span>
        </div>
      </div>
    </div>
    <div class="card w-full">
      <div class="card-content">
        <div class="flex items-center justify-between">
          <div class="widget-label">
            <h3>
              Validator
            </h3>
            <h1>
              {{ $validator }}
            </h1>
          </div>
          <span class="icon widget-icon text-blue-500"><i class="mdi mdi-check-circle mdi-48px"></i></span>
        </div>
      </div>
    </div>

    <div class="card w-full">
      <div class="card-content">
        <div class="flex items-center justify-between">
          <div class="widget-label">
            <h3>
             User
            </h3>
            <h1>
             {{ $userC }}
            </h1>
          </div>
          <span class="icon widget-icon text-red-500"><i class="mdi mdi-account-group mdi-48px"></i></span>
        </div>
      </div>
    </div>
    
  </div>
</div>
<div class="flex-row mb-3">
  <form action="/admin/user">
  <input class="" type="text" name="nama" placeholder="Search by name" > 
  <button class="button blue">Search</button>



  </form>
</div>
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
          Clients
        </p>
        <a href="#" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-reload"></i></span>
        </a>
      </header>
      <div class="card-content">
        <table>
          <thead>
          <tr>
            <th class="checkbox-cell">
              <label class="checkbox">
                <input type="checkbox">
                <span class="check"></span>
              </label>
            </th>
           
            <th>Nama</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            
            <th></th>
          </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
          <tr>
            <td class="checkbox-cell">
              <label class="checkbox">
                <input type="checkbox">
                <span class="check"></span>
              </label>
            </td>
           
            <td data-label="Name">{{ $user->name }}</td>
            <td data-label="Company">{{ $user->username }}</td>
            <td data-label="City">{{ $user->email }}</td>
            <td data-label="City">{{ $user->getRoleNames()->first() }}</td>
            <td class="actions-cell">
              <div class="buttons right nowrap">
                <a href=" {{ route('admin.user.show', $user->id) }}" class="button   green --jb-modal"  >
                  <span class="icon"><i class="mdi mdi-pen"></i></span>
                  </a>
                <form class="button  red " method="POST" action="{{ route('admin.user.destroy', $user->id) }}" onsubmit="return confirm ('apakah anda yakin ingin menghapus user?');">
                  @csrf
                  @method('DELETE')
                      <button type="submit"><i class="mdi mdi-trash-can"></i></button>
                </form>
              </div>
            </td>
          </tr>
          @endforeach
          
          </tbody>
        </table>
        <div class="table-pagination">
          <div class="flex items-center justify-between">
            <div class="buttons">
              <button type="button" class="button active">1</button>
              <button type="button" class="button">2</button>
              <button type="button" class="button">3</button>
            </div>
            <small>Page 1 of 3</small>
          </div>
        </div>
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
