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
        <div class=" flex flex-row w-full  h-28 bg-red-500" >
            <div class=" container  w-24 h-16 ml-10  mt-3 " > <img  src="img/logo1.png" alt="logo"> </div>
            <div  class=" block ml-10 my-auto font-sans font-bold text-3xl text-white"><h1>KESBANGPOL</h1><h2 class=" text-lg">KOTA MANADO</h2></div>
            <!-- start end navbar -->
            <div class="flex flex-row-reverse w-full h-full">
                <div class="  flex h-full  mr-10  my-auto ">
                <span class="fa-sharp fa-solid fa-right-to-bracket my-auto text-2xl mr-3 text-white cursor-pointer "></span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        @method('POST')
                    <button class="text-xl text-white h-full font-sans" type="submit">Log Out</button>
                    </form>
                </div>
                <div class="  flex justify-end h-full  mr-6  w-64 my-auto ">
                  <span  class=" my-auto fa-sharp fa-solid fa-user mr-3 text-2xl text-white cursor-pointer  "></span>
                    <a class="text-xl text-white   my-auto font-sans " href="/ormas">Status Pendaftaran</a>
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
        <div class=" flex h-96  mt-20 object-center bg-slate-500 bg-opacity-30 border-solid"> <div class=" grid mx-32 mt-24" >
        <h1 class=" text-3xl text-center   mb-2">BADAN KESATUAN BANGSA DAN POLITIK KOTA MANADO</h1>  
        <h2 class=" text-center "> MOTTO PELAYANAN:</h2>
        <p class=" text-center "> “MELAYANI MASYARAKAT TUJUAN KAMI,
          KEPUASAN MASYARAKAT TEKAT KAMI”
          </p>
          <h2 class=" text-center  "> SLOGAN PELAYANAN:</h2>
          <p class=" text-center  "> “MEMBERIKAN INFORMASI YANG AKURAT, CEPAT DALAM PELAYANAN, TEPAT SASARAN, TAAT HUKUM, BERTANGGUNG JAWAB, TRANSPARAN DAN RAMAH KEPADA MASYARAKAT”
            </p>
            <div class="flex justify-center items-center h-full">
              <a class="bg-blue-500 cursor-pointer hover:bg-blue-900 text-white font-bold py-2 px-4 rounded">
                Click me
              </a>
            </div>
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
        <div class=" grid h-96  mt-20 object-center bg-slate-500 bg-opacity-30 border-solid">
             <div class=" grid mx-32 mt-24" > 
                <div class="flex ">
                  <img class="  h-64 rounded-lg " src="img/kesbangpol resource.png" alt="procedure">
                  <div class=" ml-20">
                  <h1 class=" text-3xl mb-2">Prosedur</h1>  
                  <ul >
                     <li class=" mb-1 list-disc">Penyusunan Dokumen Persiapan :  Persiapkan dokumen yang diperlukan untuk pendaftaran.</li>
                     <li class="mb-1 list-disc">Pengumpulan Dokumen Pendukung : Mengupload Dokumen Pada Website</li>
                      <li class="mb-1 list-disc">Pemeriksaan dan Verifikasi : Instansi pemerintah akan melakukan pemeriksaan</li>
                      <li class="mb-1 list-disc">Persetujuan dan Pemberian Status : Jika pendaftaran disetujui, Anda akan menerima pemberitahuan</li>
                      <li class="mb-1 list-disc">Pemberitahuan Publik! : Data Ormas Tersimpan di Website</li>
                      <li class="mb-1 list-disc">Pemenuhan Kewajiban Pasca-Pendaftaran</li>
                   </ul>
                      <div class="  grid mt-6 ">
                        <div class=" w-full object-center">
                        <a class="  bg-blue-500 cursor-pointer hover:bg-blue-900 text-white font-bold py-2 px-3 rounded" href="/ormas/ormas">
                    Register Ormas
                  </a>
                  </div>
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
        <div class=" grid h-96  mt-20 object-center bg-slate-500 bg-opacity-30 border-solid">
             <div class=" grid mx-32 mt-24" > 
                <div class="flex ">
                  <img class="  h-64 rounded-full " src="img/Screenshot 2023-06-26 024418.png" alt="procedure">
                  <div class=" ml-20">
                  <h1 class=" text-3xl mb-2">Profil Pimpinan</h1>  
                 <p>“Lewat kegiatan ini, diharapkan para generasi muda dapat mengembangkan diri dan belajar berpikir maju dan terbuka, serta memiliki etos kerja yang baik, disiplin waktu dan menjaga pola hidup teratur. Para generasi muda harus memiliki perencanaan ke depan. Itu merupakan bekal hidup kita. Karena, hal baik yang dapat kita wariskan adalah hikmat kebijaksanaan dalam membangun kemerdekaan berpikir, membentuk karakter dan jati diri,” tukas Lantu.</p>
                      <div class="  grid mt-6 ">
                        <div class=" w-full object-center">
                        <a class="  bg-blue-500 cursor-pointer hover:bg-blue-900 text-white font-bold py-2 px-3 rounded">
                    Find More
                  </a>
                  </div>
                      </div>    
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
        <div class=" flex h-96  mt-20 object-center bg-slate-500 bg-opacity-30 border-solid"> <div class=" grid mx-32 mt-24" >
        <h1 class=" text-3xl text-center mb-2">About Us</h1>  
        <p class=" text-justify ">Kesatuan Bangsa dan Politik (Kesbangpol) Kota Manado adalah pilar penjaga harmoni dan stabilitas. Kami berkomitmen memelihara keragaman budaya, agama, dan suku dalam satu kesatuan yang kokoh. Melalui program-program edukasi, dialog, dan kolaborasi dengan masyarakat, kami membangun kesadaran akan pentingnya persatuan dalam memajukan daerah. Dengan peran sebagai penghubung antara pemerintah dan masyarakat, Kesbangpol Kota Manado berupaya menciptakan lingkungan yang inklusif dan damai, di mana aspirasi publik didengar dan dihormati. Dalam semangat keadilan dan harmoni, kami bertekad memajukan Kota Manado sebagai contoh kota yang beragam namun selaras.</p>
          <div class=" object-center mx-auto my-auto "><a class="   bg-blue-500 cursor-pointer hover:bg-blue-900 text-white font-bold py-2 px-4 rounded">
  Find More
</a>
          </div>
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
<div class=" flex h-[12vh] w-full  bg-neutral-800">
    <div class=" flex h-[12vh] w-[8vh] my-auto text-white text-center  text-1xl ml-6">
   <div class=" flex ml-0.5 mr-2 my-auto  fa-brands fa-whatsapp cursor-pointer"> <p class=" cursor-pointer font-mono text-xs my-auto ml-1">082189003016</p> </div>
   <div class="  cursor-pointer  flex fa-brands mr-2  fa-facebook my-auto  "> <p class="  cursor-pointer font-serif text-xs my-auto ml-1">@kota_manado</p> </div>
   <div class=" flex ml-2 fa-brands mr-2 fa-instagram my-auto cursor-pointer"> <p class=" font-serif text-xs my-auto ml-1">@kota_manado</p></div> 
   <div class=" flex ml-2 fa-solid   fa-location-dot mr-2 w-32   my-auto cursor-pointer"> <p class=" font-serif text-xs my-auto ml-1">Link_Google</p></div>
    </div>
    <div class="flex flex-row-reverse w-full h-[11vh]">
    <div class="   flex fa-regular fa-copyright mr-5 my-auto text-white "> <p class=" font-serif text-xs my-auto ml-1">@Ghost_design</p> </div>
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
