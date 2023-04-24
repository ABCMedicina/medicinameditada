<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Historial de citas') }}
        </h2>
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
            <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if(session("info"))
                    <div class="alert alert-success shadow-lg">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span>{{session("info")}}</span>
                        </div>  
                    </div>
                    @endif
                  <br>
                       <!--Filtros-->
                    <div id="filtroscitas" class="flex justify-between mb-10 ">
                        <!--Filtrar por nombre-->
                        <div class="flex justify-start">
                                <div>
                                    <input class="input input-bordered input-sm" id="fecha" type="date" name="fecha">
                                  <button onclick="filtro_fecha()"  class="btn btn-primary ml-2 btn-xs">Buscar</button>
                                    <script>
                                        function filtro_fecha(){
                                            var fecha = document.getElementById("fecha").value;
                                            window.location.href = "{{route('citas.index')}}?fecha="+fecha;
                                        }
                                    </script>
                                </div>
                        </div>
                        <!--Filtrar por rol-->

                        <div class="flex flex-col gap-2 sm:flex-row justify-end space-x-4">
                            <p id="label">Filtrar por:</p>
                            <a id="ac" href="{{route('citas.index')}}" class="btn btn-outline btn-xs btn-success rounded-xl">Todos</a>
                            <label id="ac" for="modal-procedimiento" class="btn btn-outline btn-xs btn-success rounded-xl">Servicio</label>
                            <label id="ac" for="modal-tipo" class="btn btn-outline btn-xs btn-success rounded-xl">Tipo</label>        
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                  
                        <table class="table table-zebra w-full">
                          <!-- head -->
                          <thead>
                            <tr>
                              <th></th>
                              <th>Fecha</th>
                              <th>Hora</th>
                              <th>Médico</th>
                              <th>Servicio</th>
                              <th>Tipo</th>
                              <th>Estado</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <!-- row 1 -->
                            @foreach ($citas as $cita)
                            <tr>
                                <td></td>
                                <td>
                                    {{ $cita->agenda->fecha }}
                                </td>
                                <td>
                                    {{ $cita->agenda->hora }}
                                </td>
                                <td>
                                    {{ $cita->agenda->medico->nombres . ' ' . $cita->agenda->medico->apellidos }}
                                </td>
                                <td>
                                    {{ $cita->agenda->procedimiento->nombre }}
                                </td>
                                <td>
                                    {{ $cita->agenda->tipo }}
                                </td>
                                <td>
                                {{-- Si la fecha y hora de la cita es menor a la fecha y hora actual + 0 hora aparece como expirada --}}
                                    @if(($cita->agenda->fecha.' '.$cita->agenda->hora < date('Y-m-d H:i:s', strtotime('-2 hours'))) && $cita->estado=='Pendiente')
                                        <span class="badge badge-error">Cita no cumplida</span>
                                    @else
                                        {{ $cita->estado }}
                                    @endif                                
                                </td>
                                
                                <td>

                                    {{-- boton para cancelar agenda --}}
                                    @if($cita->estado=='Pendiente')
                                    {{-- la cita se puede cancelar maximo 12 horas antes de la cita --}}
                                        @if($cita->agenda->fecha.' '.$cita->agenda->hora > date('Y-m-d H:i:s', strtotime('+11 hours')))
                                            <form action="{{ route('citas.cancelar', $cita) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-xs btn-primary" onclick="return confirm('¿Estás seguro de cancelar la cita?')">Cancelar cita</button>
                                            </form>
                                        @endif
                                                                    
                                    @endif
                                       
                                

                                    {{-- boton detalle cita --}}
                                    @if($cita->estado=='Atendida')
                                       
                                        <a href="{{ route('citas.show', $cita) }}" class="btn btn-xs btn-success">consultar receta</a>
                                       
                                    @endif

                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- Paginación --}}
                        <div class="mt-5">
                            {{ $citas->links() }}
                        </div>
                </div>
            </div>
        </div>
    </div>
       
        </div>
        </div>
        </div>

        <!-- Modal filtro servicio-->
     <input type="checkbox" id="modal-procedimiento" class="modal-toggle" />
        <div class="modal">
        <div class="modal-box">
        <h3 class="font-bold text-lg mb-4">Seleccione un servicio</h3>

            <select name="procedimiento" id="procedimiento" class="select select-bordered w-full max-w-xs">
                @foreach($procedimientos as $procedimiento)
                    <option value="{{ $procedimiento->id }}">{{$procedimiento->nombre}}</option>
                @endforeach
            </select>  
            
            <div class="modal-action">
                <!-- <label for="modal-procedimiento" class="btn"></label>-->
                <button onclick="filtrar_procedimiento()" class="btn btn-primary">Filtrar</button>
                <script>
                    function filtrar_procedimiento(){
                        var procedimiento = document.getElementById("procedimiento").value;
                        window.location.href = "{{route('citas.index')}}?procedimiento="+procedimiento;
                        //cerrar modal
                        document.getElementById("modal-procedimiento").checked = false;
                    }
                </script>
        </div>
        </div>
        </div>

      <!-- Modal filtro tipo-->
     <input type="checkbox" id="modal-tipo" class="modal-toggle" />
        <div class="modal">
            <div class="modal-box">
                <h3 class="font-bold text-lg mb-4">Seleccione un tipo</h3>
                <select name="tipo" id="tipo" class="select select-bordered w-full max-w-xs">
                    <option value="1">Consulta</option>
                    <option value="2">Procedimiento</option>
                </select>
                <div class="modal-action">
                    <button onclick="filtrar_tipo()" class="btn btn-primary">Filtrar</button>
                        <script>
                            function filtrar_tipo(){
                                var tipo = document.getElementById("tipo").value;
                                window.location.href = "{{route('citas.index')}}?tipo="+tipo;
                                //cerrar modal
                                document.getElementById("modal-tipo").checked = false;
                            }
                        </script>
                </div>
            </div>
        </div>

        <style>

@media screen and (max-width: 430px) {

#filtroscitas{

    flex-direction:column;
}

#label{
    margin-top:20px; margin-left:10px;
}

#ac{
    width:150px;
}

}
        </style>

</x-app-layout>