@extends('back.layout.auth-layout')

@section('title') Reset Password page @endsection
@section('content')
<div class="login-box bg-white box-shadow border-radius-10">
							<div class="login-title">
								<h2 class="text-center text-primary">Reset Password</h2>
							</div>
							<h6 class="mb-20">Enter your new password, confirm and submit</h6>
                            <x-form-alerts  />
<form action="{{ route('admin.reset.password.handler') }}" method="POST">
    @csrf
    <!-- Debug token presence -->
    @if(!request()->route('token'))
        <span class="text-danger ml-1">Error: No reset token provided. <a href="{{ route('forgot') }}">Request a new password reset link</a>.</span>
    @endif

    <!-- Hidden token field -->
    <input type="hidden" name="token" value="{{ request()->route('token') ?? '' }}">

    <!-- New Password -->
    <div class="input-group custom mb-1">
        <label for="new_password" class="sr-only">New Password</label>
        <input type="password" class="form-control form-control-lg" id="new_password" 
               placeholder="New Password" name="new_password" required>
        <div class="input-group-append custom">
            <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
        </div>
    </div>
    @error('new_password')
        <span class="text-danger ml-1">{{ $message }}</span>
    @enderror

    <!-- Confirm New Password -->
    <div class="input-group custom mb-1 mt-3">
        <label for="new_password_confirmation" class="sr-only">Confirm New Password</label>
        <input type="password" class="form-control form-control-lg" id="new_password_confirmation" 
               placeholder="Confirm New Password" name="new_password_confirmation" required>
        <div class="input-group-append custom">
            <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
        </div>
    </div>
    @error('new_password_confirmation')
        <span class="text-danger ml-1">{{ $message }}</span>
    @enderror

    <!-- Token Error -->
    @error('token')
        <span class="text-danger ml-1">{{ $message }}</span>
    @enderror

    <!-- Submit Button -->
    <div class="row align-items-center mt-2">
        <div class="col-5">
            <div class="input-group mb-0">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
            </div>
        </div>
    </div>
</form>
						</div>
@endsection