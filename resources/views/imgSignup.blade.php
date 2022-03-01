<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <title>SignUp!</title>
  </head>
  <body>
      <div class="container">
        <form class="" method="post" action="{{url('/img')}}" enctype="multipart/form-data">
            @csrf
            <h1>Enter Your details!!!</h1>
            <div class="mb-3">
                <label for="formFile" class="custom-form-label">Upload Image</label><br>
                <input class="custom-form-control" type="file" id="" name="file"><br>
                <span class="text-danger">
                    @error('file')
                        {{$message}}
                    @enderror
                </span>
              </div>            
              <div class="mapform" >
                <div class="row">
                    <div class="col-5">
                        <input type="text" class="form-control" placeholder="28.5396487" name="lat" id="lat">
                    </div>
                    <div class="col-5">
                        <input type="text" class="form-control" placeholder="77.3407958" name="lng" id="lng">
                    </div>
                </div>

                <div id="map" style="height:400px; width: 800px;" class="my-3" name="map"></div>

                <script>
                    let map;
                    function initMap() {
                        map = new google.maps.Map(document.getElementById("map"), {
                            center: { lat: 28.5396487, lng: 77.3407958 },
                            zoom: 8,
                            scrollwheel: true,
                        });
                        const delhi = { lat: 28.5396487, lng: 77.3407958 };
                        let marker = new google.maps.Marker({
                            position: delhi,
                            map: map,
                            draggable: true
                        });
                        google.maps.event.addListener(marker,'position_changed',
                            function (){
                                let lat = marker.position.lat()
                                let lng = marker.position.lng()
                                $('#lat').val(lat)
                                $('#lng').val(lng)
                            })
                        google.maps.event.addListener(map,'click',
                        function (event){
                            pos = event.latLng
                            marker.setPosition(pos)
                        })
                    }
                </script>
                <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"
                        type="text/javascript"></script>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
          </form>
      </div> 
    
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  
  </body>
</html>