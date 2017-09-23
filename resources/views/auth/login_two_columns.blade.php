<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/login_two_columns.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 May 2017 18:26:25 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>HUMCORP | Login</title>

    <link href="{{ asset('site/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('site/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('site/css/style.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Welcome to IN+</h2>

                <p>
                    Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                </p>

                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                </p>

                <p>
                    When an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </p>

                <p>
                    <small>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</small>
                </p>

            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    <form class="m-t" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <label class="full-width m-b">Iniciar sesión</label>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="number" class="form-control" placeholder="Cédula de Identidad" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="password" name="password" type="password" class="form-control" placeholder="Contraseña" required>

                            @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <button type="submit" class="btn btn-primary block full-width m-b">Entrar</button>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
						</div>
						<a class="btn btn-link" href="{{ route('password.request') }}">
                            <small>Forgot password?</small>
                        </a>                        
                    </form>
                    <li><a href="{{ route('register') }}">Register</a></li>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Copyright Humcorp
            </div>
            <div class="col-md-6 text-right">
               <small>© 2017</small>
            </div>
        </div>
    </div>

</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/login_two_columns.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 May 2017 18:26:25 GMT -->
</html>
