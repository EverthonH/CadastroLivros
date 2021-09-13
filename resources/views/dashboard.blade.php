<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="p-6 bg-fundo border-b border-gray-200 te">
					<h4> Adicionar Livros </h4>
				</div>
				<div class="d-flex justify-content-center">
					<form action="{{route('addlivro')}}" method="POST"  class="ml-10">
						@csrf
						<div>
							<x-label for="titulo" class="mt-5" :value="__('Titulo:')" />
							<x-input id="titulo" class="block" type="text" name="titulo" :value="old('titulo')" required />
						</div>
						<div>
							<x-label for="autor" class="mt-5" :value="__('Autor:')" />
							<x-input id="autor" class="from-control-file " type="text" name="autor" :value="old('autor')" required />
						</div>
						<div>
							<x-label for="genero" class="mt-5" :value="__('Genero:')" />
							<x-input id="genero" class="from-control-file " type="text" name="genero" :value="old('genero')" required />
						</div>
                        <div>
							<x-label for="isbn" class="mt-5" :value="__('Isbn:')" />
							<x-input id="isbn" class="from-control-file " type="number" name="isbn" :value="old('isbn')" required />
						</div>
						<x-button class="ml-4 mt-5 mb-5 bg-green-600 hover:green-400">
							{{ __('Adicionar') }}
						</x-button>
					</form>
				</div>
			</div>
			<h3>Livros</h3>
			<div class="grid grid-cols-3 ">
				@foreach(Auth::user()->livros as $livro)
				<div class="card mt-5" style="width: 18rem;">
					<div class="card-body text-break">
						<h5 class="card-title">{{ $livro->titulo }}</h5>
						<p class="card-text">{{$livro->autor}}</p>
                        <p class="card-text">{{$livro->genero}}</p>
                        <p class="card-text">{{$livro->isbn}}</p>

						<div class=" item-center justify-center">
							<!--Botão de editar -->
							<div x-data="{modal_editar: false}">
								<!--Ícone -->
								<div  @click="modal_editar = true" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded w-20 h-10 mb-5">Editar</div>
								<a href="{{ route('delelivro', $livro)}}" style="text-decoration: none;" class="mt-3 bg-red-500 hover:bg-red-700 text-white font-bold py-2  px-4 border border-red-700 rounded">Excluir</a>
								<!-- MODAL de editar -->
								<div class="fixed z-10 inset-0 overflow-y-auto" style="display: none;" x-show="modal_editar">
									<div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
										<div class="fixed inset-0 transition-opacity" aria-hidden="true" @click="modal_editar = false">
											<div class="absolute inset-0 bg-gray-500 opacity-75"></div>
										</div>
										<span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
										<div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full p-3" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
											<div>
												<form action="{{ route('uplivro', $livro) }}" method="POST">
													@csrf
													@method('PUT')
													<div class="m-3">
														<x-label for="titulo" :value="__('Titulo')" />
														<x-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" value=" {{ $livro->titulo }}" required/>
													</div>
                                                    <div class="m-3">
														<x-label for="autor" :value="__('Autor')" />
														<x-input id="autor" class="block mt-1 w-full" type="text" name="autor" value=" {{ $livro->autor }}" required/>
													</div>
													<div class="m-3">
															<x-label for="genero" :value="__('Genero')" />
															<x-input id="genero" class="block mt-1 w-full" type="Text" name="genero" value=" {{ $livro->genero }}" required/>
													</div>
                                                    <div class="m-3">
                                                        <x-label for="isbn" :value="__('Isbn')" />
                                                        <x-input id="isbn" class="block mt-1 w-full" type="Text" name="isbn" value=" {{ $livro->isbn }}" required/>
                                                </div>

															<div class="flex items-center justify-end mt-4">
																<div class="flex items-center justify-center mt-4">
																	<a class="underline text-sm hover:text-red-500 cursor-pointer" @click="modal_editar = false">
																		{{ __('Cancelar') }}
																	</a>
																	<x-button class="ml-4 bg-green-500 text-black-500 font-semibold border border-green-200 hover:bg-green-800 hover:text-white hover:border-transparent hover:shadow-md">
																		{{ __('Editar') }}
																	</x-button>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>
