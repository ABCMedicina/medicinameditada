@extends('layouts.main')

@section('title', 'Videos')

@section('content')


<!--<div style="display:flex; justify-content:center;">
  <div>
    <div class="card w-96 bg-base-200 shadow-xl">
        <div class="video-container">
            <iframe width="385" height="220" src="https://www.youtube.com/embed/aRK4B9Kjf0E" allowfullscreen></iframe>
        </div>
      <div class="card-body">
        <h2 class="card-title">
          Shaman Plastic Surgery
        </h2>
        <p>Cirugía Plástica Meditada</p>
        <br><br><br>
      </div>
    </div>
  </div>


  <div style="margin-left:100px;">
    <div class="card w-96 bg-base-200 shadow-xl">
    <div class="video-container">
    <video width="385" height="300" controls>
        <source src="{{ asset('storage/images/mastectomia.mp4') }}" type="video/mp4">
    </video>
    <div>
      <div class="card-body">
        <h2 class="card-title">
          Mastectomía profiláctica
        </h2>
        <p>La mastectomía profiláctica es una cirugía preventiva en la cual se extirpan los senos de personas con alto riesgo de cáncer de mama. Ayuda a reducir el riesgo y brinda tranquilidad a aquellos con antecedentes familiares o mutaciones genéticas.
        </p> 
      </div>
    </div>
  </div>
</div>-->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-3 content-center">
    <div class="card w-300 bg-base-200 shadow-xl mt-5 border ml-5 mr-5">
        <div class="video-container">
                    <iframe width="500" height="350" src="https://www.youtube.com/embed/aRK4B9Kjf0E" allowfullscreen></iframe>
        </div>
            <div class="card-body">
            <h2 class="card-title">
                Cirugía Plástica Meditada
                </h2>
                <p>La cirugía plástica meditada es una técnica que busca lograr una armonía entre la apariencia física y el bienestar emocional de una persona.</p>
            </div>
    </div>

    <div class="card w-300 bg-base-200 shadow-xl mt-5 border ml-5 mr-5">
        <div class="video-container">
                    <iframe width="500" height="350" src="https://www.youtube.com/embed/_zKwpFFDqyc" allowfullscreen></iframe>
        </div>
            <div class="card-body">
            <h2 class="card-title">
            Mastectomía profiláctica
                </h2>
            <p>La mastectomía profiláctica es una cirugía preventiva en la cual se extirpan los senos de personas con alto riesgo de cáncer de mama. Ayuda a reducir el riesgo y brinda tranquilidad a aquellos con antecedentes familiares o mutaciones genéticas.
            </div>
    </div>

    <div class="card w-300 bg-base-200 shadow-xl mt-5 border ml-5 mr-5">
        <div class="video-container">
            <video width="100%" height="300" controls>
                <source src="{{ asset('storage/images/mastectomia.mp4') }}" type="video/mp4">
            </video>
        </div>
        <div class="card-body">
            <h2 class="card-title">
                Mastectomía profiláctica
            </h2>
            <p>La mastectomía profiláctica es una cirugía preventiva en la cual se extirpan los senos de personas con alto riesgo de cáncer de mama. Ayuda a reducir el riesgo y brinda tranquilidad a aquellos con antecedentes familiares o mutaciones genéticas.
            </p> 
        </div>
    </div>

   

</div>



<br>




<style>
  .video-container {
    border-radius: 10px;
    overflow: hidden;
  }

  .video-container iframe {
    width: 100%;
  }
  @media screen and (max-width: 920px) {
 
}



</style>

@endsection