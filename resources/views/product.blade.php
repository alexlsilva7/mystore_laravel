@extends('layouts.default')
@section('content')

    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
                <img alt="{{ $product->name }}" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded"
                     src="{{ Storage::url($product->cover) }}">
                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">

                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $product->name }}</h1>
                    <div class="flex mb-4">

                    </div>
                    <p class="leading-relaxed">{{ $product->description }}</p>

                    {{-- if stock >0 show Em estoque--}}
                    @if($product->stock)
                        <div class="my-3">
                            <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-indigo-800 bg-indigo-100 rounded-full">Em estoque</span>
                        </div>
                    @endif

                    <div class="flex">
                        <span class="title-font font-medium text-2xl text-gray-900">${{ $product->price }}</span>
                        <button class="flex ml-auto text-white bg-purple-500 border-0 py-2 px-6 focus:outline-none hover:bg-purple-600 rounded">Comprar</button>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
