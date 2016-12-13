

<!doctype html>
<html class="no-js" lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Confirmation</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">
  </head>
  <body>
  
  
    <div class="form-container">
      <div class="form-wrapper">

        <div class="logo">
          <div class="logo-wrapper">
            <img src="https://www.gradslikeme.com/publicSiteAssets/images/icons/white/binoculars5.png" alt="" />
            <h1>BRDR</h1>
          </div>
        </div> 
        <h2>Your sighting has been submitted! <br>Click <a href="{{ url('/reported') }}">here</a> to view all sightings.</h2>
        <ul class="reported-sightings cf">

          
            <div class="sighting-event">
              <div>
                <h3 class="event-bird">{{ $sighting->getBird()->getSpecies() }}</h3>
                <h3 class="event-description">{{ $sighting->getBird()->getDescription() }}</h3>
                <h4 class="event-location">{{ $sighting->getLocation() }}</h4>
                <p><span class="event-date">{{ $sighting->getDate()->format('Y-m-d H:i:s') }}</span></p>
              </div>
            </div>
          


        </ul>

      </div>
    </div>



    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script> 
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script> 
    <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB03xek-FO2jBgvTu-3ebzWaVbEdNsCBmw&libraries=places"></script>
    
    <script src="http://codepen.io/alecianicole/pen/24a4d2b74dee2c75f31a8077ff0ec5fe.js"></script> 
    <script src="./js/main.js"></script>

  </body>
</html>
