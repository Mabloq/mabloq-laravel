
$(document).ready(function() {

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $.ajax({
      type: 'GET',
      url: 'https://maps.googleapis.com/maps/api/js',
      dataType: 'jsonp',
      data: {
        '_token': $('input[name=_token]').val(),
        'key': 'AIzaSyDz9mm6LoThL9R8XZYu85Bn9e3sM1tnlYw'
      },
      success: function initMap(){
          var map = new google.maps.Map(document.getElementById('map'), {
            center: new google.maps.LatLng(40.802418, -73.993681),
            zoom: 12,
            streetViewControl: false,
            mapTypeControl: false
          });
          var infoWindow = new google.maps.InfoWindow;


          $.ajax({
            type: 'GET',
            url: 'http://localhost:8000/xml/restaurants.xml',
            dataType: 'xml',
            data: {
              '_token': $('input[name=_token]').val()

            },
            success: function(data) {
                var restArr = $(data).find('restaurant').each(function(){
                  var id = $(this).attr('id');
                  var name = $(this).attr('name');
                  var address = $(this).attr('address');
                  var type = $(this).attr('type');
                  var point = new google.maps.LatLng(
                    parseFloat($(this).attr('lat')),
                    parseFloat($(this).attr('lng')));

                  var infowincontent = document.createElement('div');
                  var strong = document.createElement('strong');
                  strong.textContent = name;
                  infowincontent.appendChild(strong);
                  infowincontent.appendChild(document.createElement('br'));

                  var text = document.createElement('text');
                  text.textContent = address
                  infowincontent.appendChild(text);
                  var icon = customLabel[type] || {};
                  var image = {
                        url: 'http://localhost:8000/images/rice_bowl2.png',

                        labelOrigin: new google.maps.Point(28,35)
                                }
                  var marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    label: {
                      text: icon.label,
                      color: 'white',
                      fontSize: '14px',
                      fontFamily: 'arial',
                      fontWeight: 'bold'
                    },
                    icon: image
                  });
                  marker.addListener('click', function() {
                    map.setCenter(marker.getPosition());
                  });

                });
                console.log(restArr);
              } //end success function

            }); //end ajax function
          } //end initMap


    });
  });

var customLabel = {
  Japanese: {
    label: 'J'
  },
  Korean: {
    label: 'K'
  },
  Thai: {
    label: 'T'
  }
};

$(window).scroll(function() {

      if($(this).scrollTop() > 50) {
        $('#nav').addClass('blog-head-scrolled');
      }else {
        $('#nav').removeClass('blog-head-scrolled');

      }

});
