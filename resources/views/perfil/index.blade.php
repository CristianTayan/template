@extends('layout')
@section('contenido')
<div class="row">
   <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
      {{-- @if (!session()->get('nombre_empresa'))
      <a class="btn btn-primary" href="{{route('home.registro_empresa')}}">No has registrado tu empresa, regístrala ahora</a>
      @endif --}}
            <div class="x_content">
                @foreach ($usuario as $item)
               <div class="col-md-3 col-sm-3  profile_left">
                  <div class="profile_img">
                     <div id="crop-avatar">
                        <!-- Current avatar -->
                        <img class="img-responsive avatar-view" src="{{asset($item->foto)}}" alt="Avatar" style="width: 200px" title="Change the avatar">
                     </div>
                  </div>
                  <h3>{{$item->empresa}}</h3>
                  <ul class="list-unstyled user_data">
                     <li><i class="fa fa-map-marker user-profile-icon"></i> {{$item->direccion}}
                     </li>
                     <li>
                        <i class="fa fa-briefcase user-profile-icon"></i> {{$item->telefono}}
                     </li>
                     <li>
                        <i class="fa fa-user user-profile-icon"></i> {{$item->idprov}}
                     </li>
                     <li class="m-top-xs">
                        <i class="fa fa-external-link user-profile-icon"></i>
                        @if ($item->correo)
                        <a >{{$item->correo}}</a>
                        @endif
                     </li>
                  </ul>
                <a class="btn btn-primary" href="#"><i class="fa fa-edit m-right-xs"></i>Editar datos</a>  
               </div>

            <div class="col-md-9 col-sm-9 ">
                @if (session('status'))
                    <div id="alert" class="alert alert-success">
                    {{ session('status') }}
                    </div>
                @endif
                <div class="profile_title">
                    <div class="col-md-6">
                        <h2>Ubicación de tu empresa</h2>
                    </div>
                </div>
                <br>
                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <div id="myTabContent" class="tab-content">
                    <input type="hidden" id="longitud"  value="{{$item->coordenaday}}">
                    <input type="hidden" id="latitud"  value="{{$item->coordenadax}}">
                    <div id="mapa" style="width: 100%; height: 400px;"></div>
                        {{-- <ul class="messages">
                            <li>
                            <img src="http://markgetgo.com/markgetgo_server/public/{{$item->foto_cat}}" class="avatar" alt="Avatar">
                                
                                <div class="message_wrapper">
                                    <h4 class="heading">Categoría</h4>
                                    <blockquote class="message">{{$item->categoria}}</blockquote>
                                    <br />
                                    
                                </div>
                            </li>
                            <li>
                                <img src="imgs/nego.png" class="avatar" alt="Avatar">
                                
                                <div class="message_wrapper">
                                    <h4 class="heading">Especialidades</h4>
                                    <blockquote class="message">{{$item->especialidades}}</blockquote>
                                    <br />
                                    
                                </div>
                            </li>
                            <li>
                                <img src="imgs/des.png" class="avatar" alt="Avatar">
                            
                                <div class="message_wrapper">
                                    <h4 class="heading">Descripción de tu empresa</h4>
                                    <blockquote class="message">{{$item->descripcion}}</blockquote>
                                    <br />
                                </div>
                            </li>
                            <li>
                                <img src="imgs/nego.png" class="avatar" alt="Avatar">
                            
                                <div class="message_wrapper">
                                    <h4 class="heading">Giro del negocio</h4>
                                    <blockquote class="message">{{$item->giro_negocio}}</blockquote>
                                    <br />
                                </div>
                            </li>

                            <li>
                                <img src="imgs/fb.png" class="avatar" alt="Avatar">
                            
                                <div class="message_wrapper">
                                    <h4 class="heading">Facebook</h4>
                                    <blockquote class="message">{{$item->facebook}}</blockquote>
                                    <br />
                                </div>
                            </li>

                            <li>
                                <img src="imgs/insta.png" class="avatar" alt="Avatar">
                            
                                <div class="message_wrapper">
                                    <h4 class="heading">Instagram</h4>
                                    <blockquote class="message">{{$item->instagram}}</blockquote>
                                    <br />
                                </div>
                            </li>

                            <li>
                                <img src="imgs/web.png" class="avatar" alt="Avatar">
                            
                                <div class="message_wrapper">
                                    <h4 class="heading">Página web</h4>
                                    <blockquote class="message">{{$item->web}}</blockquote>
                                    <br />
                                </div>
                            </li>

                            <li>
                                <img src="imgs/wpp.png" class="avatar" alt="Avatar">
                            
                                <div class="message_wrapper">
                                    <h4 class="heading">Whatsapp de la empresa</h4>
                                    <blockquote class="message">{{$item->whatsapp_empresa}}</blockquote>
                                    <br />
                                </div>
                            </li>

                            <li>
                                <img src="imgs/call.png" class="avatar" alt="Avatar">
                            
                                <div class="message_wrapper">
                                    <h4 class="heading">Teléfono de la empresa</h4>
                                    <blockquote class="message">{{$item->telefono_empresa}}</blockquote>
                                    <br />
                                </div>
                            </li>
                            
                        </ul> --}}
                    <br>
                    <a href="{{route('perfil.cambiar_ubicacion')}} " class="btn btn-success">¿Cambiar de ubicacion?</a>
                    </div>
                </div>
            </div>
            @endforeach
         </div>
      </div>
   </div>
   
</div>
@endsection