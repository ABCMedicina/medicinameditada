@extends('layouts.main')

@section('title', 'Contacto')

@section('content')

<br>

<div class="bg-primary mx-auto py-4" style="background-color: #091a32; max-width: 1150px;">
  <h1 class="text-white ml-3">Contáctanos</h1>
  <h3 class="text-white ml-3">Nos encantaría aclarar tus dudas personalmente</h3>
</div>

<div class="hero min-h-screen bg-base-200">
  <div class="hero-content flex-col lg:flex-row-reverse">
        <div class="text-center lg:text-left">
          <h1 id="titulo" class="text-5xl font-bold text-center">Información de contacto</h1>
          <p class="py-6 px-3 text-center"> <a href="tel:5589391491">5589391491</a><br>
              <a href="tel:5589391419">5589391419</a><br>
              <a href="mailto:dr.hesiquio@gmail.com">dr.hesiquio@gmail.com</a>
              <h5 class="px-3 text-center">Centro Médico ABC (CDMX), Campus Observatorio, Torre McKenzie Consul. 2013</h5>
          </p><br>
          <iframe style="width: 100%; height: 260px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3763.195432888295!2d-99.20672648565767!3d19.403960146625224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d201c3bd45c7ad%3A0x8592b7a6bc546025!2sSur%20136%2C%20Am%C3%A9rica%2C%2011820%20Ciudad%20de%20M%C3%A9xico%2C%20CDMX!5e0!3m2!1ses!2smx!4v1678749586004!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <br>
        </div>

    <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100" style="margin-right:10px;">
    <div class="card-body">
      @if(session('mensaje'))
      <div class="badge badge-warning">
          {{ session('mensaje') }}
      </div>
      @endif
        <form action="{{ route('email.contacto') }}" method="post">
          @csrf
            <div class="form-control">
              <label class="label">
                <span class="label-text">Nombre</span>
              </label>
              <input type="text" id="nombre" name="nombre" placeholder="Nombre" class="input input-bordered" value="{{ old('nombre') }}" required/>
              <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>
            <div class="form-control">
              <label class="label">
                <span class="label-text">Correo</span>
              </label>
              <input type="text" id="email" name="email" placeholder="Correo" class="input input-bordered" value="{{ old('email') }}" required />
              <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="form-control">
              <label class="label">
                <span class="label-text">Mensaje</span>
              </label>
              <textarea id="mensaje" name="mensaje" style="resize:none;" rows="3" required>{{ old('mensaje') }}</textarea>
              <x-input-error :messages="$errors->get('mensaje')" class="mt-2" />
            </div>
            <div class="form-control mt-6">
              <button class="btn btn-primary">Enviar</button>
            </div>
          </form>
      </div>   
    </div>
    
    <a href="https://wa.me/5536240694" class="whatsapp-btn">
      <i class="fab fa-whatsapp "></i> Contáctanos por WhatsApp
    </a>

  </div>
</div>
</div>

<style>

form {
			max-width: 200px;
			margin: 0 auto;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-shadow: 0px 0px 5px #ccc;
		}

.whatsapp-btn {
  position: fixed;
  bottom: 20px;
  right: 20px;
  background-color: #25d366;
  color: #fff;
  padding: 10px 20px;
  border-radius: 50px;
  text-decoration: none;
  transition: all 0.3s ease;
  z-index:9999;
}

.whatsapp-btn:hover {
  background-color: #128c7e;
}

.whatsapp i {
  font-size: 30px;
}

iframe {
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

.right{
  padding-top:1px;
  margin-left:260px;
}
input {
  border: 1px solid black;
}

   form {
  display: flex;
  flex-direction: column;
  max-width: 500px;
  margin: 0 auto;
}

label {
  font-size: 1rem;
  font-weight: bold;
  margin-top: 10px;
}

input,
textarea {
  padding: 10px;
  border-radius: 5px;
  border: none;
  margin-bottom: 20px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
  font-size: 1.1rem;
}

.container {
  width: 100%;
  display: flex; 
  flex-wrap: nowrap; 
}

.left, .right {
  display: inline-block;
  width: 40%;
  max-width: 50%; 
  overflow: hidden; 
}

a[href^="tel:"]::before {
  content: "\260E";
  font-size: 20px;
  margin-right: 0.2em;
  vertical-align: middle;
  color: #3C6A9D;
  font-size: 20px;
}

a[href^="mailto:"]::before {
  content: "\2709";
  display: inline-block;
  font-size: 20px;
  margin-right: 0.2em;
  vertical-align: middle;
  color: #3C6A9D;
  font-size: 20px;
}

@media screen and (max-width: 768px) {
  #responsive {
    font-size: 5vw;
  }
  #titulo{
    font-size:5vw;
  }
}

</style>

@endsection