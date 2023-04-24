<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>    
    <body>
        <header>
        {{-- Menú de navegación --}}
            @include ('layouts.navigation2')
        </header>
       

<section id="carrusel">
<br><br><br>
            <div class="carousel w-full">
              
              <div id="slide1" class="carousel-item relative w-full ">
                <p  id="mi-parrafo" class="absolute top-1/2 left-0 transform -translate-y-1/2 text-white text-center z-5">
                    <br>CIRUGÍA PLÁSTICA MEDITADA<br>
                    Dedicados a resaltar su belleza con el <br>más alto sentido de responsabilidad y ética.
                    </p>

                    <img src="{{ asset('storage/images/carr1.1.jpg') }}"  class="w-full" />
                    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                        <a href="#slide4" class="btn btn-circle">❮</a> 
                        <a href="#slide2" class="btn btn-circle">❯</a>
                    </div>
                </div> 
               
                <div id="slide2" class="carousel-item relative w-full">
          
                    <p  id="mi-parrafo2" class="absolute top-1/2 left-0 transform -translate-y-1/2 text-black text-center z-5">
                        "El objetivo de la cirugía plástica no es cambiar<br> 
                        quién eres, sino realzar tu belleza natural <br>
                        para que puedas brillar con confianza".</p>
                    <img src="{{ asset('storage/images/servicios.jpg') }}"  class="w-full" />
                    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                        <a href="#slide1" class="btn btn-circle">❮</a> 
                        <a href="#slide3" class="btn btn-circle">❯</a>
                    </div>
                </div> 
                <div id="slide3" class="carousel-item relative w-full">
                <p id="mi-parrafo3" class="absolute top-1/2 left-0 transform -translate-y-1/2 text-black text-center z-5">
                    "La cirugía plástica es un arte, pero también es una ciencia.<br> Cada paciente es un lienzo en blanco y es nuestro trabajo<br> crear una obra de arte única y hermosa".</p>
                    <img src="{{ asset('storage/images/carr3.png') }}" class="w-full h-48 object-fit-cover" />
                    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                        <a href="#slide2" class="btn btn-circle">❮</a> 
                        <a href="#slide4" class="btn btn-circle">❯</a>
                    </div>
                </div> 
                <div id="slide4" class="carousel-item relative w-full">
                <p  id="mi-parrafo" class="absolute top-1/2 left-0 transform -translate-y-1/2 text-black text-center z-5" style="color:black;">
                    "Uniendo la ciencia y el arte de la cirugía<br> plástica para brindar soluciones médicas<br> personalizadas y estéticamente armoniosas".</p>
                    <img src="{{ asset('storage/images/carr4.jpg') }}" class="w-full" />
                    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                        <a href="#slide3" class="btn btn-circle">❮</a> 
                        <a href="#slide1" class="btn btn-circle">❯</a>
                    </div>
                </div>
              </div>
            </div>
</section>



        <main>
            @yield('content')
        </main>
        
        <footer class="footer footer-center p-10 bg-base-200 text-base-content rounded" style=" justify-content: center;">
            <div class="grid grid-flow-col gap-4" style="display: flex; justify-content: center; ">
              <a href="{{route('acercade')}}" class="link link-hover">Acerca de nosotros</a> 
              <a href="{{route('servicios')}}" class="link link-hover">Nuestros servicios</a> 
              <a href="{{route('contacto')}}" class="link link-hover">Contacto</a> 
            </div>

            <div>
              <div class="grid grid-flow-col gap-4" style="display: flex; justify-content: center;" >
              <a href="https://instagram.com/hesiquio.c106?igshid=YmMyMTA2M2Y="><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16"> <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/> </svg>
              </a>

                <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path></svg></a> 
                <a href="https://www.facebook.com/profile.php?id=100083077120018"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path></svg></a>
              </div>
            </div> 
            <div>
           
              <p> ©2023 Cirugía Plástica Meditada, Medicina Meditada ABC. Todos los derechos reservados</p>
            </div>
        </footer>
   </body>
  <style>
  
.carousel-item img {
  width: 100%;
  height: auto;
}


#mi-parrafo {
  font-size: 2.3vw;
  color:white; margin-left:80px;

}
#mi-parrafo2 {
  font-size: 2.3vw;
  color:black; margin-left:90px;

}
#mi-parrafo3 {
  font-size: 2.3vw;
  color:black; margin-left:80px;

}

/*#parrafocarrusel{
  color:black; margin-left:80px;
}*/

@media screen and (max-width: 768px) {
  #mi-parrafo {
    font-size: 2.8vw;
    margin-left:60px;
    margin-right:60px;
  }
  .carousel-item img {
  width: 100%;
  height: 150px;

}
#mi-parrafo2{
  margin-left:70px;
margin-right:80px;
font-size:2.8vw;
}

#mi-parrafo3{
  margin-left:80px;
margin-right:80px;
font-size:2.8vw;

}

.btn-circle{
  height: 0.5rem/* 48px */;
    width: 1rem/* 48px */;
    border-radius: 9999px;
    padding: 0px;
}

}

@media screen and (max-width: 480px) {
  #mi-parrafo {
    font-size: 3.8vw;
    margin-left:60px;
    margin-right:60px;
  }
  #mi-parrafo2{
  margin-left:70px;
margin-right:80px;
font-size:3.7vw;
}

#mi-parrafo3{
  margin-left:40px;
margin-right:40px;
font-size:3.5vw;

}
}


@media (max-width: 768px) {
  .btn-info.mr-5 {
    margin-right: 15px;
    margin-top:2px;
  }
}
 .btn-azul{
  background-color:#5596aa;
 }
 .btn-azul:hover{
  background-color:#5596aa;

 }


/*p {
  font-size: 30px;
}

@media only screen and (max-width: 768px) {
  p {
    font-size: 20px;
  }
}*/


  </style>

</html>