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
             <livewire:admin.create-post :categories_html="$categories_html"/>
@endsection
