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
                 <!--Filtros-->
                 <div id="filtroshistorial" class="flex justify-between mb-10">
                        <!--Filtrar por nombre-->
                        <div class="flex justify-start">
                           <form action="{{route('citas.historial_medico')}}" method="GET">
                                <div>
                                    <input class="input input-bordered input-sm" type="text" name="nombre" placeholder="Buscar por nombre">
                                    <button type="submit" class="btn btn-primary ml-2 btn-xs">Buscar</button>
                                </div>
                           </form>
                        </div>
                        <!--Filtrar por tipo (consulta o procedimiento)-->

                        <div class="flex flex-col gap-2 sm:flex-row justify-end space-x-4">
                            <p id="label">Filtrar por:</p>
                            <a id="ah" href="{{route('citas.historial_medico')}}" class="btn btn-outline btn-xs btn-success rounded-xl">Todos</a>
                            <a  id="ah" href="{{route('citas.historial_medico',['tipo'=>1])}}" class="btn btn-outline btn-xs btn-success rounded-xl">Consulta</a>
                            <a  id="ah" href="{{route('citas.historial_medico',['tipo'=>2])}}" class="btn btn-outline btn-xs btn-success rounded-xl">Procedimientos</a>
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
                              <th>Paciente</th>
                              <th>Servicio</th>
                              <th>Tipo</th>
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
                                    {{ $cita->paciente->nombres . ' ' . $cita->paciente->apellidos }}
                                </td>
                                <td>
                                    {{ $cita->agenda->procedimiento->nombre }}
                                </td>
                                <td>
                                    {{ $cita->agenda->tipo }}
                                </td>
                                <td>

                                    {{-- boton para ver detalle de la cita --}}
                                @if($cita->estado=="Atendida")
                                <a class="btn btn-xs btn-color" href="{{route('citas.detalle', $cita->id)}}">Consultar receta</a>
                                @endif

                                @if($cita->estado=="Cancelada")
                                <div class="badge badge-error">Cancelada</div>
                                @endif                                
                            </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <style>
        .btn-color{
            background-color:#049248;
            color:white;
        }   
        
        @media screen and (max-width: 430px) {

#filtroshistorial{

    flex-direction:column;
}

#label{
    margin-top:20px; margin-left:10px;
}

#ah{
    width:150px;
}

}
    </style>
</x-app-layout>