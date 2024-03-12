@extends("theme.$theme.layout")
@section('creado_por')
   Flete
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/flete/crear.js")}}" type="text/javascript"></script>
<script> 
function buscar(){
    var opcion = document.getElementById('placas_trucks').value;
    alert(opcion);
} 
</script>
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
                    <a href="{{route('flete')}}" class="btn bg-navy btn-sm">
                        <i class="fa fa-fw fa-reply-all"></i> Volver al listado
                    </a>
                </div>
            </div>
            <form action="{{route('flete.guardar')}}" id="form-general" class="form-horizontal form--label-right" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="card-body">                                            
                    <div class="form-group row">
                        <label for="gondola_id" class="col-lg-3 col-form-label requerido">Gondola</label>
                        <div class="col-lg-8">
                            <select name="gondola_id" id="gondola_id" class="form-control"  required>
                                <option value="">Seleccione la placa</option>
                                @foreach($gondolas as $id => $gondola)
                                    <option value="{{$id}}">{{$gondola}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="cliente" class="col-lg-3 col-form-label requerido">Cliente</label>
                        <div class="col-lg-8">
                        <input type="text" name="cliente" id="cliente" class="form-control" value="{{old('cliente'), $gondola->cliente ?? ''}}" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="material" class="col-lg-3 col-form-label requerido">Material</label>
                        <div class="col-lg-8">
                        <input type="text" name="material" id="material" class="form-control" value="{{old('material'), $gondola->material ?? ''}}" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="notas" class="col-lg-3 col-form-label requerido">Notas</label>
                        <div class="col-lg-8">
                        <input type="text" name="notas" id="notas" class="form-control" value="{{old('notas'), $gondola->notas ?? ''}}" />
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label for="mt3" class="col-lg-3 col-form-label requerido">MT3</label>
                        <div class="col-lg-8">
                        <input type="text" name="mt3" id="mt3" class="form-control" value="20"  readonly  required/>
                        </div>
                    </div> --}}


                    <div class="form-group row">
                        <label for="origen" class="col-lg-3 col-form-label requerido" >Origen</label>
                        <div  class="col-lg-8">
                            <input type="text" name="origen" id="origen" class="form-control" value="{{old('origen'), $gondola->origen ?? ''}}"  required/>
                        </div>
                    </div>

                   

                    <div class="form-group row">
                        <label for="destino" class="col-lg-3 col-form-label requerido" >Destino</label>
                        <div  class="col-lg-8">
                            <input type="text" name="destino" id="destino" class="form-control" value="{{old('destino'), $gondola->destino ?? ''}}"  required/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mina" class="col-lg-3 col-form-label requerido" >Mina</label>
                        <div  class="col-lg-8">
                            <input type="text" name="mina" id="mina" class="form-control" value="{{old('mina'), $gondola->mina ?? ''}}"  required/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="km" class="col-lg-3 col-form-label requerido" >KM</label>
                        <div  class="col-lg-8">
                            <input type="number" id="km" name="km" class="form-control" value="{{old('km'), $gondola->km ?? ''}}"  min="0" max="100"  required/>
                        </div>
                    </div>

                    
                    
                    <div class="form-group row">
                        <label for="fecha_salida" class="col-lg-3 col-form-label requerido">Fecha de Salida</label>
                        <div class="col-lg-8">
                        <input type="text" name="fecha_salida" id="fecha_salida" class="form-control" value="{{old('fecha_salida', date('Y-m-d'))}}"  readonly  required/>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="hora_salida" class="col-lg-3 col-form-label requerido">Hora de Salida</label>
                        <div class="col-lg-8">
                        <input type="time" name="hora_salida" id="hora_salida" class="form-control" tz="Indian/Chagos" value="<?php date_default_timezone_set('America/Mexico_City'); echo(date('H:i:s') );?>" readonly  required/> 
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="fecha_pago" class="col-lg-3 col-form-label requerido">Fecha de pago</label>
                        <div class="col-lg-8">
                        <input type="text" name="fecha_pago" id="fecha_pago" class="form-control" value="{{old('fecha_salida', date('Y-m-d'))}}"  readonly  required/>
                    </div>
                    </div>

                    <div class="form-group row">
                        <label for="creado_por" class="col-lg-3 col-form-label requerido" >Creado por</label>
                        <div class="col-lg-8">
                        <input type="text" name="creado_por" id="creado_por" class="form-control" value="{{session()->get('nombre_usuario')}}" readonly  required/>
                        </div>
                    </div>

                    {{-- <div class="form-group row">
                        <label for="fecha_llegada" class="col-lg-3 col-form-label requerido">Fecha de llegada</label>
                        <div class="col-lg-8">
                        <input type="text" name="fecha_llegada" id="fecha_salida" class="form-control" value="{{old('fecha_salida', date('Y-m-d'))}}"  readonly  required/>
                        </div>
                    </div> --}}


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
