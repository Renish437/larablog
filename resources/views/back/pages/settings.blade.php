@extends('back.layout.pages-layout')
@section('title') Settings Page @endsection
@section('content')
<div class="page-header">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="title">
									<h4>Tabs</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="{{ route('admin.dashboard') }}">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Settings
										</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>


                    <div class="pd-20 card-box">
								<h5 class="h4 text-blue mb-20">Tab Settings</h5>
							<livewire:admin.settings />
							</div>
@endsection