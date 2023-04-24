<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Respaldos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    {{-- Botón crear backup --}}
                    <div class="flex justify-end mb-5">
                    <button class="btn btn-sm btn-outline btn-primary ring-2 rounded-full" onclick="location.href='{{ route('crear_backup') }}'; this.disabled=true; innerHTML='Creando respaldo...';">CREAR RESPALDO</button>                    </div>

                    @if (session('info'))
                            <div class="alert alert-success shadow-lg my-4">
                                <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                <span>{{session('info')}}</span>
                                </div>
                            </div>
                     @endif



                    <div class="overflow-x-auto">
                        <table class="table table-zebra w-full">
                          <!-- head -->
                          <thead>
                            <tr>
                                <th></th>
                              <th>Archivo</th>
                              <th>Fecha</th>
                              <th>Tamaño</th>
                              <th>Acciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            <!-- row 1 -->
                            @foreach ($files as $file)
                            <tr>
                                <td></td>
                                <td>
                                    {{ $file['name'] }}
                                </td>
                                <td>
                                    {{ $file['date'] }}
                                </td>
                                <td>
                                    {{ $file['size'] }}
                                </td>
                                <td class="flex space-x-4">
                                {{-- Botón para descargar --}}
                                <div class="tooltip tooltip-up" data-tip="Descargar respaldo {{ $file['name'] }}">
                                        <a href="{{ route('descargar_backup', $file['name']) }}" class="btn btn-xs btn-ghost">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                            <path fill-rule="evenodd" d="M19.5 21a3 3 0 003-3V9a3 3 0 00-3-3h-5.379a.75.75 0 01-.53-.22L11.47 3.66A2.25 2.25 0 009.879 3H4.5a3 3 0 00-3 3v12a3 3 0 003 3h15zm-6.75-10.5a.75.75 0 00-1.5 0v4.19l-1.72-1.72a.75.75 0 00-1.06 1.06l3 3a.75.75 0 001.06 0l3-3a.75.75 0 10-1.06-1.06l-1.72 1.72V10.5z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                </div>
                                        {{-- Botón para eliminar --}}
                                        <form action="{{ route('eliminar_backup', $file['name']) }}" method="GET">
                                        <div class="tooltip tooltip-up" data-tip="Eliminar respaldo {{ $file['name'] }}">
                                            <button type="submit" class="btn btn-xs btn-ghost" onclick="return confirm('¿Estás seguro de eliminar el archivo ' + '{{ $file['name'] }}' + '?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                                            </svg>


                                        </button>
                                        </div>
                                        </form>
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