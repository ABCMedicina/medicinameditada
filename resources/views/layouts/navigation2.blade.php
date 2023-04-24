<nav x-data="{ open: false }"  class="navbar" style="background-color:#091a32; color:white; position:fixed; z-index:999;"><!--<div class="navbar bg-green-100">-->
    <div class="navbar-start hidden md:flex">
        <a href="/" class="navbar-brand">
            <img class=" ml-5 rounded-full" src="{{ asset('storage/images/logo.jpg') }}" alt="Logo" style="height:58px;">
        </a>
    </div>
  
    <div class="navbar-center hidden md:flex">
      <ul class="menu menu-compact menu-horizontal px-1">   
       <li tabindex="0"><a>Revista
            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
        </a>
            <ul class="z-10 " style="background-color: #496063; color: white;">
                <li><a href="{{route('braquioplastia')}}">Braquioplastía</a></li>
                <li><a href="{{route('cancer_mama')}}">Cáncer de mama</a></li>
                <li><a href="{{route('cirugia_plastica')}}">Cirugía Plástica</a></li>
                <li><a href="{{route('cirugia')}}">Cirugía Reconstructiva en México</a></li>
                <li><a href="{{route('ginecomastia')}}">Ginecomastía</a></li>

            </ul>
        </li>  
      
        <li tabindex="0">
          <a>
            Procedimientos
            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
          </a>
          @include ('partials.lista_procedimientos')
          
        </li>
       

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
        
        <li><a href="{{route('horarios')}}">Horarios de atención</a></li>
        <li><a href="{{route('contacto')}}">Contacto</a></li>
      </ul>
    </div>
    <div class="navbar-end hidden md:flex">
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
    
    <div class="flex flex-col md:hidden md:h-28"  >
        <div  class=" md:hidden flex">
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
            <h1>MEDICINA MEDITADA</h1>
            
        </div>
        </div>
      
      <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="flex flex-col items-start mt-3" style="margin-left: -110px; " >
                <div class="dropdown">
                    <label id="labels" tabindex="0" class="btn btn-sm btn-ghost" style="width: 100%;">
                    Revista
                    <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
                    </label>
                    <ul tabindex="0" class="menu menu-compact dropdown-content shadow bg-base-200 rounded-box" style="background-color:#496063; color:white; width: 250px;" >
                        <li><a href="{{route('braquioplastia')}}">Braquioplastía</a></li>
                        <li><a href="{{route('cancer_mama')}}">Cáncer de mama</a></li>
                        <li><a href="{{route('cirugia_plastica')}}">Cirugía Plástica</a></li>
                        <li><a href="{{route('cirugia')}}">Cirugía Reconstructiva en México</a></li>
                        <li><a href="{{route('ginecomastia')}}">Ginecomastía</a></li>
                    </ul>
                </div>
            
                <div class="dropdown">
                    <label id="labels" tabindex="0" class="btn btn-sm btn-ghost w-full ">
                    Procedimientos
                    <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
                    </label>
                    <ul tabindex="0" class="menu menu-compact dropdown-content shadow bg-base-200 rounded-box " style="background-color:#496063; color:white; width: 250px; border-radius:10px;" >
                        @include ('partials.lista_procedimientos')
                    </ul>
                </div>

                @if (Auth::check() && Auth::user()->rol_id == 3)
                    <a id="labels" href="{{route('citas.buscar')}}" class="btn btn-sm btn-ghost">Agendar</a>
                @else
                    <a id="labels" href="{{route('dashboard')}}" class="btn btn-sm btn-ghost">Agendar</a>
                @endif

                <a id="labels" href="{{route('horarios')}}" class="btn btn-sm btn-ghost">Horarios</a>
                <a id="labels" href="{{route('contacto')}}" class="btn btn-sm btn-ghost ">Contacto</a>

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
  display: flex; /* Establece el elemento div como contenedor flexible */
  justify-content: center; /* Centra horizontalmente el contenido */
  align-items: center; /* Centra verticalmente el contenido */
  padding-left: 50%;

}

.img {
    display: none;
  }
#labels:hover {
        background-color: #209ce2;
    }




</style>
    