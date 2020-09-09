@extends('layout')
@section('contenido')
<div class="row">
    <div class="title_left" style="padding-left: 10px">
        @foreach ($pedido as $item)
            <h3>Orden #{{$item->idpedido}}</h3>
        @endforeach
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
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <address>
                                @foreach ($pedido as $item)
                                <strong>{{$item->nombre}} {{$item->apellido}}</strong>
                                <br>{{$item->direction}}
                                <br>
                                @if ($item->estado == 'E')
                                <span class="badge badge-success">Enviado</span>
                                @endif
                                @if ($item->estado == 'P')
                                    <span class="badge badge-secondary">En camino</span>
                                @endif
                                @if ($item->estado == 'C')
                                    <span class="badge badge-primary">En camino</span>
                                @endif
                                @if ($item->estado == 'F')
                                    <span class="badge badge-danger">Finalizado</span>
                                @endif
                                @endforeach
                                
                                <br>Fecha: {{$fecha}}
                                <br>Hora: {{$hora}}
                            </address>
                
                            <table  class="table table-striped table-sm" style="width:100%;">
                                <thead>
                                <tr>
                                    <th>Nro</th>
                                    <th>Foto</th>
                                    <th>Producto</th>
                                    <th style="text-align: center">Cantidad</th>
                                    <th style="text-align: right">Costo</th>
                                    <th style="text-align: right">Total</th>
                                    
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($detalles as $item)
                                <tr>
                                <td>{{$loop->iteration}}</td>
                                    <td><img src="{{$item->foto}}" alt="" style="width: 40px; height: 40px;object-fit: cover; "></td>
                                    <td>{{$item->producto}}</td>
                                    <td style="text-align: center">{{$item->cantidad}}</td>
                                    <td style="text-align: right">$ {{$item->costo}}</td>
                                    <td style="text-align: right">$ {{$item->total}}</td>
                                    
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="col-md-9"></div>
                            <div class="col-md-3">
                                <div class="table-responsive">
                                  <table class="table table-sm">
                                    <tbody>
                                      @foreach ($pedido as $item)
                                      <tr>
                                        <th style="width:50%">Subtotal:</th>
                                      <td style="text-align: right">$ {{$item->subtotal}}</td>
                                      </tr>
                                      <tr>
                                        <th>Costo envío</th>
                                        <td style="text-align: right">$ {{$item->costo_envio}}</td>
                                      </tr>
                                      <tr>
                                        <th>Total:</th>
                                      <td style="text-align: right">$ {{$item->total}}</td>
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
    </div>

    
</div>
@endsection