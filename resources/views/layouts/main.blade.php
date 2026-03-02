<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>@yield('title') | langMe</title>

    @section('styles')
      @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @show

    <script defer src="{{ asset('resources/js/timenow.js') }}"></script>
    <script defer src="{{ asset('resources/js/showModals.js') }}"></script>

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
      {{-- <x-settings></x-settings>
      <x-results></x-results> --}}
      <!-- Modal results with saving to pdf-->
      <x-footer></x-footer>
    </div>
  </body>
</html>
