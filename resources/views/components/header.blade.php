<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>inFavor</title>

    <link rel="stylesheet" type="text/css" media="all" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('css/sweetalert.css')}}">
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('css/font-awesome.min.css')}}">

  </head>

  <body>

    <div class="headerBar">
      <div class="headerTitle">
        <a class="inFavor" href="{{url('/')}}">
          inFavor
        </a>
      </div>
      <div class="headerRight">

        @if(Auth::check())
          <a href="{{url('/signout')}}">Sign Out</a>
        @else
          <a href='#'>Sign in</a>
        @endif


      </div>
    </div>

    <!-- <div class="hidden" id="a1">
      <div class="popover-heading">
        @uberfps
      </div>

      <div class="popover-body">
        This is the body for #1
      </div>
    </div> -->
