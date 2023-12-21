@extends('layouts.tienda')


@section('content')

{{-- <livewire:search-products />  --}}

@livewire('search-products');

@php
$pagina = \App\Models\Pagina::where('path', '=', request()->path())->first();
@endphp

<div class="container mx-auto px-6">
    {{-- <div class="h-64 rounded-md overflow-hidden bg-cover bg-center" style="background-image: url('https://storage.googleapis.com/pai-images/f32005137aa9468e9cb5509162b8e2cf.jpeg')">
        <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
            <div class="px-10 max-w-xl">
                <h2 class="text-2xl text-white font-semibold">Ciencia Ficción</h2>
                <p class="mt-2 text-gray-400">
                    Explora mundos futuristas con nuestra selección de Ciencia Ficción. Sumérgete en historias llenas de tecnología avanzada, viajes espaciales y aventuras que desafían la realidad. 
                </p>
                <button class="flex items-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                    <span>Ver cátalogo</span>
                    <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </button>
            </div>
        </div>
    </div>

    <div class="md:flex mt-8 md:-mx-4">
        <div class="w-full h-64 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:w-1/2" style="background-image: url('https://storage.googleapis.com/pai-images/b89f4cb24fd348729bc009ca8cade83a.jpeg')">
            <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                <div class="px-10 max-w-xl">
                    <h2 class="text-2xl text-white font-semibold">Aventura</h2>
                    <p class="mt-2 text-gray-400">
                        Embarcate en una emocionante aventura llena de desafíos y descubrimientos. 
                    </p>
                    <button class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                        <span>Ver cátalogo</span>
                        <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="w-full h-64 mt-8 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:mt-0 md:w-1/2" style="background-image: url('https://storage.googleapis.com/pai-images/59d81a6eb1cb4bb9ad7aecd8c58856df.jpeg')">
            <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                <div class="px-10 max-w-xl">
                    <h2 class="text-2xl text-white font-semibold">Horror</h2>
                    <p class="mt-2 text-gray-400">
                        Sumérgete en un escalofriante mundo de horror, donde lo insondable acecha en las sombras.
                    </p>
                    <button class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                        <span>Ver cátalogo</span>
                        <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </button>
                </div>
            </div>
        </div>
    </div> --}}


    @foreach ($generos as $genero)
    <div class="mt-16">
      <h3 class="text-gray-600 dark:text-gray-200 text-2xl font-medium">{{$genero->nombre}}</h3>
      <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
        @foreach ($genero->productos as $producto)
        <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
          <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('{{$producto->imagen}}')">
              {{-- ADICIONAR AL CARRITO --}}
            <button.
                onclick="addToCart({{ $producto->id }}, '{{ $producto->titulo }}', '{{ $producto->autor }}', {{ $producto->precio }}, '{{ $producto->imagen }}', {{ $producto->promocion->descuento }})"

              class="cursor-pointer p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                  <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
              </button>
          </div>
          <div class="px-5 py-3">
              <h3 class="text-gray-700 dark:text-gray-300"> {{ $producto->titulo }} </h3>
              <span class="text-gray-500 dark:text-gray-200 mt-2">Precio: {{$producto->precio }} Bs</span>
              <br>
              <span class="text-gray-500 dark:text-gray-200 mt-2">Stock: {{$producto->stock }}</span>
              <br>
              <span class="text-gray-500 dark:text-gray-200 mt-2">Descuento: {{$producto->promocion->descuento }} %</span>
          </div>

        </div>
        @endforeach
      </div>
    </div>                
    @endforeach

<footer class="mt-10">
    <h3 class="text-gray-600 dark:text-gray-200 text-xl font-medium">Visitas: {{ $pagina->visitas }}</h3>
</footer>

</div>


@endsection
