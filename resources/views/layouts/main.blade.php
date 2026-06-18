<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <title>@yield('title') | langMe</title>
    
    @section('styles')
      @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @show

    @stack('page-scripts')

  </head>
  <body>
    <div class="wrapper-front">
      <div class="top-front">
         <x-header></x-header> 
        <main-front>
          @yield('content')
        </main-front>
      </div>
      <!-- Modal forms code block follow-->
      <x-settings></x-settings>
      <!-- Modal results with saving to pdf-->
      <x-results></x-results>
      <x-footer></x-footer>
    </div>
    <x-tutors></x-tutors>    
    
    @stack('js')

  </body>
</html>
