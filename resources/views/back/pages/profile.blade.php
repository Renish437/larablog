@extends('back.layout.pages-layout')
@section('title') Example Page @endsection
@section('content')
<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="title">
									<h4>Profile</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="{{ route('admin.dashboard') }}">Dashboard</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Profile
										</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
				<livewire:admin.profile />
				</div>
				<div class="footer-wrap pd-20 mb-20 card-box">
					DeskApp - Bootstrap 4 Admin Template By
					<a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
				</div>
			</div>
@endsection
{{-- @push('scripts')
<script>
   
     const cropper = new Kropify('input[type="file"][id="profilePictureFile"]', {
            aspectRatio: 1,
            viewMode: 1,
            preview: 'image#profilePicturePreview',
            processURL: '{{ route('admin.update.profile.picture') }}',
            maxSize: 2 * 1024 * 1024, // 2MB
            allowedExtensions: ['jpg', 'jpeg', 'png'],
            showLoader: true,
            animationClass: 'pulse',
            fileName: 'avatar',
            cancelButtonText:'Cancel',
            resetButtonText: 'Reset',
            cropButtonText: 'Crop & Upload',
            maxWoH:500,
            onError: function (msg) {
                alert(msg);
                    const toastMagic = new ToastMagic();

                    toastMagic.error("Error!", msg);
                // toastr.error(msg);
            },
            onDone: function(response){
                const toastMagic = new ToastMagic();


                if(data.status == 1){
// Basic notifications
        toastMagic.success("Success!", "Picture uploaded successfully!");
                }else{
                    toastMagic.error("Error!", "Picture upload failed!");
                }
                alert(response.message);
                console.log(response.data);
                // toastr.success(response.message);
            }
        });
    </script>    
@endpush --}}

@push('scripts')
<script>
    const cropper = new Kropify('input[type="file"][id="profilePictureFile"]', {
        aspectRatio: 1,
        viewMode: 1,
        preview: 'image#profilePicturePreview',
        processURL: '{{ route('admin.update.profile.picture') }}',
        maxSize: 2 * 1024 * 1024,
        allowedExtensions: ['jpg', 'jpeg', 'png'],
        showLoader: true,
        animationClass: 'pulse',
        fileName: 'avatar',
        cancelButtonText: 'Cancel',
        resetButtonText: 'Reset',
        cropButtonText: 'Crop & Upload',
        maxWoH: 255,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        onError: function (msg) {
            const toastMagic = new ToastMagic();
            toastMagic.error("Error!", msg);
        },
        onDone: function (response) {
            const toastMagic = new ToastMagic();
            if (response.status === 1) {
                toastMagic.success("Success!", response.message);
                document.getElementById('profilePicturePreview').src = '{{ asset('images/users') }}/' + response.data;
            } else {
                toastMagic.error("Error!", response.message);
            }
        }
    });
</script>
@endpush