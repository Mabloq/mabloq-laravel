@extends('blog')


@section('stylesheet')
<style media="screen">
  #map{
    height: 100%;

  }
  html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
  #restInfo{
    position: absolute;
    z-index: 99;
    top: 160px;
    left: 10px;
    overflow: scroll;
    height: 500px;
    width: 400px;
  }

  .restCard{
    position: absolute;
    background-color: #ffffff;
    font-style: 'lato',sans-serif;
  }
  .restImg{
    margin:auto;
    background-size: contain;
    width: 375px;
  }
  .restName{
    font-style: 'Montserrat', sans-serif;
    font-size: 24px;

  }
</style>
@endsection


@section('title', 'About me')
@section('imagehead', '/images/Optimized-profile2.jpg')
@section('BannerLead', 'Matthew Arcila')



@section('content')



      <div id="restInfo">
        <div class="restCard">
          <h2 class="restName">Hello</h2>
          <img class="restImg" src="http://localhost:8000/images/runderstand.png" alt="">
          <p>This glatt kosher eatery, with an austere and brightly lit dining room on one side,
            specializes in breaded chicken cutlets with Cajun, Greek, Japanese, and Middle Eastern
            flavoring schemes, but also offers such startling oddities as a “double dog delight” (two franks
             laid end-to-end in an elongated poppy seed bun), schnitzel sushi (No, it’s not raw!), and a memorable pastrami burger (shown).</p>
        </div>
      </div>
      <div id="map">

  		</div>







@endsection

@section('scripts')
<script src=" /js/restaurants.js"></script>
<!-- <script type="text/javascript">

function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: new google.maps.LatLng(40.932594, -73.986563),
    zoom: 12
  });
  var infoWindow = new google.maps.InfoWindow;

  downloadUrl('http://localhost:8000/xml/restaurants.xml', function(data) {
    var xml = data.responseXML;
    var restaurants = xml.documentElement.getElementsByTagName('restaurants');
      $.each(restaurants, function(restaurant){
        var id = restaurant.getAttribute('id');
        var name = restaurant.getAttribute('name');
        var address = restaurant.getAttribute('address');
        var type = restaurant.getAttribute('type');
        var point = new google.maps.LatLng(
          parseFloat(restaurant.getAttribute('lat')),
          parseFloat(restaurant.getAttribute('lng')));

        var infowincontent = document.createElement('div');
        var strong = document.createElement('strong');
        strong.textContent = name;
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
      });

    }); //end success function
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
</script> -->



@endsection
