<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/bundle.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <style type="text/css" media="screen">
        html, body {
            margin: 0;
            padding: 0 10px;
            width: 100%;
            height: 100%;
            display: table;
        }
        #center {
            display: table-cell;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div id="center">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h5 class="text-center"><span class="glyphicon glyphicon-log-in text-primary"></span> Login SimalaKP</h5>
                        <hr>
                        <form class="form-horizontal" method="POST" id="loginForm" name="loginForm">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Username</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('form_action') ? ' has-error' : '' }}">
                                <label for="form_action" class="col-md-4 control-label">Login Sebagai</label>

                                <div class="col-md-6">
                                    <select id="form_action" onChange="select_change()" class="form-control" required="required">
                                        <option value="">--- Pilih ---</option>
                                        <option value="{{route('login')}}">Mahasiswa</option>
                                        <option value="{{route('login.dospem')}}">Dosen Pembimbing</option>
                                        <option value="{{route('login.pemlap')}}">Pembimbing Lapangan</option>
                                    </select>

                                    @if ($errors->has('form_action'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('form_action') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" onclick="onSubmit()">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer navbar-fixed-bottom">
        <div class="container">
            <p class="text-center text-muted">Muhammad Taupiq &copy; 2017. {{ config('app.name') }}. Sistem Manajemen Laporan Kegiatan Kerja Praktek Mahasiswa.</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        function select_change() {
            var z = document.getElementById("form_action").selectedIndex;
            var z1 = document.getElementsByTagName("option")[z].value;
            console.log("Form action changed to " + z1);
        }
        function onSubmit() {
            var x = document.getElementById("form_action").selectedIndex;
            var action = document.getElementsByTagName("option")[x].value;
            if (action !== "") {
                document.getElementById("loginForm").action = action;
                document.getElementById("loginForm").submit();
            } else {
                alert("Form Belum Lengkap!!");
            }
        }
    </script>
</body>
</html>