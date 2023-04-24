<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar procedimiento') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="flex justify-center">
                <form class="border-1 shadow-xl p-4" method="POST" action="{{ route('cita.procedimiento.actualizar', $cita) }}">
                        @csrf
                        @method('PUT')
                        <!-- Buscar paciente-->
                        <div class="form-control">
                            <div class="input-group">
                                <input type="text" name="nombre_paciente" id="nombre_paciente" placeholder="Buscar paciente" class="input input-bordered" disabled value="{{$cita->paciente->name}}" />

                                <label for="modal_buscar_paciente" class="btn btn-square" disabled>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                                </label>
                                <input type="hidden" name="paciente_id" id="paciente_id" value="{{$cita->paciente->id}}">

                            </div>
                        </div>
                        <!--Lista de procedmientos-->
                        <div class="flex flex-col mt-4">
                            <label for="procedimiento">Procedimiento</label>
                            <select name="procedimiento" id="procedimiento" onclick="cargarFechas()" class="select select-bordered w-full max-w-xs">
                                    <option value="">Seleccione un procedimiento</option>
                                    @foreach($procedimientos as $procedimiento)
                                        @if ($cita->agenda->procedimiento_id == $procedimiento->id) 
                                            <option value="{{ $procedimiento->id }}" selected>{{ $procedimiento->nombre }}</option>
                                        @else
                                            <option value="{{ $procedimiento->id }}">{{ $procedimiento->nombre }}</option>
                                        @endif                                   
                                    @endforeach
                            </select>
                        </div>

                        <!--Fechas y horas disponibles para los procedimientos-->

                        <div class="flex flex-col mt-4" >
                            <label for="fecha">Fecha y hora</label>
                            <select name="fecha" id="fecha" class="select select-bordered w-full max-w-xs">                               
                            <option value="{{$cita->id}}">{{$cita->agenda->fecha.' '.$cita->agenda->hora}}</option>            
                            </select>
                        </div>
                       
                        <div class="flex items-center justify-end mt-4">
                        <button id="crear" type="submit" class="btn btn-primary" disabled  onclick="this.disabled=true;  this.innerHTML='Agendando...'; this.form.submit();" >
                        Actualizar</button>
                            <a href="{{ route('procedimientos.programados') }}" class="btn btn-outline btn-primary ml-5">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>

    </div>
    <!--Modal buscar paciente-->
        <input type="checkbox" id="modal_buscar_paciente" class="modal-toggle" />
        <div class="modal">
            <div class="modal-box relative">
                <label for="modal_buscar_paciente" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                <h3 class="text-lg font-bold">Buscar paciente</h3>
                <input name="paciente" id="paciente" type="text" onkeyup="buscarPaciente()" placeholder="Escriba el nombre del paciente" class="input input-bordered w-full mt-2">       
                <select  name="listaPacientes" id="listaPacientes" onclick="seleccionarNombre()" class="border-2 w-full hidden rounded-xl"></select>
            </div>
        </div>

        <script>
            function buscarPaciente()
            {
                var paciente = document.getElementById("paciente").value;
                var listaPacientes = document.getElementById("listaPacientes");
                var url = "{{ route('buscar.paciente', ':paciente') }}";
                url = url.replace(':paciente', paciente);
                
                axios.get(url)
                    .then(function (response) {
                        var pacientes = response.data;
                        listaPacientes.innerHTML = "";
                        for (var i = 0; i < pacientes.length; i++) {
                            var option = document.createElement("option");
                            option.value = pacientes[i].id;
                            option.text = pacientes[i].nombres + " " + pacientes[i].apellidos;
                            listaPacientes.appendChild(option);
                        }
                        //si existen pacientes se muestra la lista de pacientes
                        if (pacientes.length > 0) {
                            //el alto de la lista de pacientes es igual al número de pacientes
                            listaPacientes.size = pacientes.length;
                            listaPacientes.classList.remove("hidden");

                            //al pasar el mouse sobre una opcion de la lista cambiar el color de fondo unicamente de esa opcion y volver a su color original cuando se retira el mouse
                            listaPacientes.addEventListener("mouseover", function (e) {
                                e.target.classList.add("bg-gray-700","text-white");
                            });
                            listaPacientes.addEventListener("mouseout", function (e) {
                                e.target.classList.remove("bg-gray-700","text-white");
                            });

                        } else {
                            listaPacientes.classList.add("hidden");

                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }

            function seleccionarNombre()
            {
                var paciente_id=document.getElementById('paciente_id');
                var nombre_paciente=document.getElementById('nombre_paciente');
                var procedimiento=document.getElementById('procedimiento');
                var fecha=document.getElementById('fecha');
                var listaPacientes=document.getElementById('listaPacientes');
                
                paciente_id.value=listaPacientes.value;
                nombre_paciente.value=listaPacientes.options[listaPacientes.selectedIndex].text;
                listaPacientes.classList.add('hidden');
                procedimiento.value="";
                fecha.innerHTML="";

                document.getElementById('modal_buscar_paciente').checked=false;
                document.getElementById('paciente').value="";
            }

            function cargarFechas() {      

                var procedimiento = document.getElementById("procedimiento").value;
                var paciente_id = document.getElementById("paciente_id").value;
                var fecha = document.getElementById("fecha");
                var url = "{{ route('agendas.disponibles', ':procedimiento') }}";
                url = url.replace(':procedimiento', procedimiento);
                axios.get(url)
                    .then(function (response) {
                        var fechas = response.data;
                        fecha.innerHTML = "";
                        for (var i = 0; i < fechas.length; i++) {
                            var option = document.createElement("option");
                            option.value = fechas[i].id;
                            option.text = fechas[i].fecha + " " + fechas[i].hora;
                            fecha.appendChild(option);
                        }
                        // si no hay fechas disponibles se deshabilita el botón de crear cita
                        //Se agrega una opción por defecto
                        if (fechas.length == 0) {
                            var option = document.createElement("option");
                            option.value = "";
                            option.text = "No hay fechas disponibles";
                            fecha.appendChild(option);
                            document.getElementById("crear").disabled = true;
                        } else {
                            document.getElementById("crear").disabled = false;
                        }
                        if (paciente_id == "") {
                            document.getElementById("crear").disabled = true;
                        }

                        
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                }

        </script>

</x-app-layout>