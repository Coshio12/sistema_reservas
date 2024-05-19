@extends('theme.base')
<body>
    
    <x-app-layout>

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Armado Salon') }}
            </h2>
        </x-slot>

        <div class="p-6">
            @include('armado.modalCrear')
            
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div div class="bg-white overflow-x-auto shadow-sm sm:rounded-lg">
                    <table class="min-w-full">
    <thead class="bg-white border-b">
        <tr>
            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Numero Armado</th>
            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Tipo Armado</th>
            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>                        
        @foreach ($tipo_armado as $armado)
            <tr class="bg-white border-b">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">{{$armado->id_armado}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">{{$armado->nombre_armado}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">
                    <div class="flex justify-center">
                        <div style="width: 100px;">
                            <a href="{{url('/armado/edit/'.$armado->id_armado)}}" class="px-4 py-2.5 bg-yellow-500 rounded-xl hover:rounded-3xl hover:bg-yellow-600 transition-all duration-300 text-white block text-center">Editar</a>
                        </div>
                        <div style="width: 100px;">
                            <form action="{{url('/armado/delete/'.$armado->id_armado)}}" method="post">
                                @csrf
                                <button style="width: 100%;" class="px-4 py-2.5 bg-red-500 rounded-xl hover:rounded-3xl hover:bg-red-600 transition-all duration-300 text-white block text-center" onclick="return confirm('Estas seguro de eliminar este Peronal')">Eliminar</button>
                            </form>
                        </div>
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

