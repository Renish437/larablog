@extends('back.layout.pages-layout')
@section('title') Post Edit @endsection
@section('content')
<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4>Edit Posts</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="{{ route('admin.dashboard') }}">Home</a>
										</li>
										<li class="breadcrumb-item">
											<a href="{{ route('admin.posts.index') }}">Posts</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Edit Post
										</li>
									</ol>
								</nav>
							</div>
							<div class="col-md-6 col-sm-12 text-right">
								<a href="{{ route('admin.posts.index') }}" class="btn btn-primary">
                                    <i class="icon-copy dw dw-add"></i> Back
                                </a>
							</div>
						</div>
					</div>
               

               <livewire:admin.post-edit :categories_html="$categories_html" :post="$post" />

@endsection