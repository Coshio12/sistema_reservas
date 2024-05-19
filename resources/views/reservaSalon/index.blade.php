@extends('theme.base')
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Reserva Salon') }}
            </h2>
        </x-slot>
        <div class="p-6">
            @include('reservaSalon.modalCrear')
            
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div div class="bg-white overflow-x-auto shadow-sm sm:rounded-lg">
                    <table class="min-w-full">
                        <thead class="bg-white border-b">
                            <tr>
                                {{-- <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Id</th> --}}
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">nombre_evento</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">nombre_cliente</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">celular_cliente</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">tipo_cliente</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">fecha_reserva</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">hora_inicio</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">hora_final</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">horas_totales</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">tipo_periodo</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">costo_salon</th>

                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">id_persona</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">id_salon</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">id_armado</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">estado_reserva</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Botones</th>
                                
                            </tr>
                        </thead>
                        <tbody> 
                            
                            @foreach ($reserva_salon as $reserva)
                                <tr class="bg-white border-b">
                                    {{-- <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$reserva->id_persona}}</td> --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$reserva->nombre_evento}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$reserva->nombre_cliente}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$reserva->celular_cliente}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$reserva->tipo_cliente}}</td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$reserva->fecha_reserva}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$reserva->hora_inicio}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$reserva->hora_final}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$reserva->horas_totales}}</td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$reserva->tipo_periodo}}</td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$reserva->costo_salon}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$reserva->personas->nombre_persona}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$reserva->salon->nombre_salon}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$reserva->tipo_armado->nombre_armado}}</td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$reserva->estado_reserva}}</td>
                                    
                                    
                                    
                                    


                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
 
                                            <div class="py-1">
                                                <a href="{{url('/reservaSalon/edit/'.$reserva->id_reserva_salon)}}" class="text-center flex p-2.5 bg-yellow-500 rounded-xl hover:rounded-3xl hover:bg-yellow-600 transition-all duration-300 text-white items-center justify-center">  
                                                        Editar
                                                </a>
                                                <br>
                                                <form action="{{url('/reservaSalon/delete/'.$reserva->id_reserva_salon)}}" method="post">
                                            
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