@extends('back.layout.pages-layout')
@section('title') Post Index @endsection
@section('content')
<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4>All Posts</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="{{ route('admin.dashboard') }}">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											All Posts
										</li>
									</ol>
								</nav>
							</div>
							<div class="col-md-6 col-sm-12 text-right">
								<a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
                                    <i class="icon-copy dw dw-add"></i> Add a Post
                                </a>
							</div>
						</div>
					</div>

               <livewire:admin.posts />
@endsection