<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Agenda del día') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="overflow-x-auto">
                        <table class="table table-zebra w-full">
                          <!-- head -->
                          <thead>
                            <tr>      
                              <th></th>       
                              <th>Hora</th>
                              <th>Paciente</th>
                              <th>Procedimiento</th>
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
                                    {{ $cita->agenda->hora }}
                                </td>
                             <td>
                                    {{ $cita->paciente->name }}
                                </td>
                                <td>
                                    {{ $cita->agenda->procedimiento->nombre }}
                                </td>
                                <td>
                                    {{ $cita->agenda->tipo }}
                                </td>
                                
                                <td>

                                    {{-- boton para atender agenda --}}
                                    @if($cita->agenda->estado != 'Cancelada')
                                        @if($cita->estado =='Pendiente')
                                            
                                        @if($cita->agenda->hora < date('H:i:s',strtotime('-2 hour')))
                                        <div class="badge badge-warning" >Cita expirada</div>
                                            @else
                                            <a class="btn btn-info btn-xs" href="{{route('citas.atender', $cita->id)}}" >Atender cita</a>
                                            @endif
                                         @endif
                                        @if($cita->estado=="Cancelada")
                                        
                                        <div class="badge badge-success">Cancelada</div>
                                        @endif                  
                                        @if($cita->estado=="Atendida")
                                          <!--  <span>Atendida</span>-->
                                          <div class="badge badge-success">Atendida</div>

                                        @endif
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
</x-app-layout>