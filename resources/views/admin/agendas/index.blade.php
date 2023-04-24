<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Agendas') }}
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

                    {{-- Botón crear agenda --}}
                    <div class="flex justify-end mb-5">
                        <a href="{{ route('agendas.create') }}" class="btn btn-sm btn-outline btn-primary ring-2 rounded-full">Crear Agenda</a>
                    </div>

                     <!--Filtros-->
                   <div id="filtrosagenda"  class="flex justify-between mb-10">
                        <!--Filtrar por nombre-->
                        <div class="flex justify-start">
                                <div>
                                    <input class="input input-bordered input-sm" id="fecha" type="date" name="fecha">
                                  <button onclick="filtro_fecha()"  class="btn btn-primary ml-2 btn-xs">Buscar</button>
                                    <script>
                                        function filtro_fecha(){
                                            var fecha = document.getElementById("fecha").value;
                                            window.location.href = "{{route('agendas.index')}}?fecha="+fecha;
                                        }
                                    </script>
                                </div>
                        </div>
                        <!--Filtrar por rol-->

                        <div class="flex flex-col gap-2 sm:flex-row justify-end space-x-4">
                            <p id="label">Filtrar por:</p>
                            <a id="a2" href="{{route('agendas.index')}}" class="btn btn-outline btn-xs btn-success rounded-xl">Todos</a>
                            <label id="a2" for="modal-medico" class="btn btn-outline btn-xs btn-success rounded-xl">Médico</label>
                            <label id="a2" for="modal-procedimiento" class="btn btn-outline btn-xs btn-success rounded-xl " >Procedimiento</label>
                            <label id="a2" for="modal-tipo" class="btn btn-outline btn-xs btn-success rounded-xl">Tipo</label>
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
                              <th>Procedimiento</th>
                              <th>Estado</th>
                              <th>Tipo</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <!-- row 1 -->
                            @foreach ($agendas as $agenda)
                            <tr>
                                <td></td>
                                 <!--class="text-[10px] sm:text-[15px] lg:text-[19px]"   Cambiar tamaños de letra--> 
                                <td >
                                    {{ $agenda->fecha }}
                                </td>
                                <td>
                                    {{ $agenda->hora }}
                                </td>
                                <td>
                                    {{ $agenda->medico->nombres . ' ' . $agenda->medico->apellidos }}
                                </td>
                                <td>
                                    {{ $agenda->procedimiento->nombre }}
                                </td>
                                <td>
                                {{-- Si la fecha y hora de la agenda es menor a la fecha y hora actual + 1 hora aparece como expirada --}}
                                    @if(($agenda->fecha.' '.$agenda->hora < date('Y-m-d H:i:s', strtotime('-2 hours'))) && $agenda->estado=='Ocupada')
                                        <span class="badge badge-error">Cita no cumplida</span>
                                    @else
                                        {{ $agenda->estado }}
                                    @endif                                
                                </td>
                                <td>
                                    {{ $agenda->tipo }}
                                </td>
                                <td>
                                    {{-- boton para editar agenda --}}
                                    @if($agenda->estado !="Ocupada" && $agenda->estado!="Atendida")
                                    <div class="tooltip tooltip-left" data-tip="Editar">
                                        <a href="{{ route('agendas.edit', $agenda) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--ic" width="16" height="16" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="#888888" d="m14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83l3.75 3.75l1.83-1.83a.996.996 0 0 0 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z"></path></svg>
                                        </a>
                                    </div>
                                    @endif

                                    {{-- boton para eliminar agenda --}}
                                    @if($agenda->cita==null)
                                    <div class="tooltip tooltip-left" data-tip="Eliminar">
                                        <form action="{{ route('agendas.destroy', $agenda) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                  </svg>
                                            </button>
                                        </form>
                                    </div>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- Paginación --}}
                        <div class="mt-5">
                            {{ $agendas->links() }}
                        </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Modal filtro nombre medico-->
     <input type="checkbox" id="modal-medico" class="modal-toggle" />
        <div class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg mb-4">Seleccione un Médico</h3>
                <!--<form action="{{route('agendas.index')}}" method="GET">-->
                    <select name="medico" id="medico" class="select select-bordered w-full max-w-xs">
                        @foreach($medicos as $medico)
                            <option value="{{ $medico->id }}">{{$medico->name}}</option>
                        @endforeach
                    </select>  
                    
                    <div class="modal-action">
                       <!-- <label for="modal-medico" class="btn"></label>-->
                       <button onclick="filtrar_medico()" class="btn btn-primary">Filtrar</button>
                        <script>
                            function filtrar_medico(){
                                var medico = document.getElementById("medico").value;
                                window.location.href = "{{route('agendas.index')}}?medico="+medico;
                                //cerrar modal
                                document.getElementById("modal-medico").checked = false;
                            }
                        </script>
                    </div>
                <!--</form>-->
        </div>
        </div>

        <!-- Modal filtro procedimiento-->
     <input type="checkbox" id="modal-procedimiento" class="modal-toggle" />
        <div class="modal">
        <div class="modal-box">
        <h3 class="font-bold text-lg mb-4">Seleccione un procedimiento</h3>

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
                        window.location.href = "{{route('agendas.index')}}?procedimiento="+procedimiento;
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
                                window.location.href = "{{route('agendas.index')}}?tipo="+tipo;
                                //cerrar modal
                                document.getElementById("modal-tipo").checked = false;
                            }
                        </script>
                </div>
            </div>
        </div>

    <script>
        // alerta de eliminación de procedimiento
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(e) {
                if (!confirm('¿Estás seguro de eliminar esta agenda?')) {
                    e.preventDefault();
                }
            })
        })
    </script>
<style>
    @media screen and (max-width: 430px) {

#filtrosagenda{

    flex-direction:column;
}

#label{
    margin-top:20px; margin-left:10px;
}

#a2{
    width:150px;
}

}
</style>
</x-app-layout>