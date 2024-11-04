<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('logo/logo.png') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('backend') }}/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="{{ asset('backend') }}/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="{{ asset('backend') }}/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('backend') }}/assets/css/pace.min.css" rel="stylesheet" />
    <script src="{{ asset('backend') }}/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('backend') }}/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/assets/css/app.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/assets/css/icons.css" rel="stylesheet">
    <title>Protfolio - Login</title>
</head>

<body class="bg-login">
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
                    <div class="col mx-auto">
                        <div class="mb-4 text-center">
                            <img src="{{ asset('logo/logo.png') }}" width="130" alt="logo" />
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center">
                                        <h3 class="">Login</h3>
                                        <p>Don't have an account yet? <a href="{{ asset('register') }}">Sign up
                                                here</a>
                                        </p>
                                    </div>
                                    {{-- <div class="d-grid">
                                        <a class="btn my-4 shadow-sm btn-white" href="javascript:;"> <span
                                                class="d-flex justify-content-center align-items-center">
                                                <img class="me-2"
                                                    src="{{ asset('backend') }}/assets/images/icons/search.svg"
                                                    width="16" alt="Image Description">
                                                <span>Sign in with Google</span>
                                            </span>
                                        </a> <a href="javascript:;" class="btn btn-facebook"><i
                                                class="bx bxl-facebook"></i>Sign in with Facebook</a>
                                    </div>
                                    <div class="login-separater text-center mb-4"> <span>OR SIGN IN WITH EMAIL</span>
                                        <hr />
                                    </div> --}}
                                    <div class="form-body">
                                            <form method="POST" action="{{ route('login') }}" class="row g-3">
                                                @csrf

                                            <div class="col-12">
                                                <label for="email" class="form-label">Email Address</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    placeholder="Email Address">
                                                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                                            </div>

                                            <div class="col-12">
                                                <label for="password" class="form-label">Enter
                                                    Password</label>
                                                <div class="input-group" id="password">
                                                    <input type="password" class="form-control border-end-0"
                                                        id="password" name="password"
                                                        placeholder="Enter Password"> <a href="javascript:;"
                                                        class="input-group-text bg-transparent"><i
                                                            class='bx bx-hide'></i></a>
                                                </div>
                                                <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="remember_me" checked name="remember">
                                                    <label class="form-check-label"
                                                        for="remember_me">Remember Me</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-end"> <a
                                                    href="{{ route('password.email') }}">Forgot Password ?</a>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary"><i
                                                            class="bx bxs-lock-open"></i>Login</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="{{ asset('backend') }}/assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="{{ asset('backend') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <!--Password show & hide js -->
    <script>
        $(document).ready(function () {
            $("#show_hide_password a").on('click', function (event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });

    </script>
    <!--app JS-->
    <script src="{{ asset('backend') }}/assets/js/app.js"></script>
</body>

</html>
