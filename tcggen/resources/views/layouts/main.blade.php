<?php if (isset($_SESSION) == false): ?>
  <?php session_start(); ?>
<?php endif ?>


<!DOCTYPE html>
<html>
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>TCG Gen</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Styles -->
  <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

  <link href="{{ asset('css/card.css') }}" rel="stylesheet">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;300;400&display=swap" rel="stylesheet">

  <?php if (Session::get('theme') !== null): ?>
    <?php if (Session::get('theme') == 'dark'): ?>
      <link rel="stylesheet" type="text/css" href="{{ asset('css/dark.css') }}">
    <?php endif; ?> 
  <?php endif ?>
  <!-- <link rel="stylesheet" href="/fonts/fontawesome-free-5.3.1-web/css/all.css"> -->
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('js/main.js') }}" defer></script>
  <script src="{{ asset('js/hotswaptext.js') }}" defer></script>
</head>
<body>
<div class="container">
  <!-- right side nav -->
  <nav class="right-side">

    <form id="theme" action="/session" method="post">
      {{ csrf_field() }}
      <?php if (Session::get('theme') !== null): ?>
        <?php if (Session::get('theme') == 'dark'): ?>
          <input type="text" name="session_theme" readonly hidden value='light'>
          <!-- <a href="/session" onclick="event.preventDefault(); document.getElementById('theme').submit();">Dark Mode</a> -->
        <?php else: ?>
          <input type="text" name="session_theme" readonly hidden value='dark'>
          <!-- <a href="/session" onclick="event.preventDefault(); document.getElementById('theme').submit();">Light Mode</a> -->
        <?php endif; ?> 
      <?php else: ?>
        <input type="text" name="session_theme" readonly hidden value='dark'>
        <!-- <a href="/session" onclick="event.preventDefault(); document.getElementById('theme').submit();">Light Mode</a> -->
      <?php endif ?>
    </form>
    <!-- dark/light mode switch outside form to stay inline with logout/register/login -->
    <?php if (Session::get('theme') !== null): ?>
        <?php if (Session::get('theme') == 'dark'): ?>
          <a href="/session" onclick="event.preventDefault(); document.getElementById('theme').submit();">Light Mode</a>
        <?php else: ?>
          <a href="/session" onclick="event.preventDefault(); document.getElementById('theme').submit();">Dark Mode</a>
        <?php endif; ?> 
      <?php else: ?>
        <a href="/session" onclick="event.preventDefault(); document.getElementById('theme').submit();">Dark Mode</a>
    <?php endif ?> | 
    @guest
    <a href="{{route('login')}}">Login</a>
    <a href="{{route('register')}}">Register</a>
    @else
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
    </form>
    @endguest
  </nav>
  <!-- end right side nav -->

    @yield('content')
</div>
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