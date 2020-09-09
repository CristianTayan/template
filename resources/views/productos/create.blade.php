@extends('layout')
@section('contenido')
<div class="row">
    <div class="title_left" style="padding-left: 10px">
        <h3>Agregar nuevo producto</h3>
    </div>
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel" >
            <div class="x_content">
                @if (session('status'))
                    <div id="alert" class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <br />
                
                <form action="{{ route('productos.guardar') }}" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                    @csrf
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align"  for="first-name">Categoría del producto <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select id="primero" name="idcategoria"  class="form-control"  required>
                                <option value="">En que categoría se encuentra tu producto?</option>
                                @foreach ($categorias as $item)
                                <option value="{{ $item->idcategoria }}" >{{$item->nombre}} </option>   
                                @endforeach                              
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align"  for="first-name">Nombre del producto <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="nombre"  required="required" class="form-control ">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align"  for="first-name">Subcategoría del producto <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select id="primero" name="idespecial"  class="form-control"  required>
                                <option value="">En que subcategoría se encuentra tu producto?</option>
                                @foreach ($especialidades as $item)
                                <option value="{{ $item->idcatalogo }}" >{{$item->nombre}} </option>   
                                @endforeach                              
                            </select>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align"  for="first-name">Descripción del producto <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea  cols="30" rows="4" name="detalle" 
                        required="required" class="form-control "></textarea>
                            {{-- <input type="text" name="detalle" 
                            required="required" class="form-control "> --}}
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align"  for="first-name">Costo del producto <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="number" min="1" step="any"  name="costo"  required="required" class="form-control ">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Foto del producto: Tamaño recomendado 500 x 500 px<span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 " style="border: none">
                            {{-- <img src="{{asset($prod->url)}}" style="width: 120px; height: 120px; object-fit: cover"> --}}
                            <input accept="image/*" type="file" id="FOTO" name="FOTO" style="border: none" class="form-control">
                            {{-- <input type="hidden" value="{{ $prod->url }}" name="FOTOE"> --}}
                            {{-- <input type="file" id="image"  name="image" required="required" style="border: none" class="form-control"> --}}
                        </div>
                    </div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <a class="btn btn-primary" href="{{route('productos.index')}}" type="button">Cancelar</a>
                            {{-- <button class="btn btn-primary" type="reset">Reset</button> --}}
                            <button type="submit" class="btn btn-success">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection