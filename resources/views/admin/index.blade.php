@extends('adminlte::page')

@section('content_header')
    <h1>Dashboard</h1>
    <hr>
@stop

@section('content')

    {{-- NUEVA SECCIÓN: PORTAFOLIO DOCENTE --}}
    <div class="row mt-4">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-folder-open"></i> PORTAFOLIO DOCENTE - GESTIÓN {{ date('Y') }}
                    </h3>
                    <div class="card-tools">
                        <span class="badge badge-secondary">Instrumento de evaluación pedagógica</span>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Información General del Docente -->
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="info-box bg-info">
                                <span class="info-box-icon"><i class="fas fa-user-graduate"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Usuario Activo</span>
                                    <span class="info-box-number">{{ Auth::user()->name ?? 'Mgr. [Nombre]' }}</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: {{ $porcentaje_completado ?? 65 }}%"></div>
                                    </div>
                                    <span class="progress-description">
                                        {{ $porcentaje_completado ?? 65 }}% Completado
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-success"><i class="fas fa-check"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Completos</span>
                                            <span class="info-box-number">{{ $documentos_completos ?? 10 }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-warning"><i class="fas fa-clock"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Pendientes</span>
                                            <span class="info-box-number">{{ $documentos_pendientes ?? 3 }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-primary"><i class="fas fa-folder"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Total</span>
                                            <span class="info-box-number">{{ $total_documentos ?? 16 }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-secondary"><i class="fas fa-calendar"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Turno</span>
                                            <span class="info-box-number">Noche</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Grid de Secciones del Portafolio usando AdminLTE Cards -->
                    <div class="row">
                        <!-- Sección 1: Calendario Académico -->
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h4><i class="fas fa-calendar-alt"></i></h4>
                                    <p>Calendario Académico</p>
                                    <small>Inauguración: 03/02/2024</small>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <a href="{{ route('portafolio.seccion', ['seccion' => 'calendario']) }}" class="small-box-footer">
                                    Ver detalles <i class="fas fa-arrow-circle-right"></i>
                                </a>
                                <div class="ribbon-wrapper ribbon-sm">
                                    <div class="ribbon bg-success text-sm">Completo</div>
                                </div>
                            </div>
                        </div>

                        <!-- Sección 2: Horario -->
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h4><i class="fas fa-clock"></i></h4>
                                    <p>Horario Docente</p>
                                    <small>Régimen Anual y Semestral</small>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <a href="{{ route('portafolio.seccion', ['seccion' => 'horario']) }}" class="small-box-footer">
                                    Ver detalles <i class="fas fa-arrow-circle-right"></i>
                                </a>
                                <div class="ribbon-wrapper ribbon-sm">
                                    <div class="ribbon bg-success text-sm">Completo</div>
                                </div>
                            </div>
                        </div>

                        <!-- Sección 3: Plan Global -->
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h4><i class="fas fa-tasks"></i></h4>
                                    <p>Plan Global</p>
                                    <small>DPW-207 ✓ DPW-307 ✓</small>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-tasks"></i>
                                </div>
                                <a href="{{ route('portafolio.seccion', ['seccion' => 'plan-global']) }}" class="small-box-footer">
                                    Ver detalles <i class="fas fa-arrow-circle-right"></i>
                                </a>
                                <div class="ribbon-wrapper ribbon-sm">
                                    <div class="ribbon bg-warning text-sm">Parcial</div>
                                </div>
                            </div>
                        </div>

                        <!-- Sección 4: Planificación Semanal -->
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h4><i class="fas fa-calendar-week"></i></h4>
                                    <p>Planificación Semanal</p>
                                    <small>Avance bimestral</small>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-calendar-week"></i>
                                </div>
                                <a href="{{ route('portafolio.seccion', ['seccion' => 'planificacion-semanal']) }}" class="small-box-footer">
                                    Ver detalles <i class="fas fa-arrow-circle-right"></i>
                                </a>
                                <div class="ribbon-wrapper ribbon-sm">
                                    <div class="ribbon bg-success text-sm">Completo</div>
                                </div>
                            </div>
                        </div>

                        <!-- Sección 5: Registro Pedagógico -->
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h4><i class="fas fa-book"></i></h4>
                                    <p>Registro Pedagógico</p>
                                    <small>30% Teórico, 70% Práctico</small>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-book"></i>
                                </div>
                                <a href="{{ route('portafolio.seccion', ['seccion' => 'registro-pedagogico']) }}" class="small-box-footer">
                                    Ver detalles <i class="fas fa-arrow-circle-right"></i>
                                </a>
                                <div class="ribbon-wrapper ribbon-sm">
                                    <div class="ribbon bg-success text-sm">Completo</div>
                                </div>
                            </div>
                        </div>

                        <!-- Sección 6: Evaluación Diagnóstica -->
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="small-box bg-secondary">
                                <div class="inner">
                                    <h4><i class="fas fa-stethoscope"></i></h4>
                                    <p>Evaluación Diagnóstica</p>
                                    <small>Aplicar según horario</small>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-stethoscope"></i>
                                </div>
                                <a href="{{ route('portafolio.seccion', ['seccion' => 'evaluacion-diagnostica']) }}" class="small-box-footer">
                                    Ver detalles <i class="fas fa-arrow-circle-right"></i>
                                </a>
                                <div class="ribbon-wrapper ribbon-sm">
                                    <div class="ribbon bg-danger text-sm">Pendiente</div>
                                </div>
                            </div>
                        </div>

                        <!-- Sección 7: Instrumentos de Evaluación -->
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="card card-outline card-purple">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-clipboard-list"></i> Instrumentos Evaluación
                                    </h3>
                                    <span class="badge badge-warning float-right">2/4 Bimestres</span>
                                </div>
                                <div class="card-body p-2">
                                    <div class="row text-center">
                                        <div class="col-3"><span class="badge badge-success">1er ✓</span></div>
                                        <div class="col-3"><span class="badge badge-success">2do ✓</span></div>
                                        <div class="col-3"><span class="badge badge-secondary">3er ⏳</span></div>
                                        <div class="col-3"><span class="badge badge-secondary">4to ⏳</span></div>
                                    </div>
                                </div>
                                <div class="card-footer p-1">
                                    <a href="{{ route('portafolio.seccion', ['seccion' => 'instrumentos-evaluacion']) }}" 
                                       class="btn btn-outline-purple btn-sm btn-block">Ver Detalles</a>
                                </div>
                            </div>
                        </div>

                        <!-- Sección 8: Proceso de Nivelación -->
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="small-box bg-gray">
                                <div class="inner">
                                    <h4><i class="fas fa-level-up-alt"></i></h4>
                                    <p>Nivelación</p>
                                    <small>Instrumentos empleados</small>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-level-up-alt"></i>
                                </div>
                                <a href="{{ route('portafolio.seccion', ['seccion' => 'nivelacion']) }}" class="small-box-footer">
                                    Ver detalles <i class="fas fa-arrow-circle-right"></i>
                                </a>
                                <div class="ribbon-wrapper ribbon-sm">
                                    <div class="ribbon bg-success text-sm">Completo</div>
                                </div>
                            </div>
                        </div>

                        <!-- Sección 9: Informe Bimestral -->
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h4><i class="fas fa-file-alt"></i></h4>
                                    <p>Informe Bimestral</p>
                                    <small>Temas y contenidos</small>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <a href="{{ route('portafolio.seccion', ['seccion' => 'informe-bimestral']) }}" class="small-box-footer">
                                    Ver detalles <i class="fas fa-arrow-circle-right"></i>
                                </a>
                                <div class="ribbon-wrapper ribbon-sm">
                                    <div class="ribbon bg-success text-sm">Completo</div>
                                </div>
                            </div>
                        </div>

                        <!-- Sección 10: Cronograma de Avance -->
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h4><i class="fas fa-chart-line"></i></h4>
                                    <p>Cronograma Avance</p>
                                    <small>Semanal - Planificado vs Realizado</small>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <a href="{{ route('portafolio.seccion', ['seccion' => 'cronograma-avance']) }}" class="small-box-footer">
                                    Ver detalles <i class="fas fa-arrow-circle-right"></i>
                                </a>
                                <div class="ribbon-wrapper ribbon-sm">
                                    <div class="ribbon bg-success text-sm">Completo</div>
                                </div>
                            </div>
                        </div>

                        <!-- Sección 11: Informe Docente -->
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h4><i class="fas fa-user-graduate"></i></h4>
                                    <p>Informe Docente</p>
                                    <small>Al concluir gestión/semestre</small>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                                <a href="{{ route('portafolio.seccion', ['seccion' => 'informe-docente']) }}" class="small-box-footer">
                                    Ver detalles <i class="fas fa-arrow-circle-right"></i>
                                </a>
                                <div class="ribbon-wrapper ribbon-sm">
                                    <div class="ribbon bg-danger text-sm">Pendiente</div>
                                </div>
                            </div>
                        </div>

                        <!-- Sección 12: Tutorías -->
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h4><i class="fas fa-chalkboard-teacher"></i></h4>
                                    <p>Tutorías</p>
                                    <small>RM 0487/2023 - Modalidades graduación</small>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                </div>
                                <a href="{{ route('portafolio.seccion', ['seccion' => 'tutorias']) }}" class="small-box-footer">
                                    Ver detalles <i class="fas fa-arrow-circle-right"></i>
                                </a>
                                <div class="ribbon-wrapper ribbon-sm">
                                    <div class="ribbon bg-warning text-sm">En progreso</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Acciones Rápidas usando AdminLTE Cards -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-tools"></i> Acciones Rápidas
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <button class="btn btn-primary btn-block" onclick="editarPortafolio()">
                                                <i class="fas fa-edit"></i> Editar Portafolio
                                            </button>
                                        </div>
                                        <div class="col-md-3">
                                            <button class="btn btn-success btn-block" onclick="exportarPDF()">
                                                <i class="fas fa-download"></i> Exportar PDF
                                            </button>
                                        </div>
                                        <div class="col-md-3">
                                            <button class="btn btn-info btn-block" onclick="window.print()">
                                                <i class="fas fa-print"></i> Imprimir
                                            </button>
                                        </div>
                                        <div class="col-md-3">
                                            <button class="btn btn-warning btn-block" onclick="validarCompletitud()">
                                                <i class="fas fa-check-circle"></i> Validar Completitud
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer con normativa usando AdminLTE Alert -->
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-info alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-info"></i> Base Normativa</h5>
                                En cumplimiento a R.M. 01/2025 "Normas Generales para la Gestión Educativa Gestión 2025, del Subsistema de Educación Superior de Formación Profesional - Técnica, Tecnológica y Artística", 
                                Artículo 26 (Estándares de calidad educativa) - Norma ISO 21001.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <style>
        /* Estilos personalizados para el portafolio */
        .small-box {
            transition: all 0.3s ease;
        }
        
        .small-box:hover {
            transform: translateY(-2px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        
        .ribbon-wrapper .ribbon {
            font-size: 0.7rem;
        }
        
        .btn-outline-purple {
            border-color: #6f42c1;
            color: #6f42c1;
        }
        
        .btn-outline-purple:hover {
            background-color: #6f42c1;
            color: white;
        }
        
        .card-outline.card-purple {
            border-color: #6f42c1;
        }
        
        .card-outline.card-purple .card-header {
            background-color: transparent;
            border-bottom: 1px solid #6f42c1;
        }
    </style>
@stop

@section('js')
    <script> 
        console.log("Hi, I'm using the Laravel-AdminLTE package!"); 
        
        function editarPortafolio() {
            window.location.href = "{{ route('portafolio.edit') }}";
        }

        function exportarPDF() {
            alert('Generando PDF del portafolio...');
            // window.location.href = "{{ route('portafolio.export') }}";
        }

        function validarCompletitud() {
            alert('Validando completitud del portafolio...');
            // Aquí puedes hacer una petición AJAX
        }

        // Actualizar progreso cada 30 segundos
        setInterval(function() {
            console.log('Actualizando progreso del portafolio...');
            // fetch('/portafolio/progress').then(...)
        }, 30000);
    </script>
@stop