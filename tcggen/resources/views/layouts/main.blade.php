<!DOCTYPE html>
<html>
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>TCG Gen</title>
  <!-- Styles -->
  <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
  <link href="{{ asset('css/card.css') }}" rel="stylesheet">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <!-- <link rel="stylesheet" href="/fonts/fontawesome-free-5.3.1-web/css/all.css"> -->
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('js/main.js') }}" defer></script>
  <script src="{{ asset('js/hotswaptext.js') }}" defer></script>
</head>
<body>

  @yield('content')

  <!-- lightbox popup -->
  <div id="dark-box">
    <div id="light-box">
      <div id="light-box-content">
      </div>
      <!-- <button id="lb-save">save</button> -->
      <button id="lb-close">x</button>
    </div>
  </div>

  <!-- Scripts -->
  <!-- <script src="{{ asset('js/app.js') }}"></script> -->
  <!-- <script src="{{ asset('js/main.js') }}"></script> -->
  <!-- <script src="{{ asset('js/hotswaptext.js') }}"></script> -->
  <script>
    window.Laravel = {!! json_encode([
      'csrfToken' => csrf_token(),
    ]) !!};
  </script>
</body>
</html>