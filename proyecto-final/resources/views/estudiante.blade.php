@extends('template')


@section('content')
    <body>
        <div class="contenedor">
            <section id="formulario_de_asistencia">
                <form action="{{ route('guardarEstudiante') }}" method="POST" name="formDatosPersonales" id="formulario"
                    class="formulario" id="formulario">
                    @csrf

                    <h5>Genera tu QR de asistencia</h5>
                    <label for="identi">
                        <span>ID</span>
                        <input type="num" name="identi" id="identi" required>
                    </label>
                    <label for="nombre">
                        <span>Nombre</span>
                        <input type="text" name="nombre" id="nombre" autocomplete="name" required>
                    </label>
                    <label for="apellido">
                        <span>Apellido</span>
                        <input type="text" name="apellido" id="apellido" autocomplete="name" required>
                    </label>
                    <label for="correo">
                        <span>Email</span>
                        <input type="email" name="correo" id="email"autocomplete="email" required>
                    </label>
                    <label for="celular">
                        <span>Celular</span>
                        <input type="tel" name="celular" id="celular" required>
                    </label>
                    <label for="materia">
                        <span>Materia</span>
                        <input type="text" name="materia" id="materia" required>
                    </label>
                    <input type="submit" name="enviar" value="enviar" />
                    <!--este input type="submit" nos sirve para realizar el envio del formulario-->
                </form>
            </section>
            <div id="contenedorQR">
            </div>
        </div>
        <section id="Formas">
            <div class="rectangulo-5"></div>
            <div class="rectangulo-6"></div>
        </section>
    </body>
@endsection
