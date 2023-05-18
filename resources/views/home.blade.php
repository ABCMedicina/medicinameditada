@extends('layouts.main')

@section('title', 'Inicio')

@section('content')

    <div id="text-inicio" class="hero min-h-screen" style="background-image: url({{ asset('storage/images/body2.jpg') }}); ">
        <div class="hero-overlay bg-opacity-50"></div>
        <div class="hero-content text-left text-neutral-content">
            <div class="max-w-md">
            <p id="texto2"  style="color:white;"  class="mb-5 text-5xl font-bold">Cirugía Plástica Meditada</p><br>
           
            <p id="texto" class="mb-5" style="color:white;" align="left"> El ser humano es consciente del tiempo y su mortalidad; el deseo de detener el tiempo y seguir conservando su belleza ha llevado a los seres humanos a lo largo del tiempo, a la búsqueda de opciones para conservar un mejor aspecto en el aquí y el ahora.</p>
            <p id="texto" class="mb-5 " style=" color:white;" align="left"> La mayoría de los procedimientos de Cirugía Plástica Meditada son cirugías electivas (programadas), que nos dan la responsabilidad de prepararnos y tomar la mejor decisión apoyada en un proceso organizado interno, "meditado".</p>
            <p id="texto" class="mb-5" style="color:white;" align="left"> Nuestro equipo le proporcionará la información que le apoyará en este importante camino, donde el cuerpo es solo una parte que, junto con la mente y el alma, crea la alquimia perfecta que integra el todo.</p>
            <p id="texto" class="mb-5" style=" color:white;" align="left"> Nuestro mayor compromiso es su salud, entendida como “La comunión del cuerpo, la mente y el alma”, porque de la comprensión de esta unión, viene el secreto de la eternidad.</p>
            <br><p id="texto" class="mb-5" style=" color:white;" align="center"><strong> “No intentes jamás curar el cuerpo, sin antes haber curado el alma” Hipócrates [400 a.C.]</strong></p>
            </div>
        
        </div>
    </div>
    
    <div id="text-medio" >
    <div class="hero min-h-screen" >
            <div  class="hero-content flex-col lg:flex-row-reverse" >
             <img id="imagenmedio" src="{{ asset('storage/images/ejem2.jpg') }}" class="max-w-sm rounded-lg shadow-2xl" style="width:300px;" />
                <div  style="padding-right:50px;">
                    <div style="box-shadow: -5px 0px 5px -5px black, 0px 5px 5px -5px black; padding-left:10px;">
                                <h1 id="cardtittle1" style="font-size: 22px; color:white;" align="center">Nuevos procedimientos de cirugía plástica</h1><br>
                               
                                <p id="texto3" style="color:white;" align="left">La cirugía plástica es una rama de la medicina que ha evolucionado mucho en los últimos años. Cada vez son más los pacientes que buscan soluciones estéticas para mejorar su aspecto físico y sentirse más seguros de sí mismos.</p>
                                <p id="texto3" align="left" style="color:white;"><br>En este sentido, los nuevos procedimientos de cirugía plástica ofrecen opciones más personalizadas y adaptadas a las necesidades de cada paciente. Entre los procedimientos más innovadores se encuentran:</p><br>
                                <ul style="color:white;">
                                    <li id="texto3"><strong>- Lipoescultura de alta definición:</strong> una técnica de liposucción que permite esculpir el cuerpo de forma más precisa y definida, logrando una apariencia atlética y tonificada.</li>
                                    <li id="texto3"><strong>- Procedimientos sin cirugía:</strong> la medicina estética ha avanzado tanto que ahora existen numerosos tratamientos no invasivos que ofrecen resultados similares a los procedimientos quirúrgicos, pero sin necesidad de pasar por el quirófano.</li>
                                    <li id="texto3"><strong>- Rinoplastia ultrasónica:</strong> una técnica de rinoplastia que utiliza un dispositivo ultrasónico para remodelar la nariz de forma más precisa y delicada.</li>
                                </ul>
                                <br><p id="texto3" style="color:white;">Si estás interesado en algún procedimiento de cirugía plástica, es importante que acudas a un profesional cualificado y experimentado en el campo. Además, es fundamental que tengas expectativas realistas y te informes bien sobre los posibles riesgos y complicaciones que pueden surgir durante y después de la cirugía.</p>
                                <br> 
                                
                    </div>
                    
                </div>
            </div>
    </div>
    </div>
    
    <div id="text-final" class="card card-side bg-base-100 shadow-xl m-20">
        <figure><img id="imagenfinal" src="{{ asset('storage/images/box3.1.jpg') }}"alt="Médicos" style="width:700px; height:355px;"/></figure>
        <div class="card-body">
        <h2 class="card-title" style="font-size:25px;">Contamos con los mejores especialistas</h2>
        <br><br>
        <p id="texto3" >Nuestra clínica cuenta con las mejores medidas sanitarias para garantizar la seguridad y salud de nuestros pacientes. Nos aseguramos de cumplir con todos los protocolos establecidos para evitar la propagación de enfermedades y contamos con un equipo de profesionales altamente capacitados en el manejo de situaciones sanitarias complejas.
        <br><br>Sabemos que nuestros clientes confían en nosotros para brindarles la mejor atención y asesoramiento, y es por eso que nos esforzamos constantemente por mantener a nuestro equipo actualizado en las últimas tendencias y avances tecnológicos en su campo. Puede estar seguro de que al trabajar con nosotros, estará en manos de los mejores especialistas de la industria.
        </p>
        <div class="card-actions justify-end">
            <br>
        </div>
        </div>
    </div>
<style>
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
}
#texto2{
  font-size:45px;
}
#texto3{
  font-size:16px;
}

#text-inicio
{
  padding-left:100px; padding-right:100px;
}

#text-medio{
padding-left:90px; padding-right:100px; background-color:#142E33;"
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

#texto2{
        font-size:6vw;
}
#texto3{
        font-size:4vw;
  text-align:center;
  margin-left:10px;

}

#cardtittle1{
  text-align:center;
}


}
    </style>
@endsection
