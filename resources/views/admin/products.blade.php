@php use Illuminate\Support\Facades\Storage; @endphp
@extends('layouts.default')

@section('content')

    <!-- Index Post -->
    <div class="container max-w-7xl mx-auto mt-8">
        <div class="mb-4">

            <div class="flex justify-between items-center">
                <h1 class=" text-3xl font-bold decoration-gray-400 text-center">Produtos</h1>
                <a href="{{route('admin.products.create')}}"
                   class="px-4 py-2 rounded-md bg-purple-500 text-sky-100 hover:bg-purple-600">Adicionar</a>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div
                    class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="min-w-full">
                        <thead>
                        <tr class="bg-gray-100">
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200">
                                #
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200">
                                Imagem
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200">
                                Nome
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200">
                                Valor
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200">
                                Estoque
                            </th>
                            <th class="px-6 py-3 text-xs font-medium uppercase text-left text-gray-500 border-b border-gray-200"
                                colspan="3">
                                Ações
                            </th>
                        </tr>
                        </thead>

                        <tbody class="bg-white">
                        @foreach($products as $product)

                            <tr @if($loop->even) class="bg-gray-100" @endif>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex items-center">
                                        {{ $product->id }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900">
                                        <img src="{{ Storage::url($product->cover) }}" alt="{{ $product->name }}"
                                             class="w-20 rounded">
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900"> {{ $product->name }}
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <p>R$ {{ $product->price }}</p>
                                </td>

                                <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                    <span> {{ $product->stock }}</span>
                                </td>

                                <td class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 ">
                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                       class="text-purple-600 hover:text-purple-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>

                                <td class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 ">
                                    <a href="#" class="text-gray-600 hover:text-gray-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </a>

                                </td>

                                <td class="text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200 ">
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-6 h-6 text-red-600 hover:text-red-800"
                                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
