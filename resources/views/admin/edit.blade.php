@extends('layouts.default')

@section('content')
    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Editar produto</h1>
            </div>
            <form enctype="multipart/form-data" action="{{route('admin.products.update', $product->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                    <div class="flex flex-wrap -m-2">
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">Nome do Produto</label>
                                <input value="{{$product->name}}" type="text" id="name" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="price" class="leading-7 text-sm text-gray-600">Preço</label>
                                <input value="{{$product->price}}" type="text" id="price" name="price" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="stock" class="leading-7 text-sm text-gray-600">Estoque</label>
                                <input value="{{$product->stock}}"  type="text" id="stock" name="stock" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="cover" class="leading-7 text-sm text-gray-600">Imagem de capa</label>
                                <input type="file" id="cover" name="cover" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        @if($product->cover)
                            <div class="p-2 w-full rounded">
                                <div class="relative">
                                    <img src="{{ Storage::url($product->cover) }}" alt="{{ $product->name }}">
                                </div>
                                <a href="{{ route('admin.products.image.delete', $product->id) }}" class="text-red-500">Remover imagem</a>
                            </div>
                        @endif
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="description" class="leading-7 text-sm text-gray-600">Descrição</label>
                                <textarea id="description" name="description" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{$product->description}}</textarea>
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <button type="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Editar</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>

    </section>
@endsection
