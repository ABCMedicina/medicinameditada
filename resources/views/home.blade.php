@extends('layouts.main')

@section('title', 'Inicio')

@section('content')

    <div id="text-inicio" class="hero min-h-screen" style="background-image: url({{ asset('storage/images/log.jpg') }}) ; ">
        <div class="hero-overlay bg-opacity-50"></div>
        <div class="hero-content text-left text-neutral-content">
            <div class="max-w-md">
              <p id="texto2"  style="color:white;"  class="mb-5 text-5xl font-bold">La alquimia de la belleza</p><br>
            
              <p id="texto" class="mb-5" style="color:white;" > El ser humano es consciente del tiempo y su mortalidad; el deseo de detener el tiempo y seguir conservando su belleza ha llevado a los seres humanos a lo largo del tiempo, a la búsqueda de opciones para conservar un mejor aspecto en el aquí y el ahora.</p>
              <p id="texto" class="mb-5 " style=" color:white;" > La mayoría de los procedimientos de Cirugía Plástica Meditada son cirugías electivas (programadas), que nos dan la responsabilidad de prepararnos y tomar la mejor decisión apoyada en un proceso organizado interno, "meditado".</p>
              <p id="texto" class="mb-5" style="color:white;" > Nuestro equipo le proporcionará la información que le apoyará en este importante camino, donde el cuerpo es solo una parte que, junto con la mente y el alma, crean la alquimia perfecta que integran el todo de su cuerpo.</p>
              <p id="texto" class="mb-5" style=" color:white;" > Nuestro mayor compromiso es su salud, entendida como la comunión del cuerpo, la mente y el alma, <br>" Porque en el entendimiento de esta unidad, está la clave de la eternidad ".</p>
              <br><p  class="mb-5" style=" color:white; font-size:19px; " align="center"><strong> “No intentes curar el cuerpo, sin antes curar el alma”. <br><p style=" font-size:16px; color:white;">Hipócrates [400 a.C.]</p></strong></p>
              </div>
             
        </div>
        <div id="mantenerse">
  </div>
    </div>
  
    <br>
   
  
<!-- The button to open modal 
<a href="#my-modal-2" class="btn w-full">CIRUGÍA PLÁSTICA MEDITADA</a>
<div class="modal" id="my-modal-2">
  <div class="modal-box">
    <img id="imagenmedio" src="{{ asset('storage/images/log.jpg') }}" class="max-w-sm rounded-lg shadow-2xl" style="width:250px;" />


    <div class="modal-action">
     <a href="#mantenerse" class="btn btn-sm">Cerrar</a>
    </div>
  </div>
</div>-->

   <br><br>
   <div id="text-medio" >
    <div class="hero min-h-screen">
            <div  class="hero-content flex-col lg:flex-row-reverse" >
             <img id="imagenmedio" src="{{ asset('storage/images/ejem2.jpg') }}" class="max-w-sm rounded-lg shadow-2xl" style="width:300px;" />
                <div  style="padding-right:50px;">
                    <div id="just" style="box-shadow: -5px 0px 5px -5px black, 0px 5px 5px -5px black; padding-left:10px; margin-right:-32px;">
                                <h1 style="font-size: 22px; color:#091a32;" align="center">Equilibrio Bio-psico-social</h1><br>
                                
                               
                                <p id="just" style="color:#091a32;"><strong>La cirugía plástica es una rama de la medicina que ha evolucionado mucho en los últimos años. Cada vez son más los pacientes que buscan soluciones estéticas para mejorar su aspecto físico y sentirse más seguros de sí mismos.</strong></p>
                                <p id="just" style="color:#091a32;"><br><strong>En este sentido, en Cirugía Plástica Meditada ofrecemos opciones más personalizadas y adaptadas a las necesidades de cada paciente; ponderando siempre la triada "mente - cuerpo - alma".</strong></p><br>
                                <ul style="color:#091a32;">
                                    <li ><strong>Un proceso quirúrgico conlleva un estado de meditación durante la recuperación, por lo que estar en paz, es un factor primordial para la recuperación de nuestro equilibrio bio-psico-social.</strong></li>
                                    <li ><strong><br>"Paciente" es la persona que se tiene paciencia, y esa es una ciencia... la ciencia de la paz.</strong></li>
                                    <li ><strong><br>Paz, que surge al tomar una decisión informada y meditada, permitiendo transitar por un proceso en equilibrio y armonía, con el objetivo constante de evolucionar y alcanzar la mejoría postoperatoria.</strong></li>

                                    <li ><strong><br>CON EL TIEMPO EL CUERPO SE DEFORMA, CON EL TIEMPO LA MENTE SE TRANSFORMA Y... CON EL TIEMPO EL ALMA SE CONFORMA.</strong></li>
                                </ul>
                                <br> 
                                
                    </div>
                    
                </div>
            </div>
    </div>
    </div>
    
    <div id="text-final" class="card card-side bg-base-100 shadow-xl m-20">
        <figure><img id="imagenfinal" src="{{ asset('storage/images/box3.1.jpg') }}"alt="Médicos"/></figure>
        <div class="card-body">
        <h2 id="tit" class="card-title" style="font-size:25px;">Nuestro equipo</h2>
        <br>
        <p id="texto3" >Nuestro equipo cuenta con las mejores medidas sanitarias para garantizar la seguridad, la privacidad y la salud de nuestros pacientes. Nos aseguramos de cumplir con todos los protocolos establecidos para evitar la propagación de enfermedades y se cuenta con un equipo de profesionales altamente capacitados en el manejo de situaciones sanitarias complejas.
       <br><br>Los procedimientos quirúrgicos se llevan a cabo en el Centro Médico ABC, centro de excelencia en Medicina.
        <br><br>Sabemos que nuestros clientes confían en nosotros para brindarles la mejor atención, seguridad y calidez durante este proceso, para que juntos en el binomio Médico-Paciente, salgamos adelante en esta transformación bio-psico-social. 
        </p>
        <div class="card-actions justify-end">
            <br>
        </div>
        </div>
    </div>
<style>
   
   .modal.full-width {
  width: 100%;
  left: 0;
  right: 0;
}

    p{
        color:black;
    }

     .hero-content {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
  max-width: none; 
}

.justificar{
  text-align:justify;
}

.hero-content > div {
  width: 100%; 
  max-width: none; 
}

.hero-content h1,
.hero-content p {
  width: 100%;
  text-align: center;
}

#texto {
  font-size: 19px;
  text-align:justify;

}
#texto2{
  font-size:45px;
}
#texto3{
  font-size:16px;
  text-align:justify;

}

#text-inicio
{
  padding-left:100px; padding-right:100px;
  text-align:justify;
}

#text-medio{
padding-left:90px; padding-right:100px; background-color:#ebf0ea;

}
#imagenfinal{
  width:700px; height:355px;
}
#just{
  text-align:justify;
}


@media screen and (max-width: 768px) {
  #texto,#texto3 {
    font-size: 3vw;
  }
  
  #texto{
    font-size:2.5vw;
  }

  #texto2{
        font-size:4vw;

  }
  .card {
    display: flex;
    flex-direction: column;
    margin-left:10px;
    padding-left:20px;
    margin-right:25px;
  }
  #text-inicio{
    padding-left:20px;
    padding-right:20px;

  }
  #text-medio{
    padding-left:10px;
    padding-right:10px;
  }
  #text-final{
    padding-left:20px;
    padding-right:5px;
  }
  #imagenfinal{
    border-radius:10px;
    height: 300px;
    width:200px;
  }


}

@media screen and (max-width: 578px) {

#texto{
      font-size:3.2vw;

}
#texto2{
      font-size:5.5vw;

}
}

@media screen and (max-width: 456px) {

#texto{
      font-size:4vw;

}

#imagenfinal{
  border-radius:10px;
    width:100%;
    height: 300px;

}
#texto2{
        font-size:6vw;
}
#texto3{
        font-size:4vw;
  text-align:justify;

}

#cardtittle1{
  text-align:center;
}
#tit{
 margin-left:25px;
}

}
    </style>
    <script>
      $(document).ready(function() {
  $('.curtain-container').mousemove(function(event) {
    var mouseX = event.pageX - $(this).offset().left;
    var curtainWidth = mouseX + 'px';
    $('.curtain-mask').css('width', curtainWidth);
  });
});

    </script>
@endsection
