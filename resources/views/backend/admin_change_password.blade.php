@extends('backend.master')
@section('main-content')

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Change Password</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">

            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-xl-6">
						<div class="card border-top border-0 border-4 border-danger">
							<div class="card-body p-5">
								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-lock me-1 font-22 text-danger"></i>
									</div>
									<h5 class="mb-0 text-danger">Change Password</h5>
								</div>
								<hr>
								<form class="row g-3" action="{{ route('update.password') }}" method="POST">
                                    @csrf
									<div class="col-12">
										<label for="oldPwd" class="form-label">Old Password</label>
										<div class="input-group"> <span class="input-group-text bg-transparent"><i class="bx bxs-lock-open"></i></span>
											<input type="password" class="form-control border-start-0" name="oldPwd" id="oldPwd" placeholder="Old Password">
										</div>
                                        <x-input-error :messages="$errors->get('oldPwd')" class="mt-2 text-danger" />
									</div>
									<div class="col-12">
										<label for="newPwd" class="form-label">New Password</label>
										<div class="input-group"> <span class="input-group-text bg-transparent"><i class="bx bxs-lock-open"></i></span>
											<input type="password" class="form-control border-start-0" name="newPwd" id="newPwd" placeholder="New Password">
										</div>
                                        <x-input-error :messages="$errors->get('newPwd')" class="mt-2 text-danger" />
									</div>
									<div class="col-12">
										<label for="confirmPwd" class="form-label">Confirm Password</label>
										<div class="input-group"> <span class="input-group-text bg-transparent"><i class="bx bxs-lock"></i></span>
											<input type="password" class="form-control border-start-0" name="confirmPwd" id="confirmPwd" placeholder="Confirm Password">
										</div>
                                        <x-input-error :messages="$errors->get('confirmPwd')" class="mt-2 text-danger" />
									</div>
									<div class="col-12">
										<button type="submit" class="btn btn-outline-danger px-4">Update Password</button>
									</div>
								</form>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>

@endsection
