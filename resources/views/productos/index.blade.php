@extends('layout')
@section('contenido')
<div class="row">
    <div class="title_left" style="padding-left: 10px">
        <h3>Tus productos</h3>
    </div>
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            @if (session('status'))
                <div id="alert" class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
          
            <div class="x_content">
            <a href="{{ route('productos.crear')}}" class="btn btn-primary btn-sm" style="margin-left: 10px"> <i class="fa fa-plus"></i> Agregar producto</a>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                
                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Nro</th>
                                    {{-- <th># Pedido</th> --}}
                                    <th>Producto</th>
                                    <th>Especialidad</th>
                                    <th>Categoria</th>
                                    <th>Costo</th>
                                    <th>Descripcion</th>
                                    <th>Estado</th>
                                    <th>Foto</th>
                                    <th style="width: 30px">Opc.</th>
                                    
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($productos as $item)
                                <tr>
                                <td>{{$loop->iteration}}</td>
                                    <td>{{$item->nombre}}</td>
                                    <td>{{$item->especialidad}}</td>
                                    <td>{{$item->categoria}}</td>
                                    <td>$ {{$item->costo}}</td>
                                    <td>{{$item->referencia}}</td>
                                    
                                    <td>
                                        {{-- @if ($item->estado == 'S') --}}
                                        <span class="badge badge-success">Activo</span>
                                        {{-- @endif --}}
                                    </td> 
                                    
                                    {{-- @if ($item->estado == 'N')
                                    <td><span class="badge badge-danger">inactivo</span></td> 
                                    @endif --}}
                                <td><img src="{{$item->foto}}" alt="" style="width: 100px; height: 100px; object-fit: cover"></td>
                               
                                    <td>
                                        <a href="{{route('productos.editar', $item->idproducto)}}"><i style="color: rgb(3, 142, 255)" class="fa fa-edit"></i></a>
                                    <a href="{{route('productos.eliminar', $item->idproducto)}}"> <i style="color: red" class="glyphicon glyphicon-remove"></i> </a>
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