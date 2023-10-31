<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css" />
        @vite('resources/css/app.css')
        <style>
       @keyframes tonext {
  75% {
    left: 0;
  }
  95% {
    left: 100%;
  }
  98% {
    left: 100%;
  }
  99% {
    left: 0;
  }
}

@keyframes tostart {
  75% {
    left: 0;
  }
  95% {
    left: -300%;
  }
  98% {
    left: -300%;
  }
  99% {
    left: 0;
  }
}

@keyframes snap {
  96% {
    scroll-snap-align: center;
  }
  97% {
    scroll-snap-align: none;
  }
  99% {
    scroll-snap-align: none;
  }
  100% {
    scroll-snap-align: center;
  }
}

/* body {
  max-width: 37.5rem;
  margin: 0 auto;
  padding: 0 1.25rem;
  font-family: 'Lato', sans-serif;
} */

* {
  box-sizing: border-box;
  scrollbar-color: transparent transparent; /* thumb and track color */
  scrollbar-width: 0px;
}

*::-webkit-scrollbar {
  width: 0;
}

*::-webkit-scrollbar-track {
  background: transparent;
}

*::-webkit-scrollbar-thumb {
  background: transparent;
  border: none;
}

* {
  -ms-overflow-style: none;
}

ol, li {
  list-style: none;
  margin: 0;
  padding: 0;
}

.carousel {
  position: relative;
  padding-top: 75%;
  filter: drop-shadow(0 0 10px #0003);
  perspective: 100px;
}

.carousel__viewport {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  display: flex;
  overflow-x: scroll;
  counter-reset: item;
  scroll-behavior: smooth;
  scroll-snap-type: x mandatory;
}

.carousel__slide {
  position: relative;
  flex: 0 0 100%;
  height: 60vh;
  width: full;
  background-color: trans;
  counter-increment: item;
}

.carousel__slide:nth-child(even) {
  background-color: transparent;
}

.carousel__slide:before {
  
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate3d(-50%,-40%,70px);
  color: #fff;
  font-size: 2em;
}

.carousel__snapper {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 50%;
  scroll-snap-align: center;
}

@media (hover: hover) {
  .carousel__snapper {
    animation-name: tonext, snap;
    animation-timing-function: ease;
    animation-duration: 4s;
    animation-iteration-count: infinite;
  }

  .carousel__slide:last-child .carousel__snapper {
    animation-name: tostart, snap;
  }
}

@media (prefers-reduced-motion: reduce) {
  .carousel__snapper {
    animation-name: none;
  }
}

.carousel:hover .carousel__snapper,
.carousel:focus-within .carousel__snapper {
  animation-name: none;
}

.carousel__navigation {
   
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  text-align: center;
}

.carousel__navigation-list,
.carousel__navigation-item {
  display: inline-block;
}

.carousel__navigation-button {
  margin-bottom: 50vh;
  display: inline-block;
  width: 1.5rem;
  height: 1rem;
  background-color: #333;
  background-clip: content-box;
  border: 0.25rem solid transparent;
  border-radius: 50%;
  font-size: 0;
  transition: transform 0.1s;
}

.carousel::before,
.carousel::after,
.carousel__prev,
.carousel__next {
  position: absolute;
  top: 0;
  margin-left: 3vh;
  margin-right: 3vh;
  margin-top: 17%;
  width: 4rem;
  height: 4rem;
  transform: translateY(-50%);
  border-radius: 50%;
  font-size: 0;
  outline: 0;
}

.carousel::before,
.carousel__prev {
  left: -1rem;
}

.carousel::after,
.carousel__next {
  right: -1rem;
}

.carousel::before,
.carousel::after {
  content: '';
  z-index: 1;
  background-color: #333;
  background-size: 1.5rem 1.5rem;
  background-repeat: no-repeat;
  background-position: center center;
  color: #fff;
  font-size: 2.5rem;
  line-height: 4rem;
  text-align: center;
  pointer-events: none;
}

.carousel::before {
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpolygon points='0,50 80,100 80,0' fill='%23fff'/%3E%3C/svg%3E");
}

.carousel::after {
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpolygon points='100,50 20,100 20,0' fill='%23fff'/%3E%3C/svg%3E");
}

    </style>

    </head>
    <body >
        <!-- navbar -->
       <div class="bg-red-500">
    <div class="container mx-auto py-3 px-4 sm:flex sm:items-center sm:justify-between">
        <div class="flex items-center">
            <div class="w-12 h-12">
                <img src="img/logo1.png" alt="logo">
            </div>
            <div class="ml-3">
                <h1 class="text-white text-2xl font-bold">KESBANGPOL</h1>
                <h2 class="text-white text-sm">KOTA MANADO</h2>
            </div>
        </div>
        <div class="sm:flex sm:space-x-4 mt-4 sm:mt-0">
            <a href="{{ route('register') }}" class="text-white text-lg font-sans">Sign In</a>
            <a href="/login" class="text-white text-lg font-sans">Login</a>
        </div>
    </div>
</div>
        <!-- endnavbar -->
        <!-- start content -->
<div class="   w-full h-[75vh] overflow-hidden bg-center bg-cover bg-no-repeat  bg-neutral-300  bg-blend-overlay" style="background-image: url(img/fixed.png);   "> 
    <div class="  w-full h- h-full  "> 
    <section class="carousel" aria-label="Gallery">
  <ol class="carousel__viewport">
    <li id="carousel__slide1"
        tabindex="0"
        class="carousel__slide">
        <div class="flex flex-col h-auto sm:h-96 mt-10 sm:mt-20 object-center bg-slate-500 bg-opacity-30 border-solid">
          <div class="grid gap-4 mt-4 mx-4 sm:mx-16 lg:mx-32">
            <h1 class="text-2xl sm:text-3xl lg:text-4xl text-center mt-14 mb-2">BADAN KESATUAN BANGSA DAN POLITIK KOTA MANADO</h1>
            <h2 class="text-lg lg:text-xl text-center">MOTTO PELAYANAN:</h2>
            <p class="text-sm lg:text-base text-center">
                “MELAYANI MASYARAKAT TUJUAN KAMI, KEPUASAN MASYARAKAT TEKAT KAMI”
            </p>
            <h2 class="text-lg lg:text-xl text-center">SLOGAN PELAYANAN:</h2>
            <p class="text-sm lg:text-base text-center">
                “MEMBERIKAN INFORMASI YANG AKURAT, CEPAT DALAM PELAYANAN, TEPAT SASARAN, TAAT HUKUM, BERTANGGUNG JAWAB, TRANSPARAN DAN RAMAH KEPADA MASYARAKAT”
            </p>
        </div>
      
        </div>

      <div class="carousel__snapper">
        <a href="#carousel__slide4"
           class="carousel__prev">Go to last slide</a>
        <a href="#carousel__slide2"
           class="carousel__next">Go to next slide</a>
      </div>
    </li>
    <li id="carousel__slide2"
        tabindex="0"
        class="carousel__slide">
        <div class="flex flex-col h-auto sm:h-96 mt-10 sm:mt-20 object-center bg-slate-500 bg-opacity-30 border-solid">
 <div class="grid gap-4 mt-4 mx-4 sm:mx-8 lg:mx-32">
  <div class="flex flex-col-reverse sm:flex-row justify-center items-center">
    <!-- Image Section -->
    <img class=" h-64 sm:w-64 rounded-lg mt-14 mb-4 sm:mb-0" src="img/kesbangpol resource.png" alt="procedure">

    <!-- Text Content Section -->
    <div class="ml-0 sm:ml-4">
        <h1 class="text-2xl sm:text-3xl lg:text-4xl mt-14 mb-2">Procedure</h1>
        <ul class="list-disc list-inside">
            <li class="mb-1">Penyusunan Dokumen Persiapan: Persiapkan dokumen yang diperlukan untuk pendaftaran.</li>
            <li class="mb-1">Pengumpulan Dokumen Pendukung: Mengupload Dokumen Pada Website</li>
            <li class="mb-1">Pemeriksaan dan Verifikasi: Instansi pemerintah akan melakukan pemeriksaan</li>
            <li class="mb-1">Persetujuan dan Pemberian Status: Jika pendaftaran disetujui, Anda akan menerima pemberitahuan</li>
            <li class="mb-1">Pemberitahuan Publik!: Data Ormas Tersimpan di Website</li>
            <li class="mb-1">Pemenuhan Kewajiban Pasca-Pendaftaran</li>
        </ul>
        <div class="mt-4">
            <a class="bg-blue-500 cursor-pointer hover:bg-blue-900 text-white font-bold py-2 px-3 rounded" href="ormas/ormas">Register Ormas</a>
        </div>
    </div>
</div>
</div>

        </div>
      <div class="carousel__snapper"></div>
      <a href="#carousel__slide1"
         class="carousel__prev">Go to previous slide</a>
      <a href="#carousel__slide3"
         class="carousel__next">Go to next slide</a>
    </li>
    <li id="carousel__slide3"
        tabindex="0"
        class="carousel__slide">
        <div class="flex flex-col h-auto sm:h-96 mt-10 sm:mt-20 object-center bg-slate-500 bg-opacity-30 border-solid">
             <div class=" grid mx-32 mt-24" > 
                <div class="flex ">
                  <img class="  h-64 rounded-full " src="img/Screenshot 2023-06-26 024418.png" alt="procedure">
                  <div class=" ml-20">
                  <h1 class=" text-3xl mb-2">Profil Pimpinan</h1>  
                 <p>“Lewat kegiatan ini, diharapkan para generasi muda dapat mengembangkan diri dan belajar berpikir maju dan terbuka, serta memiliki etos kerja yang baik, disiplin waktu dan menjaga pola hidup teratur. Para generasi muda harus memiliki perencanaan ke depan. Itu merupakan bekal hidup kita. Karena, hal baik yang dapat kita wariskan adalah hikmat kebijaksanaan dalam membangun kemerdekaan berpikir, membentuk karakter dan jati diri,” tukas Lantu.</p>
                          
                  </div>
                  

                </div>
                


             </div>

        </div>
      <div class="carousel__snapper"></div>
      <a href="#carousel__slide2"
         class="carousel__prev">Go to previous slide</a>
      <a href="#carousel__slide4"
         class="carousel__next">Go to next slide</a>
    </li>
    <li id="carousel__slide4"
        tabindex="0"
        class="carousel__slide">
        <div class="flex flex-col h-auto sm:h-96 mt-10 sm:mt-20 object-center bg-slate-500 bg-opacity-30 border-solid"> <div class=" grid mx-32 mt-24" >
        <h1 class=" text-3xl text-center mb-2">About Us</h1>  
        <p class=" text-justify ">Kesatuan Bangsa dan Politik (Kesbangpol) Kota Manado adalah pilar penjaga harmoni dan stabilitas. Kami berkomitmen memelihara keragaman budaya, agama, dan suku dalam satu kesatuan yang kokoh. Melalui program-program edukasi, dialog, dan kolaborasi dengan masyarakat, kami membangun kesadaran akan pentingnya persatuan dalam memajukan daerah. Dengan peran sebagai penghubung antara pemerintah dan masyarakat, Kesbangpol Kota Manado berupaya menciptakan lingkungan yang inklusif dan damai, di mana aspirasi publik didengar dan dihormati. Dalam semangat keadilan dan harmoni, kami bertekad memajukan Kota Manado sebagai contoh kota yang beragam namun selaras.</p>
         
        </div>
      
        </div>
      <div class="carousel__snapper"></div>
      <a href="#carousel__slide3"
         class="carousel__prev">Go to previous slide</a>
      <a href="#carousel__slide1"
         class="carousel__next">Go to first slide</a>
    </li>
  </ol>
  <!-- <aside class="carousel__navigation">
    <ol class="carousel__navigation-list">
      <li class="carousel__navigation-item">
        <a href="#carousel__slide1"
           class="carousel__navigation-button">Go to slide 1</a>
      </li>
      <li class="carousel__navigation-item">
        <a href="#carousel__slide2"
           class="carousel__navigation-button">Go to slide 2</a>
      </li>
      <li class="carousel__navigation-item">
        <a href="#carousel__slide3"
           class="carousel__navigation-button">Go to slide 3</a>
      </li>
      <li class="carousel__navigation-item">
        <a href="#carousel__slide4"
           class="carousel__navigation-button">Go to slide 4</a>
      </li>
    </ol>
  </aside> -->
</section>
    </div>

</div>
        <!-- end content -->
        <!-- start footer -->
        <div class="flex items-center justify-between h-[12vh] bg-neutral-800">
          <!-- Left side with contact information -->
          <div class="flex items-center space-x-4 ml-6 text-white text-xs">
              <div class="flex items-center space-x-1 cursor-pointer">
                  <i class="fab fa-whatsapp"></i>
                  <p>082189003016</p>
              </div>
              <div class="flex items-center space-x-1 cursor-pointer">
                  <i class="fab fa-facebook"></i>
                  <p>@kota_manado</p>
              </div>
              <div class="flex items-center space-x-1 cursor-pointer">
                  <i class="fab fa-instagram"></i>
                  <p>@kota_manado</p>
              </div>
              <div class="flex items-center space-x-1 cursor-pointer">
                  <i class="fas fa-map-marker-alt"></i>
                  <p>Link_Google</p>
              </div>
          </div>
      
          <!-- Right side with copyright information -->
          <div class="flex items-center text-white text-xs mr-5">
              <p>@Ghost_design</p>
          </div>
      </div>
      
        <!-- end footer -->






        <script>
        document.addEventListener("DOMContentLoaded", function() {
            var slides = document.querySelectorAll(".carousel .slide");
            var currentSlide = 0;

            function showSlide(n) {
                slides[currentSlide].classList.remove("active");
                currentSlide = (n + slides.length) % slides.length;
                slides[currentSlide].classList.add("active");
            }

            setInterval(function() {
                showSlide(currentSlide + 1);
            }, 3000);
        });
    </script>
        
    </body>
</html>
