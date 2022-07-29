function initMaps() {

   
        
        var point ={lat: -19.8148096,lng: 34.865152};
        var map = new google.maps.Map(document.getElementById("map"),{
            zoom: 1,
            center:point
        });
        
         var marker = new google.maps.Marker({
            position:point,
            map:map,
         });

         var cdata =JSON.parse( document.getElementById('data').innerHTML);
         Array.prototype.forEach.call(cdata, function (data) {

         });


        mapTypeId: google.maps.MapTypeId.HYBRID
    };
    new google.maps.Map(document.getElementById("world_map"), hybridMap);
