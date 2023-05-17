@extends('layouts.app')

@section('content')

<div class="page-wrapper">
	<div class="page-content">

		<!-- title section -->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Products</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="{!! url('/') !!}"><i class="bx bx-home-alt"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Stock</li>
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
					<form method="post" action="{!! route('Products Stock Update', $dataInfo->id) !!}" enctype="multipart/form-data">
						@csrf

						<h6>Update Stock: {!! $dataInfo->title !!}</h6>
						<hr>

						<div class="row mb-3">
							<div class="col-sm-12">
								<div style="position: relative;">
									<span class="position-absolute top-0 translate-middle badge rounded-pill bg-primary">ITEM 01</span>
									<table class="table table-bordered">
										<thead>
											<tr style="background-color: #e9ecef">
												<th width="25%">Specification *</th>
												<th>Detail *</th>
											</tr>
										</thead>
										<tbody>
											@if(!empty($specTypes) && (count($specTypes)>0))
											@foreach($specTypes as $key => $list)
											<tr>
												<td><input type="text" name="items[0][{{$list->id}}]" value="{!! $list->title !!}" class="form-control" readonly="readonly"></td>
												<td><input type="text" name="items[0][{{$list->id}}]" class="form-control" placeholder="Spec Detail" required="required"></td>
											</tr>
											@endforeach
											@endif
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-9">
								<button class="btn btn-outline-warning"><i class="bx bx-plus"></i> Add New Item</button>
								<button type="submit" class="btn btn-outline-primary px-5">Save</button>
								<a href="{!! route('Products') !!}" class="btn btn-outline-danger px-3">Cancel</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
</div>

@endsection
