@extends('adminlte::page')

@section('content_header')
    <h1><b>Personal administrativo/Registro de un nuevo administrativo</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Lleno los datos del formulario</h3>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{url('admin/administrativos/create')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Nombre del rol</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                                        </div>
                                        <select name="rol" id="" class="form-control">
                                            <option value="">Seleccione un rol...</option>
                                            @foreach($roles as $rol)
                                                <option value="{{$rol->name}}">{{$rol->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    @error('rol')
                                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Nombres -->

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nombre">Nombres</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombres" value="{{old('nombre')}}">
                                    </div>
                                    @error('nombre')
                                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Apellidos -->

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="apellido">Apellidos</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                                        </div>
                                        <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Apellidos" value="{{old('apellido')}}">
                                    </div>
                                    @error('apellido')
                                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Carnet Identidad -->

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="ci">Carnet Identidad</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-id-card"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="ci" class="form-control" id="ci" placeholder="Carnet Identidad" value="{{old('ci')}}">
                                    </div>
                                    @error('ci')
                                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            

                            <!-- Fecha de Nacimiento -->
                                
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Fecha de Nacimiento</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento" placeholder="Fecha de Nacimiento" value="{{old('fecha_nacimiento')}}">
                                    </div>
                                    @error('fecha_nacimiento')
                                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Telefono -->
                                
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="telefono">Telefono</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Telefono" value="{{old('telefono')}}">
                                    </div>
                                    @error('telefono')
                                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email -->
                                
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="email">Email</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{old('email')}}">
                                    </div>
                                    @error('email')
                                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Profesion -->
                                
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="profesion">Profesion</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                        </div>
                                        <input type="text" name="profesion" class="form-control" id="profesion" placeholder="Profesion" value="{{old('profesion')}}">
                                    </div>
                                    @error('profesion')
                                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Direccion -->
                                
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="direccion">Direccion</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                        </div>
                                        <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Direccion" value="{{old('direccion')}}">
                                    </div>
                                    @error('direccion')
                                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div> <!-- Cierre del div class="row" que falta -->
                            
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{url('/admin/administrativos')}}" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-primary">Registrar</button>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
