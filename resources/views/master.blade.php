<!doctype html>
<html class="no-js" lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
      @if(View::hasSection('title'))
        @yield('title') | AUDUBON
      @else
        AUDUBON
      @endif
    </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', ['integrity' => 'sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u', 'crossorigin' => 'anonymous']) !!}
    {!! HTML::style('https://fonts.googleapis.com/css?family=Josefin+Sans') !!}
    {!! HTML::style('css/main.css') !!}
    
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
        @yield('content')
      </div>
    </div>
    <small class="disclaimer">We'll never share your email with anyone else, ever.</small>
    @if(View::hasSection('scripts'))
      @yield('scripts')
    @endif
  </body>
</html>