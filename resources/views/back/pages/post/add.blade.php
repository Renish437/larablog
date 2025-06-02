@extends('back.layout.pages-layout')
@section('title') Add Post @endsection
@section('content')
<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4>Form</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="{{ route('admin.dashboard') }}">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Add Post
										</li>
									</ol>
								</nav>
							</div>
							<div class="col-md-6 col-sm-12 text-right">
                                <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">View all Posts</a>
								{{-- <div class="dropdown">
									<a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
										January 2018
									</a>
									<div class="dropdown-menu dropdown-menu-right" style="">
										<a class="dropdown-item" href="#">Export List</a>
										<a class="dropdown-item" href="#">Policies</a>
										<a class="dropdown-item" href="#">View Assets</a>
									</div>
								</div> --}}
							</div>
						</div>
					</div>

                    <form action="{{ route('admin.posts.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data" id="addPostForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-9">
                                <div class="card card-box mb-2">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for=""><b>Title</b></label>
                                            <input type="text" class="form-control" name="title" placeholder="Enter title">
                                               <span class="text-danger error-text title_error"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for=""><b>Content</b></label>
                                            <textarea class="form-control" name="content" placeholder="Enter content" rows="10" cols="30"></textarea>
                                            <span class="text-danger error-text content_error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-box mb-2">
                                    <div class="card-header weight-500">
                                        SEO
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for=""><b>Post meta keywords</b>(Seperated by comma)</label>
                                            <input type="text" name="meta_keywords" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for=""><b>Post meta description</b></label>
                                            <textarea name="meta_description" class="form-control" placeholder="Enter meta description" rows="10" cols="30"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-box mb-2">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for=""><b>Post Category</b></label>
                                            <select name="category" class="form-control">
                                                <option value="">Select Category</option>
                                               {!! $categories_html !!}
                                            </select>
                                            <span class="text-danger error-text category_error"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for=""><b>Post Featured Image</b>:</label>
                                            <input type="file" name="featured_image" class="form-control-file form-control" height="auto">
                                            <span class="text-danger error-text featured_image_error"></span>
                                        </div>
                                        <div class="d-block mb-3" style="max-width: 250px;">
                                            <img src="" class="img-thumbnail" id="featured_image_preview" data-ijabo-default-img="" alt="img_preview">
                                
                                        </div>
                                        <div class="form-group">
                                            <label for="tags"><b>Tags</b></label>
                                            <input type="text" class="form-control" name="tags" placeholder="Enter tags">
                                            {{-- <span class="text-danger error-text tags_error"></span> --}}
                                        </div>
                                        <div class="form-group">
                                            <label for="visibility"><b>Visibility</b>:</label>
                                            <div class="custom-control custom-radio mb-5">
                                                <input type="radio" name="visibility" id="customRadio1" value="1" class="custom-control-input" checked>
                                                <label for="customRadio1" class="custom-control-label">Public</label>
                                            </div>
                                            <div class="custom-control custom-radio mb-5">
                                                <input type="radio" name="visibility" id="customRadio2" value="0" class="custom-control-input">
                                                <label for="customRadio2" class="custom-control-label">Private</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Create Post</button>
                        </div>
                    </form>
@endsection
@push('scripts')
<script>
    $('input[type="file"][name="featured_image"]').ijaboViewer({
        preview:'img#featured_image_preview',
        imageShape:'rectangular',
        allowedExtensions: ['jpg', 'jpeg', 'png'],
        onErrorShape:function(message,element){
            alert(message);
        },
        onInvalidType:function(message,element){
            alert(message);
        },
        onSuccess:function(message,element){
            // console.log(message);
        }


    });
</script>
    
@endpush