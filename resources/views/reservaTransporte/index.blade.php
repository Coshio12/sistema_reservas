@extends('theme.base')
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Reserva Transporte') }}
            </h2>
        </x-slot>
        <div class="p-6">
            @include('reservaTransporte.modalCrear')
            
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div div class="bg-white overflow-x-auto shadow-sm sm:rounded-lg">
                    <table class="min-w-full">
                        <thead class="bg-white border-b">
                            <tr>
                                {{-- <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Id</th> --}}
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Cliente</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Contacto</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Cantidad Personas</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Recoger</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Llevar</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Fecha</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Hora</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Forma Pago</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Costo</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Personal</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Estado</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Botones</th>
                                
                            </tr>
                        </thead>
                        <tbody> 
                            
                            @foreach ($reserva_transporte as $reserva)
                                <tr class="bg-white border-b">
                                    {{-- <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$reserva->id_persona}}</td> --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$reserva->nombre_cliente}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$reserva->contacto_cliente}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$reserva->cantidad_personas}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$reserva->recoger_de}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$reserva->llevar_a}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$reserva->fecha_reserva}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$reserva->hora_reserva}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$reserva->forma_pago}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$reserva->costo_carrera}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$reserva->personas->nombre_persona}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$reserva->estado_carrera}}</td>
                                    


                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
 
                                            <div class="py-1">
                                                <a href="{{url('/reservaTransporte/edit/'.$reserva->id_reserva_transporte)}}" class="text-center flex p-2.5 bg-yellow-500 rounded-xl hover:rounded-3xl hover:bg-yellow-600 transition-all duration-300 text-white items-center justify-center">  
                                                        Editar
                                                </a>
                                                <br>
                                                <form action="{{url('/reservaTransporte/delete/'.$reserva->id_reserva_transporte)}}" method="post">
                                            
                                                    @csrf
                    
                                                    <button class="text-center flex p-2.5 bg-red-500 rounded-xl hover:rounded-3xl hover:bg-red-600 transition-all duration-300 text-white items-center justify-center w-full" onclick="return confirm('Estas seguro de eliminar este Peronal')">Eliminar</button>

                                                </form>
                                            </div>
                                           
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-app-layout>

    

    
</body>