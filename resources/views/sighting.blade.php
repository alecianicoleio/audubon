@extends('master')
@section('title', 'Report a Sighting')

@section('content')
  @parent

    <h2>Did you see a bird? Tell us about it! <br>Click <a href="{{ url('/reported') }}">here</a> to see a list of sightings.</h2>

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
    
@endsection

@section('scripts')
  @parent
  @include('formValidation')
@endsection

