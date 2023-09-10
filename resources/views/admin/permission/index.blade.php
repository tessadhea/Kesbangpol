@include('layouts.mhead')
<body>

<div id="app">


@include('layouts.headbar')

@include('layouts.sidebar')

<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      PERMISSION
    </h1>
    <a href="{{ route('admin.permission.create') }}" class="button blue">Tambah Permission</a>
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
    <div class="flex-row mt-3">
      <form action="/admin/permission">
      <input class="" type="text" name="nama" placeholder="Search by name" > 
      <button class="button blue">Search</button>
    
    
    
      </form>
    </div>
   
   <div class="card has-table">
     <header class="card-header">
       <p class="card-header-title">
         <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
         Daftar Permission
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
           <th></th>
           <th></th>
           <th >Nama Permission</th>
           <th></th>
           <th></th>
           <th></th>
           <th></th>
           <th></th>
           <th></th>
          <th></th>
           
           <th></th>
         </tr>
         </thead>
         <tbody>
         <tr>
         @foreach ($permissions as $permission)
           <td class="checkbox-cell">
             <label class="checkbox">
               <input type="checkbox">
               <span class="check"></span>
             </label>
           </td>

           
           <td></td>
           <td></td>
           <td data-label="Name">{{ $permission->name  }}</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>

           <td class="actions-cell">
             <div class="buttons right nowrap">
               <a href="{{ route('admin.permission.edit', $permission->id) }}" class="button  green --jb-modal"  >
                 <span class="icon"><i class="mdi mdi-pen"></i></span>
                </a>
                <form class="button  red " method="POST" action="{{ route('admin.permission.destroy', $permission->id) }}" onsubmit="return confirm ('apakah anda yakin ingin menghapus permission?');">
                  @csrf
                  @method('DELETE')
                      <button type="submit"><i class="mdi mdi-trash-can"></i></button>
                </form>
             </div>
           </td>
         </tr>
         <tr>
           @endforeach
         </tbody>
       </table>
       <div class="table-pagination">
        {{ $permissions->links() }}
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
