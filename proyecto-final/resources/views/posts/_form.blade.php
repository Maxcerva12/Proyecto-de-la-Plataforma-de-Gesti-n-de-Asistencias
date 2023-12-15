@csrf

<label class="uppercase text-gray-700 text-xs">ID</label>
<span class="text-xs text-red-600">@error('identi') {{$message}}@enderror</span>

<input type="text" name="identi" class="rounded border-gray-200 w-full mb-4" value="{{old('identi', $post->identi)}}">


<label class="uppercase text-gray-700 text-xs">Nombre</label>
<span class="text-xs text-red-600">@error('nombre') {{$message}}@enderror</span>

<input type="text" name="nombre" class="rounded border-gray-200 w-full mb-4" value="{{old('nombre', $post->nombre)}}">


<label class="uppercase text-gray-700 text-xs">Apellido</label>
<span class="text-xs text-red-600">@error('apellido') {{$message}}@enderror</span>

<input type="text" name="apellido" class="rounded border-gray-200 w-full mb-4" value="{{old('apellido', $post->apellido)}}">


<label class="uppercase text-gray-700 text-xs">Correo</label>
<span class="text-xs text-red-600">@error('correo') {{$message}}@enderror</span>

<input type="text" name="correo" class="rounded border-gray-200 w-full mb-4" value="{{old('correo', $post->correo)}}">


<label class="uppercase text-gray-700 text-xs">Celular</label>
<span class="text-xs text-red-600">@error('celular') {{$message}}@enderror</span>

<input type="text" name="celular" class="rounded border-gray-200 w-full mb-4" value="{{old('celular', $post->celular)}}">


<label class="uppercase text-gray-700 text-xs">Materia</label>
<span class="text-xs text-red-600">@error('materia') {{$message}}@enderror</span>

<input type="text" name="materia" class="rounded border-gray-200 w-full mb-4" value="{{old('materia', $post->materia)}}">


<div class="flex justify-between items-center">
    <a href="{{route('posts.index')}}" class="text-indigo-600">Volver</a>
    <input type="submit" value="Enviar" class="bg-gray-800 text-white rounded px-4 py-2">
</div>