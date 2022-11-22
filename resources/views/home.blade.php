@extends('layouts.default')

@section('content')
    <section class="text-gray-600 body-font">
        <div class="container px-5 mx-auto">

            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                <form action="{{route('home')}}" method="GET">
                    <div class="flex mb-2 space-x-2">
                        <label for="search"></label>
                        <input value="{{ request()->search }}" type="text" name="search" id="search" class="w-full bg-gray-100 rounded border border-gray-400 focus:outline-none focus:border-purple-500 text-base px-4 py-2" placeholder="Pesquisar...">
                        <button type="submit" class="flex ml-auto text-white bg-purple-500 border-0 py-2 px-6 focus:outline-none hover:bg-purple-600 rounded">Pesquisar</button>

                        <a href="{{route('home')}}" class="flex ml-auto text-purple-500 border-0 py-2 px-6 font-bold">Limpar</a>
                    </div>
                </form>
            </div>
        </div>

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4">
                @foreach($products as $product)
                    <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                        <a class="block relative h-48 rounded overflow-hidden">
                            <img alt="ecommerce" class="object-cover object-center w-full h-full block"
                                 src="{{$product->cover}}}">
                        </a>
                        <div class="mt-4">

                            <h2 class="text-gray-900 title-font text-lg font-medium">{{ $product->name }}</h2>
                            <p class="mt-1">${{ $product->price }}</p>
                        </div>

                        {{-- ver mais link --}}
                        <a href="{{ route('product', $product->id ) }}"  class="text-indigo-500 inline-flex items-center mt-3">Ver mais
                            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

