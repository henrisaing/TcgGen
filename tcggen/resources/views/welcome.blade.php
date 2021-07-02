@extends('layouts.main')

@section('content')
<div class="card card-portrait card-border card-border-radius10 vertical-center card-background-white" style="border-color:#201F1C">

  <div class="card-pic border-1px-black" style="background-color:white"></div>

  <div class="card-element position-midcenter border-1px-black card-background-white">
  TCG Gen
  </div>

  <div class="card-element position-midlower border-1px-black card-background-white">
  @if (Route::has('login'))
    <div class="top-right links">
      @auth
        <a href="{{ url('/home') }}">Home</a> | 
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
      @else
        <a href="{{ route('login') }}">Login</a> | 
        <a href="{{ route('register') }}">Register</a>
      @endauth
    </div>
  @endif
  </div>
</div>

<style type="text/css">
  .container{
    position:absolute;
    height:90%!important;
    left:0!important;
    transform:translate(0,0);
  }
  nav{
    display:none;
  }

  .card{
    font-family: "Roboto Slab", serif;
    font-weight: 300;
    color:black;
  }
  .card-pic{
    background-color:white;
  }
</style>
@stop