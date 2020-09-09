@extends('layout')
@section('contenido')
<div class="row">
    <div class="title_left" style="padding-left: 10px">
        <h3>Tu lista de ordenes</h3>
    </div>
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            @if (session('status'))
                <div id="alert" class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
          
            <div class="x_content">
            {{-- <a href="{{ route('productos.crear')}}" class="btn btn-primary btn-sm" style="margin-left: 10px"> <i class="fa fa-plus"></i> Agregar producto</a> --}}
                <div class="row">
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align"  for="first-name">Buscar ordenes por fecha <span class="required">*</span>
                        </label>
                        <form action="{{route('home')}}" method="GET" style="width: 100%">
                            <div class="col-md-7 col-sm-7 ">
                            <input type="date" name="fecha" value="{{$fecha}}"  required="required" class="form-control ">
                            </div>
                            <div class="col-md-2 col-sm-2 ">
                                <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-12">
                        
                        <div class="card-box table-responsive">
                                            
                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Nro</th>
                                    <th># Pedido</th>
                                    <th>Cliente</th>
                                    <th>Dirección</th>
                                    <th>Fecha</th>
                                    <th>Costo</th>
                                    <th style="width: 50px">Opciones</th>
                                    
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($pedidos as $item)
                                <tr>
                                <td>{{$loop->iteration}}</td>
                                    <td>{{$item->idpedido}}</td>
                                    <td>{{$item->nombre}} {{$item->apellido}}</td>
                                    <td>{{$item->direccion}}</td>
                                    <td>{{$item->fecha_enviado}}</td>
                                    <td>$ {{$item->subtotal}}</td>
                               
                                    <td>
                                    <a href="{{route('detalle', $item->nropedido)}}">Detalles</a>
                                        {{-- <a href={{route('productos.eliminar',$item->IDPRODUCTO)}}> <i style="color: red" class="glyphicon glyphicon-remove"></i> </a> --}}
                                    </td>
                                    
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</div>
@endsection