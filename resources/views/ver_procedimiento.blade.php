@extends('layouts.main') 

@section('title', $procedimiento->nombre)

@section('content')


    <div class="hero min-h-screen bg-base-200" >
          <div class="hero-content flex-col lg:flex-row ml-24 mr-24">
            <img class="max-w-sm rounded-lg shadow-2xl procedimiento-img" src="{{asset('storage/images/procedimientos/proced'.$procedimiento->id.'.jpg') }}" alt="Procedimientos">
            
            <div>
                  <br>
                <h1 id="tittle" class="text-xl sm:text-4xl font-bold" align="center">{{ $procedimiento->nombre }}</h1>

                <p id="desc" class="py-6 text-md sm:text-md">{!! nl2br(e($procedimiento->descripcion)) !!}</p>



                <!--<button id="boton" class="btn btn-primary">Solicitar cita</button>-->
                @if (Auth::check() && Auth::user()->rol_id == 3)
                              <div class="text-center">
                                <a href="{{route('citas.buscar')}}" class="btn btn-primary ">Solicitar cita</a>
                              </div>
                                @else
                              <div class="text-center">
                                <a href="{{route('dashboard')}}" class="btn btn-primary ">Solicitar cita</a>
                              </div>
                @endif
                
            </div>

          </div>
      
    </div>

      <!--<div class="w-full  bg-blue-300 rounded-xl">-->
        <div class="collapse bg-gray-300 rounded-xl ml-5 mr-5">
                <input type="checkbox" /> 
                <div class="collapse-title text-xl font-bold flex items-center ">
                  Preguntas frecuentes 
                  <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
                </div>
                <div class="collapse-content "> 
                <p class="py-6 text-sm sm:text-md">{!! nl2br(e($procedimiento->preguntas)) !!}</p>
                </div>
        </div>
      <!--</div>-->
  
  
    <style>
      .procedimiento-img {
  max-width: 450px;
  max-height: 400px;
}
#boton {
  display: block;
  margin: 0 auto; 
  text-align: center;
}

#textopro2{
  font-size:18px;

}

@media screen and (max-width: 768px) {
  .hero-content {
    font-size: 5.5vw;
    margin-left:20px;
    padding-left:10px;

  }
  .procedimiento-img {
    max-width: 14rem;
    margin-left:35px;
}
#desc{
  font-size: 3vw;
  padding-left:20px;

}
#ref3{
  text-align:left;
}
#tittle{
    margin-top:-30px;

  }
}

@media screen and (max-width: 765px) {

  #tittle{
    margin-top:-30px;

  }
#desc{
  font-size: 3vw;
  padding-left:20px;

}

}

@media screen and (max-width: 475px) {
#desc{
  font-size: 4.5vw;
  margin-left:20px;

text-align:center;
}
#tittle{
  margin-top:-20px;
  font-size: 7vw;
  text-align:center;

}
}




    </style>
@endsection
