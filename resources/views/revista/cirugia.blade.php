@extends('layouts.main')

@section('title', 'Cirugía Reconstructiva en México')

@section('content')


<br>
<div class="hero min-h-screen bg-base-200" id="hero">
  <div class="hero-content flex-col lg:flex-row-reverse">

  <div class="flex-col">
                <img id="image3" src="{{ asset('storage/images/recons.jpg') }}"  />
                <br>
                <img id="image3" src="{{ asset('storage/images/reconstructiva2.jpg') }}"  />
  </div>


  <div>
      <p id="reconstructiva" class="text-5xl font-bold">La cirugía reconstructiva en México: avances científicos y procedimientos comunes

      </p>
      <p id="descr"  class="py-6">
      La cirugía reconstructiva es una especialidad médica que tiene como objetivo restaurar la función y la apariencia de una parte del cuerpo que ha sido afectada por una enfermedad, lesión o malformación congénita. En México, la cirugía reconstructiva es una disciplina médica bien establecida y cuenta con un amplio espectro de procedimientos y técnicas para tratar diversas afecciones.

      <br><br>Uno de los procedimientos más comunes de cirugía reconstructiva en México es la cirugía reconstructiva mamaria, que se utiliza para reconstruir la mama después de una mastectomía debido al cáncer de mama. Esta cirugía se realiza con diversas técnicas, como la colocación de implantes mamarios o la reconstrucción de la mama con tejido propio del cuerpo.
      <br><br>Otra área importante de la cirugía reconstructiva en México es la reconstrucción facial, que se utiliza para corregir deformidades faciales congénitas o adquiridas, como cicatrices, malformaciones craneofaciales o lesiones traumáticas. Los cirujanos reconstructivos utilizan técnicas avanzadas de cirugía plástica para restaurar la apariencia y la función de la cara.
      <br><br>Además, la cirugía reconstructiva en México también se aplica en la reconstrucción de extremidades, la corrección de deformidades óseas y articulares, la reconstrucción de la pared abdominal y la reparación de lesiones en la piel y los tejidos blandos.
      <br><br>En cuanto a los avances científicos en la cirugía reconstructiva en México, cabe destacar que los cirujanos reconstructivos mexicanos han estado a la vanguardia en el uso de tecnologías innovadoras como la cirugía robótica y la impresión 3D para mejorar los resultados quirúrgicos y reducir los tiempos de recuperación.
      <br><br>Un factor importante que ha impulsado el crecimiento de la cirugía reconstructiva en México es la gran cantidad de pacientes con necesidades de reconstrucción debido a la alta tasa de accidentes y traumatismos en el país. También, la cirugía reconstructiva se ha convertido en una alternativa efectiva para el tratamiento de enfermedades como el cáncer, lo que ha llevado a un aumento en la demanda de este tipo de cirugía.
        <br><br>A pesar de los avances en la cirugía reconstructiva en México, aún existen desafíos que enfrenta esta especialidad. Por ejemplo, la falta de acceso a la atención médica de calidad y asequible puede limitar el acceso a los procedimientos reconstructivos para algunos pacientes. Además, la falta de regulación y la falta de una educación adecuada pueden aumentar el riesgo de procedimientos inseguros y mal realizados.
      
      <br><br>En resumen, la cirugía reconstructiva en México es una especialidad médica bien establecida que cuenta con un amplio espectro de procedimientos y técnicas para tratar diversas afecciones. Los cirujanos reconstructivos mexicanos han estado a la vanguardia en el uso de tecnologías innovadoras para mejorar los resultados quirúrgicos y reducir los tiempos de recuperación.

    </p>
     <br>
     <p id="ref3">Referencias:
          <br>- Sociedad Mexicana de Cirugía Plástica, Estética y Reconstructiva:
          <br>- Revista Mexicana de Cirugía Plástica, Estética y Reconstructiva: 
          <br>- Centro Médico Nacional Siglo XXI
        </p>
        <br>
        </p>
        <a href="{{ route('contacto') }}" class="btn btn-info btn-sm">Visítanos</a>
    </div>
  </div>
</div>


<br><br>
<style>
    #hero {
  width: 80%;
  margin: 0 auto;
}

#reconstructiva{
  font-size:40px;
}

#descr{
  font-size:16px;
}

#image3{
  --tw-shadow: 0 25px 50px -12px rgb(0 0 0 / 0.25);
    --tw-shadow-colored: 0 25px 50px -12px var(--tw-shadow-color);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
    border-radius: 0.5rem/* 8px */;
    max-width: 24rem/* 384px */;
  
  }
#ref3{
  font-size:12px;
}


/*@media screen and (max-width: 768px) {
  #reconstructiva {
    font-size: 5vw;
    padding-right:40px;

  }
  #descr{
  font-size: 3.5vw;
  padding-right:40px;
}

  #ref3{
    padding-right:23px;
  }

  #image3{
    max-width: 15rem;
    margin-left:-120px;
  }*/
  
  @media screen and (max-width: 768px) {
  #reconstructiva {
    font-size: 5.5vw;
    padding-right:10px;
  }
  #descr{
  font-size: 4.5vw;
}

#image3{
  max-width: 13rem;

  }
.hero{
  text-align:center;
}
#ref3{
  text-align:left;
}
}

@media screen and (max-width: 767px) {
  #descr {
    font-size: 3vw;
  }
  #reconstructiva {
    font-size: 4vw;
  }
}

@media screen and (max-width: 553px) {
  #descr {
    font-size: 4vw;
  }
  #reconstructiva {
    font-size: 5vw;
  }
}

</style>
@endsection