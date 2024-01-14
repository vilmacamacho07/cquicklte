@extends("theme.$theme.layout")
@section('prestado_a')
   Flete
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/libro-prestamo/crear.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('includes.mensaje')
        @include('includes.form-error')
        <div class="card ">
            <div class="card-header bg-olive">
                <h3 class="card-title">Crear Flete</h3>
                <div class="card-tools">
                    <a href="{{route('libro-prestamo')}}" class="btn bg-navy btn-sm">
                        <i class="fa fa-fw fa-reply-all"></i> Volver al listado
                    </a>
                </div>
            </div>
            <form action="{{route('libro-prestamo.guardar')}}" id="form-general" class="form-horizontal form--label-right" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label for="libro_id" class="col-lg-3 col-form-label requerido">Gondola</label>
                        <div class="col-lg-8">
                            <select name="libro_id" id="libro_id" class="form-control" required>
                                <option value="">Seleccione la placa</option>
                                @foreach($libros as $id => $libro)
                                    <option value="{{$id}}">{{$libro}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="prestado_a" class="col-lg-3 col-form-label requerido">Prestado a</label>
                        <div class="col-lg-8">
                        <input type="text" name="prestado_a" id="prestado_a" class="form-control" value="{{old('prestado_a')}}" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fecha_prestamo" class="col-lg-3 col-form-label requerido">Fecha de Salida</label>
                        <div class="col-lg-8">
                        <input type="text" name="fecha_prestamo" id="fecha_prestamo" class="form-control" value="{{old('fecha_prestamo', date('Y-m-d'))}}" required/>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            @include('includes.boton-form-crear')
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
