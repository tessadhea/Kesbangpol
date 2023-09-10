@include('layouts.mhead')
<body>
  <!-- Required chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div id="app">


@include('layouts.headbar')

@include('layouts.sidebar')


<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      Dashboard
    </h1>
  
  </div>
</section>

  <section class="section main-section">
    <div class="flex mb-4">
      <div class="card ">
        <div class="card-content">
          <div class="flex items-center justify-between">
            <div class="widget-label">
              <h3>
                <a class="hover:text-green-500  hover:text-xl  " href="/ormas">Data Ormas </a>
              </h3>
              <h1>
                {{ $ormases }}
              </h1>
            </div>
            <span class="icon widget-icon text-green-500"><i class="mdi mdi-account-group mdi-48px"></i></span>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-content">
          <div class="flex items-center justify-between">
            <div class="widget-label">
              <h3>
                <a class="hover:text-blue-500  hover:text-xl  " href="/ibadah"> Data Pendaftaran Rumah Ibadah</a>
              </h3>
              <h1>
                {{ $ibadahs }}
              </h1>
            </div>
            <span class="icon widget-icon text-blue-500"><i class="mdi mdi-home-group mdi-48px"></i></span>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-content">
          <div class="flex items-center justify-between">
            <div class="widget-label">
              <h3>
                <a class="hover:text-red-500  hover:text-xl  " href="/penelitian"> Data Rekomendasi Penelitian</a>
              </h3>
              <h1>
               {{ $penelitians }}
              </h1>
            </div>
            <span class="icon widget-icon text-red-500"><i class="mdi mdi-magnify mdi-48px"></i></span>
          </div>
        </div>
      </div>
      <div class="card ">
        <div class="card-content">
          <div class="flex items-center justify-between">
            <div class="widget-label">
              <h3>
                <a class="hover:text-slate-500  hover:text-xl  " href="/keramaian">Surat Izin Keramaian</a>
              </h3>
              <h1>
               {{ $keramaians }}
              </h1>
            </div>
            <span class="icon widget-icon text-slate-500"><i class="mdi mdi-mail mdi-48px"></i></span>
          </div>
        </div>
      </div>
    </div>

    <div class="card mb-6">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-finance"></i></span>
          Performance
        </p>
        <a href="#" class="card-header">
          <span class="icon"><i class="mdi mdi-reload"></i></span>
        </a>
      </header>
      <div class="card-content">
        <div class="chart-area flex flex-row">
          <div >
            <label for="chartDoughnut" class=" mx-28">
              Ormas
            </label>
            <canvas class="p-10" id="chartDoughnut"></canvas>
            
        </div>
        <div class="flex w-full flex-row-reverse">
        <div  class="" >
          <label for="chartDoughnut2" class=" mx-28">
            Data Pendaftaran Rumah Ibadah
          </label>
          <canvas class="p-10" id="chartDoughnut2"></canvas>
          
      </div>
    </div>
      </div>
      <div class="chart-area flex flex-row">
        <div >
          <label for="chartDoughnut3" class=" mx-28">
            Data Rekomendasi Penelitian
          </label>
          <canvas class="p-10" id="chartDoughnut3"></canvas>
          
      </div>
      <div class="flex w-full flex-row-reverse">
      <div  class="" >
        <label for="chartDoughnut4" class=" mx-28">
         Surat Izin Keramaian
        </label>
        <canvas class="p-10" id="chartDoughnut4"></canvas>
        
    </div>
  </div>
    </div>
    </div>
    <div>
     
        


    </div>
    <div class="card mb-6">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-finance"></i></span>
          Performance
        </p>
        <a href="#" class="card-header">
          <span class="icon"><i class="mdi mdi-reload"></i></span>
        </a>
      </header>
    <div class="card-content">
      <div class="chart-area">
        <div class="h-full">
          <div class="chartjs-size-monitor">
            <div class="chartjs-size-monitor-expand">
              <div></div>
            </div>
            <div class="chartjs-size-monitor-shrink">
              <div></div>
            </div>
          </div>
          <canvas id="chartLine1" width="2992" height="1000" class="chartjs-render-monitor block" style="height: 400px; width: 1197px;"></canvas>
        </div>
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




<!-- Chart doughnut -->
 var Selesai = [{{ $selesai1 }}];
 var Belum = [{{ $belum_validasi1 }}];
 var validasi = [{{ $validasi1 }}];
  const dataDoughnut = {
    labels: ["selesai", "validasi", "belum_validasi"],
    datasets: [
      {
        label: "My First Dataset",
        data: [Selesai, validasi, Belum],
        backgroundColor: [
          "rgb(255, 0, 0)",
          "rgb(0, 128, 0)",
          "rgb(0, 0, 255)",
        ],
        hoverOffset: 4,
      },
    ],
  };

  const configDoughnut = {
    type: "doughnut",
    data: dataDoughnut,
    options: {},
  };

  var chartBar = new Chart(
    document.getElementById("chartDoughnut"),
    configDoughnut
  );

var Selesai1 = [{{ $selesai2 }}];
 var Belum1 = [{{ $belum_validasi2 }}];
 var validasi1 = [{{ $validasi2 }}];
  <!-- Chart doughnut -->

  const dataDoughnut2 = {
    labels:  ["selesai", "validasi", "belum_validasi"],
    datasets: [
      {
        label: "My First Dataset",
        data: [Selesai1, validasi1, Belum1],
        backgroundColor: [
          "rgb(255, 0, 0)",
          "rgb(0, 128, 0)",
          "rgb(0, 0, 255)",
        ],
        hoverOffset: 4,
      },
    ],
  };

  const configDoughnut2 = {
    type: "doughnut",
    data: dataDoughnut2,
    options: {},
  };

  var chartBar = new Chart(
    document.getElementById("chartDoughnut2"),
    configDoughnut2
  );


  var Selesai2 = [{{ $selesai3 }}];
 var Belum2 = [{{ $belum_validasi3 }}];
 var validasi2 = [{{ $validasi3 }}];
  <!-- Chart doughnut -->

  const dataDoughnut3 = {
    labels: ["selesai", "validasi", "belum_validasi"],
    datasets: [
      {
        label: "My First Dataset",
        data: [Selesai2, validasi2, Belum2],
        backgroundColor: [
          "rgb(255, 0, 0)",
          "rgb(0, 128, 0)",
          "rgb(0, 0, 255)",
        ],
        hoverOffset: 4,
      },
    ],
  };

  const configDoughnut3 = {
    type: "doughnut",
    data: dataDoughnut3,
    options: {},
  };

  var chartBar = new Chart(
    document.getElementById("chartDoughnut3"),
    configDoughnut3
  );
  var Selesai3 = [{{ $selesai4 }}];
 var Belum3 = [{{ $belum_validasi4 }}];
 var validasi3 = [{{ $validasi4 }}];
  <!-- Chart doughnut -->

const dataDoughnut4 = {
  labels: ["selesai", "validasi", "belum_validasi"],
  datasets: [
    {
      label: "My First Dataset",
      data: [Selesai3, validasi3, Belum3],
      backgroundColor: [
        "rgb(255, 0, 0)",
          "rgb(0, 128, 0)",
          "rgb(0, 0, 255)",
      ],
      hoverOffset: 4,
    },
  ],
};

const configDoughnut4 = {
  type: "doughnut",
  data: dataDoughnut4,
  options: {},
};

var chartBar = new Chart(
  document.getElementById("chartDoughnut4"),
  configDoughnut4
);


<!-- Chart line -->

var januaryorm = {!! json_encode($January) !!};

var Augorm ={!! json_encode($Augorm) !!};
var septOrm={!! json_encode($septOrm) !!}

const dataLine1 = {
  labels: ['Januari', 'Februari' , 'Maret' , 'April' , 'Mei' , 'Juni' , 'Juli ','Agustus','September', 'Oktober', 'November','Desember' ],
  datasets: [
    {
      label: "Layanan Organisasi Masyarakat",
      data: [januaryorm,0,0,0,0,0,0,Augorm,septOrm],
    
      hoverOffset: 4,
    },
    {
      label: "Data Pendaftaran Rumah Ibadah",
      data: [300, 225, 500],
    
      hoverOffset: 4,
    },
    {
      label: "Data Rekomendasi Penelitian",
      data: [320, 125, 300],
    
      hoverOffset: 4,
    },
    {
      label: "Surat Izin Keramaian",
      data: [400, 325, 100],
    
      hoverOffset: 4,
    },
  ],
};

const configLine1 = {
  type: "line",
  data: dataLine1,
  options: {responsive: true,
    interaction: {
      mode: 'index',
      intersect: false,
    },
    stacked: false,
    plugins: {
      title: {
        display: true,
        text: 'Rekap Bulanan'
      }
    },
    scales: {
      y: {
        type: 'linear',
        display: true,
        position: 'left',
      },
      y1: {
        type: 'linear',
        display: true,
        position: 'right',

        // grid line settings
        grid: {
          drawOnChartArea: false, // only want the grid lines for one axis to show up
        },
      },
    }},
};

var chartBar = new Chart(
  document.getElementById("chartLine1"),
  configLine1
 
);
chart.update();


</script>

<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=658339141622648&ev=PageView&noscript=1"/></noscript>

<!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">

</body>
</html>
