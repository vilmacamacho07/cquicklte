@extends("theme.$theme.layout")
@section('titulo')
Fletes
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/flete/index.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/flete/imprimir.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @csrf
        @include('includes.mensaje')
        <div class="card ">
            <div class="card-header bg-lightblue">
                <h3 class="card-title">Fletes</h3>
                <div class="card-tools">
                    <a href="{{route('flete.crear')}}" class="btn bg-navy btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Crear Flete
                    </a>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-bordered table-hover" id="tabla-data">
                    <thead>
                        <tr>
                            <th>ID Flete</th>
                            <th>#Placas</th>
                            <th>MT3</th>
                            <th>Origen</th>
                            <th>Destino</th>
                            <th>KM</th>
                            <th>Fecha Salida</th>
                            <th>Hora Salida</th>
                            {{-- <th>Fecha Pago</th> --}}
                            
                            <th>Fecha Llegada</th>
                            <th>Hora Llegada</th>
                            <th>Status</th>
                            {{-- <th>Creado Por</th> --}}
                            {{-- <th>Status Gondola</th> --}}
                            <th class="width80"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fletes as $gondola)
                        <tr>
                            <td>{{$gondola->id}}</td>
                           
                            <td><a href="{{route('ver_gondola', $gondola->gondola)}}" class="ver-gondola">{{$gondola->gondola->placas_truck}}</a></td>
                            
                            {{-- <td>{{$gondola->gondola->mt3}}</td> --}}
                            <td>{{$gondola->gondola->mt3}}</td>
                            <td>{{$gondola->origen}}</td>
                            <td>{{$gondola->destino}}</td>
                            <td>{{$gondola->km}}</td>
                            <td>{{$gondola->fecha_salida}}</td>
                            <td>{{$gondola->hora_salida}}</td>
                            {{-- <td>{{$gondola->fecha_pago}}</td> --}}
                            {{-- <td class="flete-llegada">{{$gondola->fecha_llegada}}</td>  --}}
                            <td class="fecha-llegada">{{$gondola->fecha_llegada ?? '-'}}</td>
                            <td class="fecha-llegada">{{$gondola->hora_llegada ?? '-'}}</td>
                            <td class="status">{{$gondola->status}}</td>
                            
                            {{-- <td>{{$gondola->hora_llegada}}</td> --}}
                            
                            {{-- <td>{{$gondola->usuario->nombre}}</td> --}}
                            {{-- <td class="status">{{$gondola->gondola->status ?? 'En Ruta'}}</td> --}}
                           
                            <td>
                                @if(!$gondola->fecha_llegada)
                                    <a href="{{route('flete.finalizar', $gondola->gondola->id)}}" class="flete_llegada btn-accion-tabla tooltipsC" title="Finalizar este flete">
                                        <i class="fa fa-fw fa-reply-all"></i>
                                    </a>
                                @endif
                               
                            </td>
                            <td>
                                <a href="{{route('flete.mostrar',['id' =>$gondola->id,'gondolaid' =>$gondola->gondola->id])}}"  title="Mostrar ticket" >
                                    <i class="fas fa-print"></i>
                                    </i>
                               
                            </td>

                            <td class="imprimir">
                                <a href="#" class="imprimir " title="Imprimir ticket" >
                                <i class="fas fa-print"></i>
                                </i>
                            </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
