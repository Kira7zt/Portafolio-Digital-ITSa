@extends('adminlte::page')

@section('content_header')
    <h1><b>Materias/Editar Materia</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Editar Materia</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/materias/' . $materia->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- CARRERA --}}
                        <div class="form-group">
                            <label for="carrera_id">Nombre de la carrera</label><b> (*)</b>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-graduation-cap"></i>
                                    </span>
                                </div>
                                <select class="form-control" name="carrera_id" required>
                                    <option value="">Seleccione una Carrera</option>
                                    @foreach($carreras as $carrera)
                                        <option value="{{ $carrera->id }}"
                                            {{ old('carrera_id', $materia->carrera_id) == $carrera->id ? 'selected' : '' }}>
                                            {{ $carrera->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('carrera_id')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- DOCENTE --}}
                        <div class="form-group">
                            <label for="docente_id">Docente que dicta la materia</label><b> (*)</b>
                            <select name="docente_id" id="docente_id" class="form-control" required>
                                <option value="">Seleccione un docente</option>
                                @foreach($docentes as $docente)
                                    <option value="{{ $docente->id }}"
                                        {{ old('docente_id', $materia->docente_id) == $docente->id ? 'selected' : '' }}>
                                        {{ $docente->nombre }} {{ $docente->apellido }}
                                    </option>
                                @endforeach
                            </select>
                            @error('docente_id')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- NOMBRE DE LA MATERIA --}}
                        <div class="form-group">
                            <label for="nombre">Nombre de la Materia<b>(*)</b></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-book"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="nombre"
                                    value="{{ old('nombre', $materia->nombre) }}"
                                    placeholder="Escriba el nombre de la materia..." required>
                            </div>  
                            @error('nombre')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- CÓDIGO DE LA MATERIA --}}
                        <div class="form-group">
                            <label for="codigo">Código de la Materia<b>(*)</b></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-barcode"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="codigo"
                                    value="{{ old('codigo', $materia->codigo) }}"
                                    placeholder="Escriba el código de la materia..." required>
                            </div>
                            @error('codigo')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- AÑO / SEMESTRE --}}
                        <div class="form-group">
                            <label for="anio">Año al que pertenece la materia</label><b>(*)</b>
                            <select name="anio" id="anio" class="form-control" required>
                                <option value="">Seleccione una opción...</option>
                                <option value="1er Año" {{ $materia->anio == '1er Año' ? 'selected' : '' }}>1er Año</option>
                                <option value="2do Año" {{ $materia->anio == '2do Año' ? 'selected' : '' }}>2do Año</option>
                                <option value="3er Año" {{ $materia->anio == '3er Año' ? 'selected' : '' }}>3er Año</option>
                                <option value="1er Semestre" {{ $materia->anio == '1er Semestre' ? 'selected' : '' }}>1er Semestre</option>
                                <option value="2do Semestre" {{ $materia->anio == '2do Semestre' ? 'selected' : '' }}>2do Semestre</option>
                                <option value="3er Semestre" {{ $materia->anio == '3er Semestre' ? 'selected' : '' }}>3er Semestre</option>
                                <option value="4to Semestre" {{ $materia->anio == '4to Semestre' ? 'selected' : '' }}>4to Semestre</option>
                                <option value="5to Semestre" {{ $materia->anio == '5to Semestre' ? 'selected' : '' }}>5to Semestre</option>
                                <option value="6to Semestre" {{ $materia->anio == '6to Semestre' ? 'selected' : '' }}>6to Semestre</option>
                            </select>
                            @error('anio')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- BOTONES --}}
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ url('/admin/materias') }}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-success">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
