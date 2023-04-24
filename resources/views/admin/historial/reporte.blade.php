<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($tipo_reporte) }}
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

                    <div class="flex justify-end mb-5">
                    <a href="{{ route('historial.index') }}" class="btn btn-sm btn-outline btn-primary ring-2 rounded-full">Regresar</a>
                    </div>

                    <!--
                    <div class="flex justify-between mb-10">
                       
                        <div class="flex justify-start">

                                <div class="flex justify-start">
                                <form action="{{route('historial.reporte', $tipo_reporte)}}" method="GET">
                                        <div>
                                            <input class="input input-bordered input-sm" type="text" name="paciente" id="paciente" placeholder="Buscar por nombre">
                                            <button type="submit" class="btn btn-primary ml-2 btn-xs">Buscar</button>
                                        </div>
                                </form>
                                </div>

                                <div>
                                    <input class="input input-bordered input-sm" id="fecha" type="date" name="fecha">
                                  <button onclick="filtro_fecha()"  class="btn btn-primary ml-2 btn-xs">Buscar</button>
                                    <script>
                                        function filtro_fecha(){
                                            var fecha = document.getElementById("fecha").value;
                                            window.location.href = "{{route('historial.reporte', $tipo_reporte)}}?fecha="+fecha;
                                        }
                                    </script>
                                </div>
                            
                        </div>

                        

                        Filtrar por rol

                        <div class="flex flex-col gap-2 sm:flex-row justify-end space-x-4">
                            <p>Filtrar por:</p>
                            <a href="{{route('historial.reporte', $tipo_reporte)}}" class="btn btn-outline btn-xs btn-success rounded-xl">Todos</a>
                            <label for="modal-medico" class="btn btn-outline btn-xs btn-success rounded-xl">Médico</label>
                            <label for="modal-procedimiento" class="btn btn-outline btn-xs btn-success rounded-xl">Procedimiento</label>
                        </div>
                    </div>-->


                    <div class="overflow-x-auto">
                        <table class="table table-zebra w-full">
                          <!-- head -->
                          <thead>
                            <tr>
                                <th></th>
                              <th>Paciente</th>
                              <th>Fecha</th>
                              <th>Hora</th>
                              <th>Médico</th>
                              <th>Procedimiento</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <!-- row 1 -->
                            @foreach ($citas as $cita)
                            <tr>
                                <td></td>
                                 <td>
                                    {{ $cita->paciente->name }}
                                </td>
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


                                    {{-- boton detalle cita --}}
                                    @if($cita->estado=='Atendida')                           
                                        <a href="{{ route('citas.show', $cita) }}" class="btn btn-xs btn-success">Ver detalles</a>                     
                                    @endif

                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $citas->links() }}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
   

</x-app-layout>