@extends('layouts.app')

@section('content')

<div class="page-wrapper">
	<div class="page-content">

		<!-- title section -->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Contacts</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="{!! url('/') !!}"><i class="bx bx-home-alt"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Create</li>
					</ol>
				</nav>
			</div>
		</div>

		@if(Session::has('successMessage'))
		<div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">
			<div class="d-flex align-items-center">
				<div class="font-35 text-success"><i class="bx bxs-check-circle"></i>
				</div>
				<div class="ms-3">
					<h6 class="mb-0 text-success">Success Alerts</h6>
					<div>{!! Session::get('successMessage') !!}</div>
				</div>
			</div>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		@endif

		@if(Session::has('errorMessage'))
		<div class="alert border-0 border-start border-5 border-danger alert-dismissible fade show py-2">
			<div class="d-flex align-items-center">
				<div class="font-35 text-danger"><i class="bx bxs-message-square-x"></i>
				</div>
				<div class="ms-3">
					<h6 class="mb-0 text-danger">Error Alerts</h6>
					<div>{!! Session::get('errorMessage') !!}</div>
				</div>
			</div>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		@endif


		<!-- content section -->
		<div class="card">
			<div class="card-body p-5">
				<div class="border p-4 rounded">
					<form method="post" action="{!! route('Contacts Store') !!}" enctype="multipart/form-data">
						@csrf

						<div class="row mb-3">
							<label for="company_id" class="col-sm-3 col-form-label">Company</label>
							<div class="col-sm-9">
								<select name="company_id" class="form-select" id="company_id">
									<option value="">-Select Company-</option>
									@if(!empty($companies) && (count($companies)>0))
									@foreach($companies as $key => $list)
									<option {!! old('company_id') == $list->id ? 'selected' : '' !!} value="{!! $list->id !!}">{!! $list->title !!}</option>
									@endforeach
									@endif
								</select>
								@error('company_id')
								<b>{{ $message }}</b>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="title" class="col-sm-3 col-form-label">Title *</label>
							<div class="col-sm-9">
								<input type="text" name="title" value="{!! old('title') !!}" id="title" class="form-control" placeholder="Title" required="required">
								@error('title')
								<b>{{ $message }}</b>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="code" class="col-sm-3 col-form-label">Code</label>
							<div class="col-sm-9">
								<input type="text" name="code" value="{!! old('code') !!}" id="code" class="form-control" placeholder="Code">
								@error('code')
								<b>{{ $message }}</b>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="bio" class="col-sm-3 col-form-label">Bio</label>
							<div class="col-sm-9">
								<input type="text" name="bio" value="{!! old('bio') !!}" id="bio" class="form-control" placeholder="Bio">
								@error('bio')
								<b>{{ $message }}</b>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="contact" class="col-sm-3 col-form-label">Contact</label>
							<div class="col-sm-9">
								<input type="text" name="contact" value="{!! old('contact') !!}" id="contact" class="form-control" placeholder="Contact">
								@error('contact')
								<b>{{ $message }}</b>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="email" class="col-sm-3 col-form-label">Email</label>
							<div class="col-sm-9">
								<input type="email" name="email" value="{!! old('email') !!}" id="email" class="form-control" placeholder="Email">
								@error('email')
								<b>{{ $message }}</b>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="address" class="col-sm-3 col-form-label">Address</label>
							<div class="col-sm-9">
								<input type="text" name="address" value="{!! old('address') !!}" id="address" class="form-control" placeholder="Address">
								@error('address')
								<b>{{ $message }}</b>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="photo" class="col-sm-3 col-form-label">Photo</label>
							<div class="col-sm-9">
								<input type="file" name="photo" class="form-control" id="photo" placeholder="Photo">
								@error('photo')
								<b>{{ $message }}</b>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="signature" class="col-sm-3 col-form-label">Signature</label>
							<div class="col-sm-9">
								<input type="file" name="signature" class="form-control" id="signature" placeholder="Signature">
								@error('signature')
								<b>{{ $message }}</b>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="status" class="col-sm-3 col-form-label">Status *</label>
							<div class="col-sm-9">
								<select name="status" class="form-select" id="status" required="required">
									<option {!! old('status') == 1 ? 'selected' : '' !!} value="1">Active</option>
									<option {!! old('status') == 2 ? 'selected' : '' !!} value="2">Inactive</option>
								</select>
								@error('status')
								<b>{{ $message }}</b>
								@enderror
							</div>
						</div>

						<div class="row">
							<label class="col-sm-3 col-form-label"></label>
							<div class="col-sm-9">
								<button type="submit" class="btn btn-outline-primary px-5">Save</button>
								<a href="{!! route('Contacts') !!}" class="btn btn-outline-danger px-3">Cancel</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
</div>

@endsection
