<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('addlivro')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <div>
                                <x-label for="titulo" class="mt-5" :value="__('Titulo:')" />
                                <x-input id="titulo" class="block mb-2" type="text" name="titulo" :value="old('titulo')" required />
                            </div>
                            <div>
                                <x-label for="autor" class="mt-5" :value="__('Autor:')" />
                                <x-input id="autor" class="block" type="text" name="autor" :value="old('autor')" required />
                            </div>
                            <div>
                                <x-label for="genero" class="mt-5" :value="__('Genero:')" />
                                <x-input id="genero" class="block" type="text" name="genero" :value="old('genero')" required />
                            </div>
                            <div>
                                <x-label for="isbn" class="mt-5" :value="__('Isbn:')" />
                                <x-input id="isbn" class="block" type="number" name="isbn" :value="old('isbn')" required />
                            </div>
                        </div>
                        <x-button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2">
                            {{ __('Adicionar livro') }}
                        </x-button><br>
                    </form>
                    
                    @foreach (Auth::user()->livros as $livro)
                        {{   $livro->titulo   }} <br>
                        {{   $livro->autor   }}<br>
                        {{   $livro->genero   }}<br>
                        {{   $livro->isbn   }}<br>
                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Editar</button>
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Apagar</button><br><br>

                    @endforeach
                   
                 
                  <div>{{ Auth::user()->name }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
