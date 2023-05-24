@extends('layouts.main')

@section('title', 'Aviso de privacidad')

@section('content')

<div class="hero min-h-screen bg-base-200">
  <div class="hero-content flex-col lg:flex-row-reverse">
    <img id="aviso" src="{{ asset('storage/images/aviso.privacidad.jpg') }} " class="max-w-sm rounded-lg shadow-2xl" />
    <div>
      <h1 id="titulo" class="text-5xl font-bold">Aviso de privacidad</h1>
      <p id="parrafo" style="text-align:justify;" class="py-6">En Cirugía Plástica Meditada, nos comprometemos a proteger y resguardar la privacidad de nuestros usuarios. A través de este aviso, deseamos informarle cómo se recopilan, utilizan y protegen los datos personales que usted proporciona al utilizar nuestro sitio web.

<br><br>Recopilación de Datos Personales<br>

Al visitar nuestro sitio web, es posible que se le solicite proporcionar cierta información personal, como su nombre, dirección de correo electrónico y número de teléfono. Estos datos se recopilan de forma voluntaria mediante formularios de contacto o registro para brindarle un mejor servicio y una experiencia personalizada.

<br><br>Uso de los Datos Personales<br>

Los datos personales recopilados se utilizan únicamente con el fin de brindarle información relevante sobre nuestros servicios de cirugía plástica meditada, responder a sus consultas y solicitudes, y mantener una comunicación efectiva con usted. Además, podemos utilizar sus datos de forma anónima y agregada con fines estadísticos y de mejora de nuestro sitio web.

<br><br>Protección de los Datos Personales<br>

En Cirugía Plástica Meditada, hemos implementado medidas de seguridad adecuadas para proteger sus datos personales contra accesos no autorizados, divulgación o alteración. Utilizamos protocolos de seguridad y cifrado para garantizar la confidencialidad y seguridad de la información que usted nos proporciona.

</p>
    </div>
  </div>
</div>

<div class="hero min-h-screen bg-base-200">
  <div class="hero-content flex-col lg:flex-row">
    <img id="aviso" src="{{ asset('storage/images/aviso.privacidad2.jpg') }} " class="max-w-sm rounded-lg shadow-2xl" />
    <div>
      <p style="text-align:justify;" class="py-6">

Divulgación de los Datos Personales<br>
 
No compartiremos, venderemos ni alquilaremos sus datos personales a terceros sin su consentimiento expreso, a menos que estemos legalmente obligados a hacerlo. Sin embargo, es posible que revelemos su información personal a nuestros proveedores de servicios de confianza que nos ayudan en el funcionamiento de nuestro sitio web y en la prestación de nuestros servicios. Estos proveedores están obligados a mantener la confidencialidad de sus datos y solo pueden utilizarlos de acuerdo con nuestras instrucciones.
<br><br>Derechos del Usuario<br>

Usted tiene derecho a acceder, rectificar, limitar o eliminar los datos personales que nos ha proporcionado. Si desea ejercer cualquiera de estos derechos, o tiene alguna pregunta o inquietud relacionada con la privacidad de sus datos, le recomendamos ponerse en contacto con nosotros a través de los medios de contacto proporcionados en nuestro sitio web.

<br><br>Cambios en el Aviso de privacidad<br>

Nos reservamos el derecho de actualizar y modificar este aviso de privacidad en cualquier momento. Cualquier cambio se publicará en nuestro sitio web, por lo que le recomendamos revisar periódicamente esta página para estar al tanto de las actualizaciones.

Al utilizar nuestro sitio web, usted acepta los términos y condiciones establecidos en este aviso de privacidad.


<br><br><br>Atentamente,<br>

<br>Medicina Meditada<br>
Cirugía Plástica Meditada

</p>


    </div>
  </div>
</div>
<style>
@media screen and (max-width: 767px) {
    #titulo {
    font-size: 5vw;
    text-align:center;
  }
  #reconstructiva {
    font-size: 4vw;
  }
}

@media screen and (max-width: 553px) {
  #titulo {
    font-size: 5vw;
    text-align:center;

  }
  #parrafo {
margin-right:10px;  }

#aviso{
    width:200px;
}
}

@media screen and (max-width: 416px) {
    #aviso{
    width:200px;
}
  #parrafo {
margin-right:5px;  }
}



</style>
@endsection