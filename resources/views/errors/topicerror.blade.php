<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>inFavor</title>

    <script src="{{asset('js/jquery-3.1.1.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/bootstrap.js')}}" charset="utf-8"></script>

    <link rel="stylesheet" type="text/css" media="all" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('css/style.css')}}">

  </head>

  <body>

        <div class="headerBar">
          <div class="headerTitle">
            <a class="inFavor" href="{{url('/')}}"> inFavor </a>
          </div>
          <div class="headerRight">
            @if(Auth::check())
              <a href="{{url('/signout')}}">Sign Out</a>
            @else
              <a href='#'>Sign in</a>
            @endif
          </div>
        </div>


<div class="loginContainerOuter">
  <div class="loginContainermiddle">
    <div class="loginContainerinner" align="center" style="color: #aaa; font-family:serif;">

      <h1>OOPS!</h1>

      <h3>It seems that the topic doesn't exist</h3>

    </div>
  </div>
</div>
