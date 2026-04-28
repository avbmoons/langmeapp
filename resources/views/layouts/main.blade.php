<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>@yield('title') | langMe</title>
    
    {{-- <style type="text/css">
      @font-face {
        font-family: 'Roboto';
        src: url(' {{ public_path('fonts/Roboto.ttf')}}');
      }    
    </style> --}}

    @section('styles')
      @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @show

    {{-- <script defer src="{{ asset('resources/js/timenow.js') }}"></script> 
    <script defer src="{{ asset('resources/js/showModals.js') }}"></script> --}}

  </head>
  <body>
    <div class="wrapper-front">
      <div class="top-front">
         <x-header></x-header> 
        {{--<x-draft></x-draft>--}}
        <main-front>
          @yield('content')
        </main-front>
      </div>
      <!-- Modal forms code block follow-->
      <x-settings></x-settings>
      {{-- <x-settings></x-settings>
      <x-results></x-results> --}}
      <!-- Modal results with saving to pdf-->
      <x-results></x-results>
      <x-footer></x-footer>
    </div>
    <x-tutors></x-tutors>    
    
    @stack('js')

  </body>
</html>
