@extends('layouts.app')

@section('titulo')
    Inicia Sesion en Clopri
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
    <div class="md:w-4/12 p-5">
        <img src="{{ asset('img/login.jpg') }}" alt="Imagen
        Login de usuarios"> 
    </div>

    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
        <form method="POST" action="{{ route('login')}}" novalidate>
            @csrf

            @if (session('mensaje'))
                
            @endif
           

            <div class="mb-5">
                <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                    Correo Electronico
                </label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    placeholder="Tu Correo Electronico de Registro"
                    class="border p-3 w-full rounded-lg"
                />
                @error('email')
                <p class="bg-red-500 text white my-2 rounded-lg text-sm p-2 
                text-center">{{ $message('mensaje') }}</p>
                    
                @enderror

            </div>
            <div class="mb-5">
                <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                    Contraseña
                </label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    placeholder="Contraseña de Registro"
                    class="border p-3 w-full rounded-lg"
                />
                @error('password')
                <p class="bg-red-500 text white my-2 rounded-lg text-sm p-2 
                text-center">{{ $message }}</p>
                    
                @enderror

            </div>

            <div class="mb-5">
                <input type="checkbox" name="remember"> <label 
                class="mb-2 block  text-gray-500 text-sm">mantener mi sesion abierta</label>
            </div>

            <input
                type="submit"
                value="Iniciar Sesion"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                uppercase font-bold w-full p-3 text-white rounded-lg"
            />
        </form>
    </div>

    </div>
@endsection