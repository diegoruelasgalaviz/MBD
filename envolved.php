<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="app.js"></script>


    <script src="https://www.chartjs.org/samples/latest/utils.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.5/ace.js" type="text/javascript" charset="utf-8"></script>

    <script src="https://www.chartjs.org/dist/2.9.0/Chart.min.js"type="text/javascript"></script>

  <style media="screen">
    canvas{
  		-moz-user-select: none;
  		-webkit-user-select: none;
  		-ms-user-select: none

  	}
    #editor {

      height: 400px;  /* The height is 400 pixels */
      width: 95%;  /* The width is the width of the web page */
      margin: 22px;

    }
    #map {
      height: 400px;  /* The height is 400 pixels */
      width: 95%;  /* The width is the width of the web page */
      margin: 12px;
      margin-right: 12px;
     }
  </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
    <title></title>
  </head>
  <body>

    <div class="menu-bar" >
      <div class="Item-bar">
        <img onclick="window.location='index.php'"class="logo-Item" src="img_413537.png" alt="">
        <h6 class="title-letter">Mindtool</h6>
      </div>
      <div class="Item-bar1">
        <img  src="icons8-idea-50.png"  onclick="window.location.href='initx.php'" class="icon-serves" alt>
        <img src="icons8-apretón-de-manos-50.png"  onclick="window.location.href='entercontact.php'"class="icon-serves"  alt="">
        <img src="icons8-internship-24.png"  onclick="window.location.href='envolved.php';"class="icon-serves" alt="">
      </div>
      <div class="card-feet" style="">
        <div class="" style="padding-right: 10px;">
          <img class="profile-pic" src="yo.jpg" alt="Diego Ruelas">
        </div>
        <div class="">
          <p>Diego Ruelas</p>
        </div>


      </div>
      <br/>
  </div>

<script type="text/javascript">
function getitnice(){
  document.getElementById("dashboard-side").style.width = "25%";
  document.getElementById("sidebar").style.width = "100%";
}
function removeitnice(){
  document.getElementById("sidebar").style.display = "none";
  document.getElementById("dashboard-side").style.display = "none";
}
function openNav() {
  document.getElementById("dashboard-side").style.display = "block";
  document.getElementById("sidebar").style.display = "block";
  document.getElementById("sidebar").style.width = "100%";
  document.getElementById("dashboard-side").style.width = "25%";
  window.setTimeout(getitnice, 420);

  document.getElementById('appear-dash').style.display="none";


  }

function closeNav() {
  document.getElementById("sidebar").style.width = "0";
  document.getElementById("dashboard-side").style.width = "0";

  document.getElementById('appear-dash').style.display="block";

  window.setTimeout(removeitnice, 420);

  }
  var status = 2;
  function process(){
    switch (status) {
      case 1:
        openNav();
        status=2;
        break;
      case 2:
        closeNav();

        status=1;
        break;
      default:
        break;

    }
  }
</script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>


    <!-- Sidebar -->
    <div id ="kush"class="textamsg"style="text-align: 'right';" >

      <img class="getitback" src="arrow-thin-line-point-pointing-in-right-direction_318-37628.jpg" alt="" id="appear-dash"onclick="openNav();">
    </div>

    <div class="main">
      <div id="dashboard-side"class="dashboard-menu dashboard-side">

      <nav id="sidebar" class="sidebar-tic">

        <br>

          <div class="sidebar-header">
              <img onclick="closeNav();" class="wreck" src="img_413537.png" alt="">
          </div>

          <br>

          <ul class="list-unstyled components">

              <li class="active dashboard-item">
                  <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Create Content</a>
                  <ul class="collapse list-unstyled" id="homeSubmenu">
                      <li>
                          <a href="#">Organize your ads</a>
                      </li>
                      <li>
                          <a href="#">Create a post </a>
                      </li>
                      <li>
                          <a href="#">Personal files</a>
                      </li>
                  </ul>
              </li>
              <li class="dashboard-item">
                  <a href="#">Message</a>
              </li>
              <li class="dashboard-item">
                  <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Analytics</a>
                  <ul class="collapse list-unstyled" id="pageSubmenu">
                      <li>
                          <a href="#">Extension manager</a>
                      </li>
                      <li>
                          <a href="#">professional Relations</a>
                      </li>
                      <li>
                          <a href="#">Profile data</a>
                      </li>
                  </ul>
              </li>
              <li class="dashboard-item">
                  <a href="#">Portfolio</a>
              </li>
              <li class="dashboard-item">
                  <a href="#">Contact</a>
              </li>
          </ul>
      </nav>
      </div>
      <div class="dashboard-cont">



        <br>
        <br>
        <br>
        <div class="item-in-dash">

          <div id="map"></div>
          <input type="submit" class="btn btn-outline-success" name="" value="Administrar mapa">
        </div>
        <br>
        <br>
        <br>
        <br>


        <div class="item-in-dash">
          <br>
            <canvas id="a-graphic" class="first-graphic"></canvas>
            <input type="submit" class="btn btn-outline-success" name="" value="Evaluar estadística">
          <br>
        </div>
        <br>
        <br>
        <br>
        <br>

        <div class="item-in-dash">
          <div id="editor" class="first-graphic">
  function foo(items) {
    var x = "All this is syntax highlighted";
    return x;
  }
          </div>

          <input type="submit" class="btn btn-outline-success" name="" value="Salvar Archivo">
        </div>
        <br>
        <br>
        <br>



<!-- <button type="button" id="appear-dash"onclick="openNav();" name="button"> Mostrar</button>:  -->

      </div>


  </div>
  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBp5v00fbQ7qyUzUXFDn7KXkDelUKyv5mI&callback=initMap">

  </script>
  <script>
  // Initialize and add the map
  var customLabel = {
         restaurant: {
           label: 'R'
         },
         bar: {
           label: 'B'
         }
       };

     function initMap() {
         var map = new google.maps.Map(document.getElementById('map'), {
           center: new google.maps.LatLng(-33.863276, 151.207977),
           zoom: 12
         });
         var infoWindow = new google.maps.InfoWindow;

           // Change this depending on the name of your PHP or XML file
           downloadUrl('http://localhost:81/xmlpins.php', function(data) {
             var xml = data.responseXML;
             var markers = xml.documentElement.getElementsByTagName('marker');
             Array.prototype.forEach.call(markers, function(markerElem) {
               var id = markerElem.getAttribute('id');
               var name = markerElem.getAttribute('name');
               var address = markerElem.getAttribute('address');
               var type = markerElem.getAttribute('type');
               var point = new google.maps.LatLng(
                   parseFloat(markerElem.getAttribute('lat')),
                   parseFloat(markerElem.getAttribute('lng')));

               var infowincontent = document.createElement('div');
               var strong = document.createElement('strong');
               strong.textContent = name
               infowincontent.appendChild(strong);
               infowincontent.appendChild(document.createElement('br'));

               var text = document.createElement('text');
               text.textContent = address
               infowincontent.appendChild(text);
               var icon = customLabel[type] || {};
               var marker = new google.maps.Marker({
                 map: map,
                 position: point,
                 label: icon.label
               });
               marker.addListener('click', function() {
                 infoWindow.setContent(infowincontent);
                 infoWindow.open(map, marker);
               });
             });
           });
         }



       function downloadUrl(url, callback) {
         var request = window.ActiveXObject ?
             new ActiveXObject('Microsoft.XMLHTTP') :
             new XMLHttpRequest;

         request.onreadystatechange = function() {
           if (request.readyState == 4) {
             request.onreadystatechange = doNothing;
             callback(request, request.status);
           }
         };

         request.open('GET', url, true);
         request.send(null);
       }

       function doNothing() {}
  </script>
  <script type="text/javascript">
    document.getElementById('appear-dash').style.display="none";
  </script>
  <script>

    var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var color = Chart.helpers.color;
    var barChartData = {
      labels: ['FEAT CARD CUDA CARD', 'LABEL UN3481 P W EQP', 'LABEL FIPS ATTN LABL', 'LABEL SERVICE DCMNTN', 'PWR SUPPLY  300WDELTAPWRSP'],
      datasets: [{
        label: '701',
        backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
        borderColor: window.chartColors.red,
        borderWidth: 1,
        data: [
          12,
          15,
          25,
          0,
          0,

        ]
      }, {
        label: '702',
        backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
        borderColor: window.chartColors.blue,
        borderWidth: 1,
        data: [
          0,
          0,
          0,
          13,
          12,


        ]
      }]

    };

    window.onload = function() {
      var ctx = document.getElementById('a-graphic').getContext('2d');
      window.myBar = new Chart(ctx, {
        type: 'bar',
        data: barChartData,
        options: {
          responsive: true,
          legend: {
            position: 'top',
          },
          title: {
            display: true,
            text: 'Top 5 of Materials in Adjusment rics records'
          }
        }
      });

    };



    var colorNames = Object.keys(window.chartColors);

  </script>
  <script>
      var editor = ace.edit("editor");
      editor.setTheme("ace/theme/monokai");
      editor.session.setMode("ace/mode/javascript");
      editor.getSession().setUseWrapMode(true);
  </script>
  </body>
</html>
