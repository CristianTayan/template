@extends('layout')
@section('contenido')
<div class="row">
   
   @if (session('status'))
        <div id="alert" class="alert alert-success">
        {{ session('status') }}
        </div>
    @endif
   <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
      {{-- @if (!session()->get('nombre_empresa'))
      <a class="btn btn-primary" href="{{route('home.registro_empresa')}}">No has registrado tu empresa, regístrala ahora</a>
      @endif --}}
            <div class="x_content">
                @foreach ($usuario as $item)
               <div class="col-md-6 col-sm-6  profile_left">
                <form action="{{route('perfil.actualizar_ubicacion')}}" method="post">
                    @csrf
                        <h6><strong>*Importante: </strong>Haga click en el lugar que se encuentra su negocio, los campos de coordenadas y calle principal se llenaran automáticamente.</h6>
                        <br><br>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Calle principal de su empresa<span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text"  id="features" type="text" name="calle_principal"
                            placeholder="Calle principal" value="{{$item->calle_principal}}"  class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Calle secundaria de su empresa<span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" value="{{$item->calle_secundaria}}"  id="features" type="text" name="calle_secundaria"
                                     placeholder=""  class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Coordenadas<span class="required">*</span>
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text"  id="lat"  name="lat" 
                                     placeholder="Latitud"  class="form-control" >
                            </div>
                            <div class="col-md-4 col-sm-4 ">
                                <input   id="lng" type="text" name="lng" 
                                     placeholder="Longitud"  class="form-control" >
                            </div>
                        </div>
                        <br>
                        <div style="width: 100%;text-align: center">
                            <button class="btn btn-success">Actualizar ubicación</button>
                        </div>
                    </form>
               </div>

            <div class="col-md-6 col-sm-6 ">
                <div class="profile_title">
                    <div class="col-md-12">
                        <h2>Ubicación de tu empresa</h2>
                    </div>
                </div>
                <br>
                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <div id="myTabContent" class="tab-content">
                    <input type="hidden" id="longitud"  value="{{$item->coordenaday}}">
                    <input type="hidden" id="latitud"  value="{{$item->coordenadax}}">
                    <div id="map" style="width: 100%; height: 400px;"></div>

                    <br>
                    {{-- <a href="{{route('perfil.cambiar_ubicacion')}} " class="btn btn-success">Actualizar ubicación</a> --}}
                    </div>
                </div>
            </div>
            @endforeach
         </div>
      </div>
   </div>
   
</div>
@endsection