@extends('master')
@section('title', 'Report a Sighting')

@section('content')
  @parent
  <h2>Here are some birds that people saw. <br>Click <a href="{{ url('/sighting') }}">here</a> to report your own bird.</h2>
  <ul class="reported-sightings cf">
    @foreach($sightings as $sighting)
      <li class="sighting-event">
        <div>
          <h3 class="event-bird">{{ $sighting->getBird()->getSpecies() }}</h3>
          <h3 class="event-description">{{ $sighting->getBird()->getDescription() }}</h3>
          <h4 class="event-location">{{ $sighting->getLocation() }}</h4>
          <p><span class="event-date">{{ $sighting->getDate()->format('Y-m-d H:i:s') }}</span></p>
        </div>
      </li>
    @endforeach 
  </ul>
@endsection 

  