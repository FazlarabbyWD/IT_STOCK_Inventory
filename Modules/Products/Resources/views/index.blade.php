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
						<li class="breadcrumb-item active" aria-current="page">List</li>
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

		<!-- search -->
		<div class="card">
			<div class="card-body">
				<form method="get" class="row g-3">
					<div class="col-md-2">
						<input type="text" name="title" value="{!! isset($_GET['title']) ? $_GET['title'] : '' !!}" class="form-control" placeholder="Product Title">
					</div>

					<div class="col-md-2">
						<select name="category_id" class="form-select" id="category_id">
							<option value="">-Select Category-</option>
							@if(!empty($categories) && (count($categories)>0))
							@foreach($categories as $key => $list)
							<option {!! isset($_GET['category_id']) && $_GET['category_id'] == $list->id ? 'selected' : '' !!} value="{!! $list->id !!}">{!! $list->title !!}</option>
							@endforeach
							@endif
						</select>
					</div>

					<div class="col-md-2">
						<select name="brand_id" class="form-select" id="brand_id">
							<option value="">-Select Brand-</option>
							@if(!empty($brands) && (count($brands)>0))
							@foreach($brands as $key => $list)
							<option {!! isset($_GET['brand_id']) && $_GET['brand_id'] == $list->id ? 'selected' : '' !!} value="{!! $list->id !!}">{!! $list->title !!}</option>
							@endforeach
							@endif
						</select>
					</div>

					<div class="col-md-2">
						<select name="company_id" class="form-select" id="company_id">
							<option value="">-Select Company-</option>
							@if(!empty($companies) && (count($companies)>0))
							@foreach($companies as $key => $list)
							<option {!! isset($_GET['company_id']) && $_GET['company_id'] == $list->id ? 'selected' : '' !!} value="{!! $list->id !!}">{!! $list->title !!}</option>
							@endforeach
							@endif
						</select>
					</div>
					<div class="col-md-2">
						<button class="btn btn-outline-success" type="submit"><i class="lni lni-search"></i></button>
					</div>
				</form>
			</div>
		</div>

		<!-- content section -->
		<div class="card">
			<div class="card-body">
				<table class="table mb-0 table-hover align-middle">
					<thead class="table-light">
						<tr>
							<th scope="col">SL</th>
							<th scope="col">Product Title</th>
							<th scope="col">Stock</th>
							<th scope="col">Category</th>
							<th scope="col">Brand</th>
							<th scope="col">Company</th>
							<th scope="col">Create</th>
							<th scope="col">Update</th>
							<th scope="col">Status</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						@if(!empty($lists) && (count($lists)>0))
						@foreach($lists as $key => $list)
						<tr>
							<td scope="row">{!! $key+1 !!}</td>
							<td>{!! $list->title !!}</td>
							<td>0</td>
							<td>{!! !empty($list->categoryInfo) ? $list->categoryInfo->title : '--' !!}</td>
							<td>{!! !empty($list->brandInfo) ? $list->brandInfo->title : '--' !!}</td>
							<td>{!! !empty($list->companyInfo) ? $list->companyInfo->title : '--' !!}</td>
							<td>
								{!! $list->createdBy->name  !!}<br>
								{!! date('d M Y, H:i', strtotime($list->created_at))  !!}
							</td>
							<td>
								@if(!empty($list->updatedBy))
								{!! $list->updatedBy->name  !!}<br>
								{!! date('d M Y, H:i', strtotime($list->updated_at))  !!}
								@endif
							</td>
							<td><div class="badge rounded-pill bg-light-info {!! $list->status == 1 ? 'text-success' : 'text-info' !!}">{!! $list->status == 1 ? 'Active' : 'Inactive' !!}</div></td>
							<td>
								<div class="dropdown">
									<button class="btn btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-horizontal-rounded"></i></button>
									<ul class="dropdown-menu" style="margin: 0px;">
										<li><a class="dropdown-item" href="{!! route('Products Edit', $list->id) !!}">Edit</a>
										</li>
										<li><a class="dropdown-item" href="{!! route('Products Stock Create', $list->id) !!}">Stock</a></li>
										<li><a class="dropdown-item confirmDelete" href="{!! route('Products Delete', $list->id) !!}">Delete</a>
										</li>
									</li>
								</ul>
							</div>
						</td>
					</tr>
					@endforeach
					@endif
				</tbody>
			</table>

			@if(!empty($lists) && (count($lists)>0))
			<div class="col-12 mt-3"><div class="float-end">{!! $lists->links() !!}</div></div>
			@endif

		</div>
	</div>

</div>
</div>

@endsection

