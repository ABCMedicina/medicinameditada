<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Procedimientos por realizar') }}
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

                    {{-- Botón crear un nuevo procedimiento --}}
                    <div class="flex justify-end mb-6 mt-5">
                        <a href="{{ route('cita.procedimiento.crear') }}"class="btn btn-sm btn-outline btn-primary ring-2 rounded-full">Programar cirugía</a>
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

                                    {{-- boton para editar la cita de procedimiento --}}

                                @if($cita->estado == 'Pendiente')
                                <div class="flex space-x-2">

                                        <div  class="tooltip tooltip-up" data-tip="Editar datos de cirugía de {{$cita->paciente->nombres.' '.$cita->paciente->apellidos}}">
                                        <!--<div  class="tooltip tooltip-left" data-tip="Editar datos de cirugia de {{$cita->agenda->fecha.' '.$cita->agenda->hora}}">-->

                                            <a class="btn btn-xs btn-ghost" href="{{route('cita.procedimiento.editar', $cita)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                                <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                                <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                            </svg>

                                            </a>
                                        </div>
                                        {{-- boton para cancelar la cita de procedimiento --}}

                                        <div class="tooltip tooltip-up" data-tip="Cancelar cirugía de {{$cita->paciente->nombres.' '.$cita->paciente->apellidos}}">
                                        <!--<div class="tooltip tooltip-left" data-tip="Cancelar cirugía de {{$cita->agenda->fecha.' '.$cita->agenda->hora}}">-->
   
                                        <form action="{{ route('cita.procedimiento.cancelar', $cita) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-xs btn-ghost" onclick="return confirm('¿Estás seguro de cancelar la cirugía programada?')">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                                            <path d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375z" />
                                                            <path fill-rule="evenodd" d="M3.087 9l.54 9.176A3 3 0 006.62 21h10.757a3 3 0 002.995-2.824L20.913 9H3.087zm6.133 2.845a.75.75 0 011.06 0l1.72 1.72 1.72-1.72a.75.75 0 111.06 1.06l-1.72 1.72 1.72 1.72a.75.75 0 11-1.06 1.06L12 15.685l-1.72 1.72a.75.75 0 11-1.06-1.06l1.72-1.72-1.72-1.72a.75.75 0 010-1.06z" clip-rule="evenodd" />
                                                        </svg>

                                                    </button>
                                            </form>           
                                        </div>
                                </div>                     
                                @endif

                                @if($cita->estado == 'Atendida')
                                <div class="badge badge-success gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                                    Realizada
                                </div>
                                 @endif


                                 @if($cita->estado == 'Cancelada')
                                <div class="badge badge-error gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-4 h-4 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>

                                    Cancelada
                                </div>
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
    </style>
</x-app-layout>