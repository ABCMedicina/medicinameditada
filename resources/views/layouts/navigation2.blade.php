<nav x-data="{ open: false }"  class="navbar" style="background-color:#091a32; color:white; position:fixed; z-index:999;"><!--<div class="navbar bg-green-100">-->
    <div class="navbar-start hidden lg:flex">
        <a href="/" class="navbar-brand">
            <img class=" ml-5 rounded-full" src="{{ asset('storage/images/logo.jpg') }}" alt="Logo" style="height:58px;">
        </a>
    </div>
  
    <div class="navbar-center hidden lg:flex">
      <ul class="menu menu-compact menu-horizontal px-1">   

      <li><a href="{{route('acercade')}}">Quiénes somos</a></li>


        <li tabindex="0">
          <a>
            Procedimientos
            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
          </a>
          
          @include ('partials.lista_procedimientos')
          
        </li>
       
        
        <li tabindex="0">
          <a href="{{route('videos')}}">
            Videos      
          </a>
        </li>

        <li tabindex="0"><a>Blog
            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
        </a>
            <ul class="z-10 " style="background-color: #496063; color: white; ">
            <li><a href="{{route('cancer_mama')}}">Cáncer de mama</a></li>
            <li><a href="{{route('cirugia_plastica')}}">Cirugía Plástica</a></li>
            <li><a href="{{route('cirugia')}}">Cirugía Reconstructiva en México</a></li>
            <li><a href="{{route('braquioplastia')}}">Estética de brazos</a></li>
            <li><a href="{{route('ginecomastia')}}">Torso masculino</a></li>
            </ul>
        </li>  

        <li><a href="{{route('horarios')}}">Horarios de atención</a></li>

        <li tabindex="0"><a>Agendar
                            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
                        </a>
                        <ul class="bg-base-100 z-10" style="background-color: #496063; color: white;">
                            <!--<li><a href="{{route('dashboard')}}">Agendar nueva cita</a></li> -->
                            @if (Auth::check() && Auth::user()->rol_id == 3)
                          <li><a href="{{route('citas.buscar')}}">Agendar nueva cita</a></li>
                            @else
                          <li><a href="{{route('dashboard')}}">Agendar nueva cita</a></li>
                          @endif                       
                        </ul>
        </li>
        
        <li><a href="{{route('contacto')}}" style="margin-right:10px;">Contacto</a></li>

    </div>
    
    <div class="navbar-end hidden lg:flex">
        @if (Route::has('login'))
            <div>
                @auth
                     <a href="{{ url('/dashboard') }}" class="btn btn-sm btn-success normal-case">Mi espacio</a>
                                @else
                                <a href="{{ route('login') }}" class="btn btn-xs mr-5 btn-azul normal-case">Iniciar sesión</a>
    
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-xs btn-azul normal-case">Registrarse</a>
                                @endif
                @endauth
            </div>
        @endif
    </div>
    

    <!-- Hamburger--> 
    
    <div class="flex flex-col lg:hidden lg:h-28"  >
        <div  class="lg:hidden flex">
        <a href="/" class="navbar-brand">

            <img class=" mx-2 rounded-full" src="{{ asset('storage/images/logo.jpg') }}" alt="Logo" style="height: 58px;">
        </a>
            <button @click="open = ! open"  >
                <svg class="h-6 w-6 " stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }"  class="inline-flex "  stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div class="flex items-center ml-5">
            <h1 style="font-size:15px;">CIRUGÍA PLÁSTICA MEDITADA</h1>
            
        </div>
        </div>
      
      <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="flex flex-col items-start mt-3" style="margin-left: -110px; " >
                
                <a id="labels" href="{{route('acercade')}}" class="btn btn-sm btn-ghost mb-2">
                     Quiénes somos
                </a>


                <div class="dropdown">
                    <label id="labels" tabindex="0" class="btn btn-sm btn-ghost w-full mb-2 ">
                    Procedimientos
                    <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
                    </label>
                    <ul tabindex="0" class="menu menu-compact dropdown-content shadow bg-base-200 rounded-box " style="background-color:#496063; color:white; width: 250px; border-radius:10px;" >
                        @include ('partials.lista_procedimientos')
                    </ul>
                </div>


                <a id="labels" href="{{route('videos')}}" class="btn btn-sm btn-ghost mb-2">
                Videos
                </a>


                <div class="dropdown">
                    <label id="labels" tabindex="0" class="btn btn-sm btn-ghost mb-2" style="width: 100%;">
                    Blog
                    <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
                    </label>
                    <ul tabindex="0" class="menu menu-compact dropdown-content shadow bg-base-200 rounded-box " style="background-color: #496063; color: white; width: 250px; margin-bottom:8px;">
                    <li><a class="py-4" href="{{route('cancer_mama')}}">Cáncer de mama</a></li>
                        <li><a class="py-4" href="{{route('cirugia_plastica')}}">Cirugía Plástica</a></li>
                        <li><a class="py-4" href="{{route('cirugia')}}">Cirugía Reconstructiva en México</a></li>
                        <li><a class="py-4" href="{{route('braquioplastia')}}">Estética de brazos</a></li>
                        <li><a class="py-4" href="{{route('ginecomastia')}}">Torso masculino</a></li>
                    </ul>
                </div>
            
                <a id="labels" href="{{route('horarios')}}" class="btn btn-sm btn-ghost mb-2">Horarios de atención</a>

                @if (Auth::check() && Auth::user()->rol_id == 3)
                    <a id="labels" href="{{route('citas.buscar')}}" class="btn btn-sm btn-ghost mb-2">Agendar</a>
                @else
                    <a id="labels" href="{{route('dashboard')}}" class="btn btn-sm btn-ghost mb-2">Agendar</a>
                @endif

                <a id="labels" href="{{route('contacto')}}" class="btn btn-sm btn-ghost mb-2 ">Contacto</a>

                @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-sm btn-success ml-3 mt-1">Mi espacio</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-success btn-sm mr-5 normal-case mb-2 ml-3 mt-3">Iniciar sesión</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-success btn-sm normal-case ml-3">Registrarse</a>
                        @endif
                @endauth
            </div>
      
    </div>
    </div>
   
</nav>


<style>
  
  #h1 {
  display: flex; 
  justify-content: center; 
  align-items: center; 
  padding-left: 50%;

}

   .parent {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 10px;
    }

    .parent li {
        list-style: none;
    }


    .img {
        display: none;
    }

    #labels:hover {
            background-color: #209ce2;
    }

    @media screen and (max-width: 453px) {
        .parent {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 10px;
    }

    .parent li {
        list-style: none;
    }

}



</style>
    