<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{ asset('logo/logo.png') }}" type="image/png" />
	<!-- loader-->
	<link href="{{ asset('backend') }}/assets/css/pace.min.css" rel="stylesheet" />
	<script src="{{ asset('backend') }}/assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('backend') }}/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="{{ asset('backend') }}/assets/css/app.css" rel="stylesheet">
	<link href="{{ asset('backend') }}/assets/css/icons.css" rel="stylesheet">
	<title>Password - Reset</title>
</head>

<body>
	<!-- wrapper -->
	<div class="wrapper">
		<div class="authentication-reset-password d-flex align-items-center justify-content-center">
			<div class="row">
				<div class="col-12 col-lg-10 mx-auto">
					<div class="card">
						<div class="row g-0">
							<div class="col-lg-5 border-end">
								<div class="card-body">
                                    <form method="POST" action="{{ route('password.store') }}">
                                        @csrf
                                        <!-- Password Reset Token -->
                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">


                                        <div class="p-5">
                                            <div class="text-start">
                                                <img src="{{ asset('logo/logo.png') }}" width="180" alt="">
                                            </div>
                                            <h4 class="mt-5 font-weight-bold">Genrate New Password</h4>
                                            <p class="text-muted">We received your reset password request. Please enter your new password!</p>

                                            <div class="mb-3 mt-5">
                                                <label class="form-label" for="email">Email</label>
                                                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" />
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="password">New Password</label>
                                                <input type="password" id="password" name="password" class="form-control" placeholder="Enter new password" />
                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="password_confirmation">Confirm Password</label>
                                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm password" />
                                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                            </div>

                                            <div class="d-grid gap-2">
                                                <button type="submit" class="btn btn-primary">Change Password</button> <a href="{{ route('login') }}" class="btn btn-light"><i class='bx bx-arrow-back mr-1'></i>Back to Login</a>
                                            </div>
                                        </div>
                                    </form>
								</div>
							</div>
							<div class="col-lg-7">
								<img src="{{ asset('logo/hs.jpg') }}" class="card-img login-img rounded-3" alt="logo">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
</body>

</html>
