<x-guest-layout>
    <form id="form-register" method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        {{-- <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div> --}}

        <!-- Nombres -->
        <div>
            <x-input-label  for="nombres" :value="__('Nombres')" />
            <x-text-input id="nombres" class="input block mt-1 w-full" type="text" name="nombres" :value="old('nombres')" placeholder="Ingrese sus nombres" required />
            <x-input-error :messages="$errors->get('nombres')" class="mt-2" />
        </div>

        <!-- Apellidos -->
        <div>
            <x-input-label class="mt-2" for="apellidos" :value="__('Apellidos')" />
            <x-text-input id="apellidos" class="input block mt-1 w-full" type="text" name="apellidos" :value="old('apellidos')" placeholder="Ingrese sus apellidos" required />
            <x-input-error :messages="$errors->get('apellidos')" class="mt-2" />
        </div>

        <!-- Documento -->
        <div>
            <x-input-label class="mt-2" for="documento" :value="__('CURP')" />
            <x-text-input id="documento" class="input block mt-1 w-full" type="text" name="documento" :value="old('documento')" placeholder="Solo letras mayúsculas y números" required />
            <x-input-error :messages="$errors->get('documento')" class="mt-2" />
        </div>

        <!-- Fecha_nacimiento -->
        <div>
            <x-input-label class="mt-2" for="fecha_nacimiento" :value="__('Fecha de nacimiento')" />
            <x-text-input id="fecha_nacimiento" class="input block mt-1 w-full" type="date" name="fecha_nacimiento" :value="old('fecha_nacimiento')" required />
            <x-input-error :messages="$errors->get('fecha_nacimiento')" class="mt-2" />
        </div>

        <!-- Telefono -->
        <div>
            <x-input-label class="mt-2" for="telefono" :value="__('Teléfono')" />
            <x-text-input id="telefono" class="input block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" placeholder="Ingrese solo números" required />
            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
        </div>

        <!-- Direccion 
        <div>
            <x-input-label class="mt-2" for="direccion" :value="__('Dirección')" />
            <x-text-input id="direccion" class="input block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" placeholder="Calle # ejemplo, colonia ejemplo, ciudad ejemplo" required />
            <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
        </div>-->

        <!-- Email Address -->
        <div class="mt-2">
            <x-input-label for="email" :value="__('Correo electrónico')" />
            <x-text-input id="email" class="input block mt-1 w-full" type="email" placeholder="ejemplo@gmail.com" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-2">
            <x-input-label for="password" :value="__('Contraseña')"  />

            <x-text-input id="password" class="input block mt-1 w-full"
                            type="password"
                            name="password"
                            placeholder="Mín 8 caracteres, 1 número y 1 carácter especial"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-2">
            <x-input-label for="password_confirmation" :value="__('Confirme contraseña')" />

            <x-text-input id="password_confirmation" class="input block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-3 flex items-center justify-center">
        
        <!--Recaptcha v2-->
        {!! NoCaptcha::renderJs() !!}
        {!! NoCaptcha::display() !!}
        </div>
        <x-input-error :messages="$errors->get('g-recaptcha-response')" class="mt-2" />


        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('¿Ya estás registrado?') }}
            </a>

          <x-primary-button class="ml-4">
                {{ __('Registrarse') }}
              </x-primary-button>

            <!--CAPTCHA-->
           <!--<button class="g-recaptcha" 
                data-sitekey="reCAPTCHA_site_key" 
                data-callback='onSubmit' 
                data-action='submit'>Registrarse
            </button>
        </div>
    </form>
    <script src="https://www.google.com/recaptcha/api.js"></script>

    <script>
        function onSubmit(token) {
            document.getElementById("form-register").submit();
        }

    </script>-->
</x-guest-layout>
<br><br>
