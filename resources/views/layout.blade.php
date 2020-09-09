<!DOCTYPE html>
<html lang="es">
  <head>
    <link rel="shortcut icon" href="../public/icon.ico">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Go-Q | Facilita du día!</title>

    <!-- Bootstrap -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
	<!-- NProgress -->
	<link href="{{ asset('vendors/nprogress/nprogress.css')}}" rel="stylesheet">
	<!-- iCheck -->
	<link href="{{ asset('vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
	<!-- bootstrap-wysiwyg -->
	<link href="{{ asset('vendors/google-code-prettify/bin/prettify.min.css')}}" rel="stylesheet">
	<!-- Select2 -->
	<link href="{{ asset('vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
	<!-- Switchery -->
	<link href="{{ asset('vendors/switchery/dist/switchery.min.css')}}" rel="stylesheet">
	<!-- starrr -->
	<link href="{{ asset('vendors/starrr/dist/starrr.css')}}" rel="stylesheet">
	<!-- bootstrap-daterangepicker -->
	<link href="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
  <link href="{{ asset('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
  <!-- JQVMap -->
  <link href="{{ asset('vendors/dropzone/dist/min/dropzone.min.css')}}" rel="stylesheet">
  <link href="{{ asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
  <style>
   
    #map canvas {
    cursor: crosshair;
    }
    </style>
  <script src="https://api.mapbox.com/mapbox-gl-js/v1.10.1/mapbox-gl.js"></script>
  <link href="https://api.mapbox.com/mapbox-gl-js/v1.10.1/mapbox-gl.css" rel="stylesheet" />
  <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
  <link
  rel="stylesheet"
  href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css"
  type="text/css"
  />

	<!-- Custom Theme Style -->
	<link href="{{ asset('build/css/custom.min.css')}}" rel="stylesheet">
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><img src="../public/images/logo.png" alt="" style="width: 60px"> <span></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                @if (!session()->get('foto'))
                <img src="../public/imgs/user.png" alt="..." class="img-circle profile_img">
                @endif

                @if (session()->get('foto'))
                <img src="{{asset(session()->get('foto'))}}" alt="..." style="width: 60px;height: 60px; object-fit: cover" class="img-circle profile_img">
                @endif
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2>{{ session()->get('nombre') }}</h2>

              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-user"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li {{ !Route::is('perfil.index') ?: 'active'}}><a href="{{route('perfil.index')}}">Perfil</a></li>
                      {{-- <li ><a href="#">Perfil</a></li> --}}
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Productos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      {{-- <li ><a href="#">Administrar categorías</a></li> --}}
                    <li  {{ !Route::is('productos.index') ?: 'active'}}><a  href="{{route('productos.index')}}">Administrar productos </a></li>

                    </ul>
                  </li>

                  <li><a><i class="fa fa-file-pdf-o"></i> Reportes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li {{ !Route::is('home') ?: 'active'}}><a href="{{ route('home')}}">Ventas</a></li>

                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              {{-- <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a> --}}
              <a data-toggle="tooltip" data-placement="top" href=" {{ route('logout')}} " title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    {{-- <img src="images/img.jpg" alt=""> --}}
                    {{ session()->get('nombre') }}
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    {{-- <a class="dropdown-item"  href="javascript:;"> Profile</a>
                      <a class="dropdown-item"  href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                  <a class="dropdown-item"  href="javascript:;">Help</a> --}}
                    <a class="dropdown-item"  href="login.html"><i class="fa fa-sign-out pull-right"></i> Cerrar sesión</a>
                  </div>
                </li>

                {{--  --}}
              </ul>
            </nav>
          </div>
        </div>


        <div class="right_col" role="main">
          @yield('contenido')
        </div>



        <footer>
          <div class="pull-right">
            {{-- MarkgetGo! - A la orden by <a href="http://markgetgo.com">http://markgetgo.com</a> --}}
          </div>
          <div class="clearfix"></div>
        </footer>
      </div>
    </div>
    



    <!-- jQuery -->
    <script src="{{ asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{ asset('vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{ asset('vendors/nprogress/nprogress.js')}}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('vendors/Chart.js/dist/Chart.min.js')}}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('vendors/gauge.js/dist/gauge.min.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{ asset('vendors/iCheck/icheck.min.js')}}"></script>
    <!-- Skycons -->
    <script src="{{ asset('vendors/skycons/skycons.js')}}"></script>
    <!-- Flot -->
    <script src="{{ asset('vendors/Flot/jquery.flot.js')}}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.time.js')}}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.stack.js')}}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.resize.js')}}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
    <script src="{{ asset('vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
    <script src="{{ asset('vendors/flot.curvedlines/curvedLines.js')}}"></script>
    <!-- DateJS -->
    <script src="{{ asset('vendors/DateJS/build/date.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
    <script src="{{ asset('vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{ asset('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{ asset('vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js')}}"></script>
    <!-- jQuery Knob -->
    <script src="{{ asset('vendors/jquery-knob/dist/jquery.knob.min.js')}}"></script>
    

    <script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{ asset('vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{ asset('vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{ asset('vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{ asset('build/js/custom.min.js')}}"></script> 
    <script>
      var longitud  =  document.getElementById("longitud").value;
      
      var latitud =  document.getElementById("latitud").value;
      
      var user_location = [ longitud , latitud  ];
      mapboxgl.accessToken = 'pk.eyJ1IjoiZWRpc29udGF5YW4iLCJhIjoiY2thbWt1Ynd0MWY2bjJ4cDRlcmpobGN3aiJ9.C26w_72d9I_1HQShzrh6Ow';
      var map = new mapboxgl.Map({
          container: 'mapa',
          style: 'mapbox://styles/mapbox/streets-v11',
          center: user_location,
          zoom: 14
      });
      map.addControl(new mapboxgl.NavigationControl());
      map.addControl(new mapboxgl.FullscreenControl());
      map.addControl(new mapboxgl.GeolocateControl({
        positionOptions: {
            enableHighAccuracy: true
        },
        trackUserLocation: true
      }));

      var geocoder = new MapboxGeocoder({
          accessToken: mapboxgl.accessToken,
          // limit results to Australia
          //country: 'IN',
      });
    
      var marker ;
    
      // After the map style has loaded on the page, add a source layer and default
      // styling for a single point.
      map.on('load', function() {
          addMarker(user_location,'load');
          add_markers(saved_markers);
    
          // Listen for the result event from the MapboxGeocoder that is triggered when a user
          // makes a selection and add a symbol that matches the result.
          geocoder.on('result', function(ev) {
              alert("aaaaa");
              console.log(ev.result.center);
    
          });
        });
    </script>
    
    <script>
   
      var longitud  =  document.getElementById("longitud").value;
      
      var latitud =  document.getElementById("latitud").value;
      
      var user_location = [ longitud , latitud  ];
      mapboxgl.accessToken = 'pk.eyJ1IjoiZWRpc29udGF5YW4iLCJhIjoiY2thbWt1Ynd0MWY2bjJ4cDRlcmpobGN3aiJ9.C26w_72d9I_1HQShzrh6Ow';
      var map = new mapboxgl.Map({
          container: 'map',
          style: 'mapbox://styles/mapbox/streets-v11',
          center: user_location,
          zoom: 15
      });
      map.addControl(new mapboxgl.NavigationControl());
      map.addControl(new mapboxgl.FullscreenControl());
      map.addControl(new mapboxgl.GeolocateControl({
        positionOptions: {
            enableHighAccuracy: true
        },
        trackUserLocation: true
      }));
      //  geocoder here
      var geocoder = new MapboxGeocoder({
          accessToken: mapboxgl.accessToken,
          // limit results to Australia
          //country: 'IN',
      });
    
      var marker ;
    
      // After the map style has loaded on the page, add a source layer and default
      // styling for a single point.
      map.on('load', function() {
          addMarker(user_location,'load');
          add_markers(saved_markers);
    
          // Listen for the result event from the MapboxGeocoder that is triggered when a user
          // makes a selection and add a symbol that matches the result.
          geocoder.on('result', function(ev) {
              alert("aaaaa");
              console.log(ev.result.center);
    
          });
        });
        map.on('click', function (e) {
          marker.remove();
          addMarker(e.lngLat,'click');
          var features = map.queryRenderedFeatures(e.point);
    
    // Limit the number of properties we're displaying for
    // legibility and performance
      var displayProperties = [
      'properties'  
      ];
      
      var displayFeatures = features.map(function(feat) {
      var displayFeat = {};
      displayProperties.forEach(function(prop) {
      displayFeat[prop] = feat[prop];
      });
      return displayFeat;
      });
      
      var calle = displayFeatures[0].properties.name;
    
    
         document.getElementById("features").value = calle;
          //console.log(e.lngLat.lat);
          document.getElementById("lat").value = e.lngLat.lat;
          document.getElementById("lng").value = e.lngLat.lng;
    
      });
    
      function addMarker(ltlng,event) {
    
          if(event === 'click'){
              user_location = ltlng;
          }
          marker = new mapboxgl.Marker({draggable: true,color:"#d02922"})
              .setLngLat(user_location)
              .addTo(map)
              .on('dragend', onDragEnd);
      }
      function add_markers(coordinates) {
    
          var geojson = (saved_markers == coordinates ? saved_markers : '');
    
          console.log(geojson);
          // add markers to map
          geojson.forEach(function (marker) {
              console.log(marker);
              // make a marker for each feature and add to the map
              new mapboxgl.Marker()
                  .setLngLat(marker)
                  .addTo(map);
          });
    
      }
    
      function onDragEnd() {
          var lngLat = marker.getLngLat();
          document.getElementById("lat").value = lngLat.lat;
          document.getElementById("lng").value = lngLat.lng;
          document.getElementById("features").value = calle;
          console.log('lng: ' + lngLat.lng + '<br />lat: ' + lngLat.lat);
      }
    
      $('#signupForm').submit(function(event){
          event.preventDefault();
          var lat = $('#lat').val();
          var lng = $('#lng').val();
          var url = 'locations_model.php?add_location&lat=' + lat + '&lng=' + lng;
          $.ajax({
              url: url,
              method: 'GET',
              dataType: 'json',
              success: function(data){
                  alert(data);
                  location.reload();
              }
          });
      });
    
      document.getElementById('geocoder').appendChild(geocoder.onAdd(map));
    
    </script> 


    <script>
      $(document).ready(function() {
        $('#datatable').DataTable();
    } );
    </script>

    <script>
      $('#alert').fadeIn();     
  setTimeout(function() {
       $("#alert").fadeOut();           
  },4000);
    </script>
    <script>
      function habilitar(value)
      {
        
        var x = document.getElementById("primero").value;

        if(11 == x || value==true)
        {
          // habilitamos
          console.log("habilitar", value, x);
        
          var subcategoria = document.getElementById("subcategoria");
          subcategoria.style.display = 'block';  
        }else if(11 != x || value==false){
          // deshabilitamos
         var subcategoria = document.getElementById("subcategoria");
        subcategoria.style.display = 'none';
        }
      }
    </script>
  </body>
</html>
