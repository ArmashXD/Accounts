    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('lockscreen/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('lockscreen/css/main.css')}}">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-t-85 p-b-20">
					<span class="login100-form-title p-b-70">
						Screen is Locked!
					</span>
                <span class="login100-form-avatar">
						<img src="{{asset('lockscreen/images/avatar-01.jpg')}}" alt="AVATAR">
					</span>

            <span>
                {{Auth()->user()->name}}
            </span><br><br>
                <form method="POST" action="{{ route('lock.index-post') }}" aria-label="{{ __('Locked') }}">
                    @csrf
                    <div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
                        <input class="input100" type="password" name="password" required="required"/>

                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn " type="submit">
                            {{ __('Unlock') }}
                        </button>
                    </div>
                </form>
                <ul class="login-more p-t-190">
                    <li class="m-b-8">
							<span class="txt1">
								Dont you want to stay Login AnyMore?
							</span>
                        <a href="{{ route('logout') }}" class="txt2" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>

        </div>
    </div>
</div>



</body>
</html>
