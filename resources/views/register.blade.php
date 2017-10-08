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

    @if($success == 'true')
      <script>
          swal({
            title: "Account Created!",
            text: "You will be redirected to the login page in a few moment!",
            type: "success",
            timer: 2000,
            showConfirmButton: false
          },function(){
              window.location.href = "{{url('/loginpage')}}";
          });
      </script>
    @endif

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
      <h1 class="loginHeader"> Create an Account </h1>

      <form id="registerform" action="{{url('/register')}}" method="post">
        {{csrf_field()}}

        <div class="form-group form-horizontal">

          <label class="registerlabel">FULL NAME</label> <i style="color:#aaa">(Note: This won't be shown)</i>
          <div class="input-group">
            <span class="input-group-addon fw" id="basic-addon1"><i class="fa fa-address-card fa-fw" aria-hidden="true"></i></span>
            <input type="text" name="fname" class="simpleinput" value="{{old('fname')}}" aria-describedby="basic-addon1" placeholder="First Name">
          </div>
          @if($errors->first('fname'))
            <div style="color:#ff3a28; margin-bottom:-20px; text-align:left;">
              {{$errors->first('fname')}}
            </div>
          @endif
          <br>
          <div class="input-group">
            <span class="input-group-addon fw" id="basic-addon2"><i class="fa fa-address-card fa-fw" aria-hidden="true"></i></span>
            <input type="text" name="lname" class="simpleinput" value="{{old('lname')}}" aria-describedby="basic-addon2" placeholder="Last Name">
          </div>
          @if($errors->first('lname'))
            <div style="color:#ff3a28; margin-bottom:-20px; text-align:left;">
              {{$errors->first('lname')}}
            </div>
          @endif
          <br>

          <label class="registerlabel">ACCOUNT INFO</label>
          <div class="input-group">
            <span class="input-group-addon fw" id="basic-addon1"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
            <input type="text" name="username" class="simpleinput" value="{{old('username')}}" aria-describedby="basic-addon1" placeholder="Username">
          </div>
          @if($errors->first('username'))
            <div style="color:#ff3a28; margin-bottom:-20px; text-align:left;">
              {{$errors->first('username')}}
            </div>
          @endif
          <br>

          <div class="input-group">
            <span class="input-group-addon fw" id="basic-addon2"><i class="fa fa-at fa-fw" aria-hidden="true"></i></span>
            <input type="email" name="email" class="simpleinput" value="{{old('email')}}" aria-describedby="basic-addon2" placeholder="Email">
          </div>
          @if($errors->first('email'))
            <div style="color:#ff3a28; margin-bottom:-20px; text-align:left;">
              {{$errors->first('email')}}
            </div>
          @endif
          <br>

          <div class="input-group">
            <span class="input-group-addon fw" id="basic-addon2"><i class="fa fa-lock fa-fw" aria-hidden="true"></i></span>
            <input type="password" name="password" class="simpleinput" value="{{old('password')}}" aria-describedby="basic-addon2" placeholder="Password">
          </div>
          @if($errors->first('password'))
            <div style="color:#ff3a28; margin-bottom:-20px; text-align:left;">
              {{$errors->first('password')}}
            </div>
          @endif
          <br>

          <input type="submit" name="submit" class="loginButton" value="Register">
        </div>

        <div style="color:#DDDDDD;" class="pull-right">
          Already have an account? <a href="{{url('/loginpage')}}">Login now!</a>
        </div>

      </form>

    </div>
  </div>
</div>
