@extends('master')
@section('title', 'Success!')

@section('content')
  @parent

  <h2>Your sighting has been submitted! <br>Click <a href="{{ url('/reported') }}">here</a> to view all sightings.</h2>
  <div class="reported-sightings cf">
    <div class="sighting-event">
      <div>
        <h3 class="event-bird">{{ $sighting->getBird()->getSpecies() }}</h3>
        <h3 class="event-description">{{ $sighting->getBird()->getDescription() }}</h3>
        <h4 class="event-location">{{ $sighting->getLocation() }}</h4>
        <p><span class="event-date">{{ $sighting->getDate()->format('Y-m-d H:i:s') }}</span></p>
      </div>
    </div>
  </div>

@endsection