<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


<style>
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-image {
  /* The image used */
  background-image: url("{{asset('images/photo-wide-3.jpg')}}");

  /* Add the blur effect */
  filter: blur(8px);
  -webkit-filter: blur(8px);

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Position text in the middle of the page/image */
.bg-text {
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
      color: white;
      font-weight: bold;
      border: 3px solid #f1f1f1;
      position: absolute;
        border-bottom: #1a202c;
      top: 200%;
      left: 50%;
    bottom: 30%;
      transform: translate(-50%, -50%);
      z-index: 2;
      width: 90%;
      padding: 70px;
     text-align: center;
    animation: mymove1 3s;
     animation-delay: 2s;
      animation-fill-mode: both;
}
@keyframes mymove1 {
    from {top: 0px; }
    to {top: 200px;}
}

    input:hover{
        opacity: 10%;
    }
    button:hover{
    }
p {
    text-align: center;
    font-size: 60px;
    margin-top: 0px;
}
</style>
</head>
<body >

<div class="bg-image"></div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="exampleModalLongTitle">Screen is Locked!<h5><i class="fas fa-lock"></i></h5>

                <button type="button"  style="margin-left:200px; border:hidden " class="btn btn-outline-danger">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                </button>


                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </p>

            </div>
            <div class="modal-body">

                <div class="bg-text">

                    <h1 style="font-size:50px"></h1>
                    <p>For Unlock enter Password</p>

                    <input id="password" style="" type="password"
                           class="form-control  @error('password') is-invalid @enderror"
                           name="password" required autocomplete="current-password" placeholder="password">
                    <p id="msg"></p>
                    <br>


                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-block" onclick="getMessage()">Unlock!
                    <i class="fa fa-unlock" aria-hidden="true"></i>
                </button>                </div>
        </div>
</body>

</html>
