<!doctype html>
<html class="no-js" lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Audubon</title>
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
        <h2>Did you see a bird? Tell us about it! <br>Click <a href="{{ url('/reported') }}">here</a> to see a list of sightings.</h2>

        <!-- <div id="error-container" class="err-container">
          <p>Oops, looks like you forgot something: </p>
          <div id="error-wrapper" class="err-wrapper">
            <ul id="error-list"></ul>
          </div>
        </div>-->

        <form class="brdr-form" name="brdr-form" method="post" action="{{ route('sighting.save.route') }}">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <ul> 
            <li class="form-group half-l"> 
              <label class="form-label" for="inputFirst">First Name</label>
              <input id="inputFirst" name="inputFirst" class="form-control" type="text" placeholder="David"> 
            </li>
            <li class="form-group half-r"> 
              <label class="form-label" for="inputLast">Last Name</label>
              <input id="inputLast" name="inputLast" class="form-control" type="text" placeholder="Attenborough"> </li>
            <li class="form-group half-l"> 
              <label class="form-label" for="inputPhone">Phone Number</label>
              <input id="inputPhone" name="inputPhone" class="form-control" type="tel" pattern="\d{3}[\-]\d{3}[\-]\d{4}" placeholder="888-888-8888"> 
            </li>
            <li class="form-group half-r"> 
              <label class="form-label" for="inputEmail">Email address</label>
              <input id="inputEmail" name="inputEmail" class="form-control" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="birder01@gmail.com"> 
            </li>
            <li class="form-group half-l">
              <label class="form-label" for="inputDate">Sighting Date<span class="rqurd"> *</span></label>
              <input id="inputDate" name="inputDate" class="form-control" type="date">
            </li>
            <li class="form-group half-r">
              <label class="form-label" for="inputTime">Sighting Time<span class="rqurd"> *</span></label>
              <input id="inputTime" name="inputTime" class="form-control" type="time">
            </li>
            <li class="form-group half-l">
              <label class="form-label" for="inputLoc">Sighting Location (City, State)<span class="rqurd"> *</span></label>
              <input id="inputLoc" name="inputLoc" class="form-control" type="text">
            </li>
            <li class="form-group half-r">
              <label class="form-label" for="inputSpec">Bird Species<span class="rqurd"> *</span> </label>
              <input id="inputSpec" name="inputSpec" class="form-control" type="text">
            </li>
            <li class="form-group cf">
              <label class="form-label" for="inputDescrip">Bird Description<span class="rqurd"> *</span></label>
              <textarea id="inputDescrip" name="inputDescrip" class="form-control" rows="3" placeholder="This was a really big bird, oh man! It had huge talons, big enough to carry off a fully grown man... Do chickens have talons?"></textarea>
            </li>
            <li class="form-group form-buttongroup">
              <input class="btn btn-primary" type="submit" value="Submit">
              <p class="form-text text-muted"><small><span class="rqurd">*</span> All fields marked with an asterisk are required.</small></p>
            </li>
          </ul>
        </form>

      </div>
    </div>

    <small class="disclaimer">We'll never share your email with anyone else, ever.</small>

    {!! HTML::script('https://code.jquery.com/jquery-1.12.0.min.js') !!}
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
    {!! HTML::script('http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js') !!}
    {!! HTML::script('http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js') !!}
    {!! HTML::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyB03xek-FO2jBgvTu-3ebzWaVbEdNsCBmw&libraries=places') !!}
    {!! HTML::script('http://codepen.io/alecianicole/pen/24a4d2b74dee2c75f31a8077ff0ec5fe.js') !!}
    {!! HTML::script('/js/main.js') !!}

  </body>
</html>
