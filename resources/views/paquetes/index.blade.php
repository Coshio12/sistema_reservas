@extends('theme.base')

<body>
    
    <x-app-layout>

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Paquetes') }}
            </h2>
        </x-slot>

        <div class="p-6">
            @include('paquetes.modalCrear')
            
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div div class="bg-white overflow-x-auto shadow-sm sm:rounded-lg">
                    <table class="min-w-full">
                        <thead class="bg-white border-b">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Id</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Nombre Paquetes</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Descripcion</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Botones</th>
                            </tr>
                        </thead>
                        <tbody>                        
                            @foreach ($paquetes_turismo as $paquetes)
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$paquetes->id_paquetes}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$paquetes->nombre_paquetes}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$paquetes->descripcion_paquetes}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
 
                                            <div class="py-1">
                                                <a href="{{url('/paquetes/edit/'.$paquetes->id_paquetes)}}" class="text-center flex p-2.5 bg-yellow-500 rounded-xl hover:rounded-3xl hover:bg-yellow-600 transition-all duration-300 text-white items-center justify-center">  
                                                        Editar
                                                </a>
                                                <br>
                                                <form action="{{url('/paquetes/delete/'.$paquetes->id_paquetes)}}" method="post">
                                            
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

