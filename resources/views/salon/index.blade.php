@extends('theme.base')
<body>
    
    <x-app-layout>

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Salon') }}
            </h2>
        </x-slot>

        <div class="p-6">
            @include('salon.modalCrear')
            
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div div class="bg-white overflow-x-auto shadow-sm sm:rounded-lg">
                    <table class="min-w-full">
                        <thead class="bg-white border-b">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Estilo Salon</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Nombre Salon</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Capacidad del Salon</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Descripcion del Salon</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Botones</th>
                            </tr>
                        </thead>
                        <tbody>                        
                            @foreach ($salon as $salon)
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$salon->id_salon}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$salon->nombre_salon}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$salon->capacidad_salon}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$salon->descripcion_salon}}</td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
 
                                            <div class="py-1">
                                                <a href="{{url('/salon/edit/'.$salon->id_salon)}}" class="text-center flex p-2.5 bg-yellow-500 rounded-xl hover:rounded-3xl hover:bg-yellow-600 transition-all duration-300 text-white items-center justify-center">  
                                                        Editar
                                                </a>
                                                <br>
                                                <form action="{{url('/salon/delete/'.$salon->id_salon)}}" method="post">
                                            
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

