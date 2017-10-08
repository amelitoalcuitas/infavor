<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>inFavor</title>

    <script src="{{asset('js/jquery-3.1.1.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/bootstrap.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/jquery.timeago.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/sweetalert.min.js')}}" charset="utf-8"></script>

    <link rel="stylesheet" type="text/css" media="all" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('css/sweetalert.css')}}">
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('css/font-awesome.min.css')}}">

  </head>

  <body>

        <div class="headerBar">
          <div class="headerTitle">
            <a class="inFavor" href="{{url('/')}}"> inFavor </a>
          </div>
          <div class="headerRight">

          </div>
        </div>


<div class="loginContainerOuter">
  <div class="loginContainermiddle">
    <div class="loginContainerinner">
      <h1 class="loginHeader"> Sign into inFavor </h1>

      <form class="" action="{{url('/login')}}" method="post">
        {{csrf_field()}}

        <div class="form-group form-horizontal">

          @if(session('loginerror'))
            <div style="color:#ff3a28; text-align:center;"> {{session('loginerror')}} </div>
          @elseif($errors)
            <div style="color:#ff3a28; text-align:center;">
              @foreach($errors->all() as $error)
                {{$error}}<br>
              @endforeach
            </div>
          @endif

          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
            <input type="text" name="username" class="simpleinput" value="" aria-describedby="basic-addon1" placeholder="Username">
          </div>

          <br>

          <div class="input-group">
            <span class="input-group-addon" id="basic-addon2"><i class="fa fa-lock fa-fw" aria-hidden="true"></i></span>
            <input type="password" name="password" class="simpleinput" value="" aria-describedby="basic-addon2" placeholder="Password">
          </div>

          <br>

          <input type="submit" name="submit" class="loginButton" value="Login">
        </div>

        <div style="color:#DDDDDD;" class="pull-right">
          No account yet? <a href="{{url('/registerpage')}}">Register now!</a>
        </div>

      </form>

    </div>
  </div>
</div>
