@extends('template')

@section('content')
    <header >
    </header>
    <main class="home-container">
        <div class="home-bottones">
            <h6>Registra tu asistencia</h6>
            <section >
                <a href="{{ route('estudiante') }}"><button id="seleccion-1" class="text-sm">Estudiantes</button></a>
            </section>
            <br>
            <section>
                @auth
                    <a href=" {{ route('dashboard') }} "><button id="seleccion-2" class="text-sm" >administrador</button></a>
                @else
                    <a href=" {{ route('login') }} "><button id="seleccion-2" class="text-sm">administrador</button></a>
                @endauth
            </section>
        </div> 
       <section id="Formas">
        <div class="bloque"></div>
        <div class="rectangulo-1"></div>
        <div class="rectangulo-2"></div>
        </section>
        <section class="imagen">
            <a href="{{ route('home') }}" id="principal" >
               <img src="{{asset('imag/principal.png')}} " alt="">
           </a>
       </section>
    </main>
@endsection
