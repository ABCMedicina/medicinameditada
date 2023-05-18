@extends('layouts.main')

@section('title', 'Ginecomastía')

@section('content')


<br>
<div class="hero min-h-screen bg-base-200" id="hero">
  <div class="hero-content flex-col lg:flex-row-reverse">

  
  <div class="flex-col">
                <img id="image4" src="{{ asset('storage/images/ginecomastia.jpg') }}" />
                <br>
                <img id="image4" src="{{ asset('storage/images/ginecomastia2.jpg') }}" />

  </div>

   
   
    <div>
      <p id="gineco" class="text-5xl font-bold">Torso masculino</p>
      <p id="descg" class="py-6">
      Es el aumento de los pechos en niños y hombres debido a exceso de tejido graso en el área del tórax.  Es un incremento benigno (no canceroso), este trastorno es resultado de un desequilibrio de la testosterona (hormona masculina) y el estrógeno (hormona femenina). Generalmente la ginecomastia no causa problemas de salud, pero puede ocasionar sensibilidad y vergüenza que disminuye la autoestima de un hombre.
      <br><p id="descg2" >Reducción de senos masculinos </p>
      <p id="descg">Es un procedimiento quirúrgico que elimina el tejido mamario aumentado “senos masculinos” ginecomastia.  El exceso de grasa en los senos masculinos puede impedir que se consiga un tórax firme y tonificado. La cirugía de ginecomastia elimina este exceso de células grasas de manera permanente brindando una apariencia más masculina que  eleva la confianza y la autoestima de un hombre</p>
      <br>> Mejora los contornos del pecho, para que pueda sentirse más cómodo sin importar la ropa que utilicen.

      <br><br>> Mejora la limpieza e higiene, generalmente se forman pliegues o arrugas en la piel que pueden originar diferentes problemas en la piel, al elimina el exceso de tejido mamario, mejora la higiene del área.

      <br><br>> Reduce malestares, los senos masculinos aumentados en algunos casos pueden ocasionar incomodidad o dolor, e incluso reducir o eliminar el rendimiento físico, al eliminar el exceso del tejido mamario mejorará la comodidad, incrementará el movimiento personal y físico, incrementando  y elevará la calidad de vida.
      <br><br>Un estudio publicado en la revista European Journal of Endocrinology en 2020 examinó los factores hormonales subyacentes que contribuyen al desarrollo de la ginecomastia. Los autores encontraron que los niveles de estradiol, una forma de estrógeno, y la relación entre los niveles de testosterona y estradiol, son factores importantes en la patogénesis de la ginecomastia. Además, se observó que el aumento de los niveles de estradiol puede contribuir al desarrollo de la ginecomastia, mientras que la reducción de los niveles de estradiol puede mejorar la condición en algunos pacientes.
      <br><br>Otro estudio publicado en la revista Plastic and Reconstructive Surgery en 2019 analizó los resultados de la cirugía para la ginecomastia en hombres jóvenes. Los autores encontraron que la cirugía de ginecomastia fue efectiva para mejorar la apariencia física y la calidad de vida en los pacientes jóvenes. Además, se observó que la cirugía fue segura y no se asoció con complicaciones graves.
      <br><br>Asimismo, a través de diversas revisiones publicadas en la revista Annals of Plastic Surgery en 2018, se examinaron las técnicas quirúrgicas utilizadas para tratar la ginecomastia y los resultados de estas técnicas. Los autores encontraron que la liposucción y la extirpación glandular son las técnicas quirúrgicas más comunes utilizadas para tratar la ginecomastia. Además, se observó que la combinación de estas dos técnicas puede mejorar los resultados estéticos en algunos pacientes.
      <br><br>El cirujano plástico certificado, es el único que puede orientarle si el paciente es un buen candidato para la cirugía de ginecomastia, a través de una revisión personalizada. 

    </p>
    <br><br><p id="ref4" style="font-size:12px;">Referencias:
         <br>- Rogol, A. D., & Sinha, M. (2020). Pathogenesis of gynecomastia. European Journal of Endocrinology, 182(6), R211-R218.
         <br>- Wilke, B. M., Knackstedt, R., & Gazyakan, E. (2019). Gynecomastia surgery in young men: short-and long-term quality-of-life improvement. Plastic and Reconstructive Surgery, 144(4), 682e-688e.
         <br>- Cregten-Escobar, P., Bouman, M. B., & van Bemmel, A. J. M. (2018). Surgical management of gynecomastia: a review of the current state of the art. Annals of Plastic Surgery, 80(6S Suppl 6), S305-S310.

        </p>
        <br>
      
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

#gineco{
  font-size:40px;
}
#descg{
  font-size:16px;

}
#descg2{
  font-size: 23px;
}

#image4{
  --tw-shadow: 0 25px 50px -12px rgb(0 0 0 / 0.25);
    --tw-shadow-colored: 0 25px 50px -12px var(--tw-shadow-color);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
    border-radius: 0.5rem/* 8px */;
    max-width: 24rem/* 384px */;
  
  }


@media screen and (max-width: 768px) {
  #gineco {
    font-size: 5.5vw;
  }
  #descg{
  font-size: 4.5vw;
  padding-right:23px;
}
#descg2{
  font-size: 4.5vw;
}
  #ref4{
    padding-right:25px;
    text-align:left;
  }

  #image4{
    max-width: 13rem;
  }
  .hero{
  text-align:center;
}

}
@media screen and (max-width: 767px) {
  #descg {
    font-size: 2.5vw;
  }
  #gineco {
    font-size: 4vw;
  }
}

@media screen and (max-width: 553px) {
  #descg {
    font-size: 4vw;
    margin-left:15px;
  }
  #gineco {
    font-size: 5vw;
  }

}

</style>
@endsection