@extends('back.layout.auth-layout')
@section('title') Register @endsection
@section('content')
<div class="login-box bg-white box-shadow border-radius-10">
							<div class="login-title">
								<h2 class="text-center text-primary">Login To DeskApp</h2>
							</div>
							<form action="{{ route('admin.register.handler') }}" method="POST">
                                @csrf
                                <x-form-alerts></x-form-alerts>
						
								<div class="input-group custom mb-1 ">
									<input
										type="text"
										class="form-control form-control-lg"
										placeholder="Enter Your Name"
                                        name="name"
                                        value="{{ old('name') }}"
									/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="icon-copy dw dw-user1"></i
										></span>
									</div>
								</div>
                                @error('name')
                                    <span class="text-danger ml-1">{{ $message }}</span>
                                @enderror
								<div class="input-group custom mb-1 ">
									<input
										type="text"
										class="form-control form-control-lg"
										placeholder="Email"
                                        name="email"
                                        value="{{ old('email') }}"
									/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="icon-copy dw dw-mail"></i
										></span>
									</div>
								</div>
                                @error('email')
                                    <span class="text-danger ml-1">{{ $message }}</span>
                                @enderror
								<div class="input-group custom mb-1 ">
									<input
										type="password"
										class="form-control form-control-lg"
										placeholder="**********"
                                        `
                                        name="password"
									/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="dw dw-padlock1"></i
										></span>
									</div>
								</div>
                                @error('password')
                                    <span class="text-danger ml-1 ">{{ $message }}</span>
                                @enderror
								<div class="input-group custom mb-1 ">
									<input
										type="password"
										class="form-control form-control-lg"
										placeholder="**********"
                                        `
                                        name="password_confirmation"
									/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="dw dw-padlock1"></i
										></span>
									</div>
								</div>
                                @error('password_confirmation')
                                    <span class="text-danger ml-1 ">{{ $message }}</span>
                                @enderror
								<div class="row pb-30">
									<div class="col-6">
										<div class="custom-control custom-checkbox">
											<input
												type="checkbox"
												class="custom-control-input"
												id="customCheck1"
											/>
											<label class="custom-control-label" for="customCheck1"
												>Remember</label
											>
										</div>
									</div>
									<div class="col-6">
										<div class="forgot-password">
											<a href="{{ route('admin.forgot') }}">Forgot Password</a>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="input-group mb-0">
											<!--
											use code for form submit
											<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
										-->
											<button type="submit" class="btn btn-primary btn-lg btn-block">
												
												
												Register
                                    </button>
										</div>
										<div
											class="font-16 weight-600 pt-10 pb-10 text-center"
											data-color="#707373"
										>
											OR
										</div>
										<div class="input-group mb-0">
											<a
												class="btn btn-outline-primary btn-lg btn-block"
												href="register.html"
												>Sign In</a
											>
										</div>
									</div>
								</div>
							</form>
						</div>
@endsection