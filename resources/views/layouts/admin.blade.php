<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin') | langMe</title>

    @section('styles')
      @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @show

     <script defer src="{{ asset('resources/js/timenow.js') }}"></script>
  </head>
  <body>
    <div class="wrapper">
      <div class="top">
        <x-admin.header></x-admin.header>
        <main>
          <div class="main-block"> 
            <x-admin.sidebar></x-admin.sidebar>
            @yield('content')                     
          </div>
        </main>
      </div>
      <x-admin.footer></x-admin.footer>
    </div>
    @stack('js')
  </body>
</html>
