@extends('layouts.app')

@section('content')

<div class="page-wrapper">
	<div class="page-content">

		<!-- title section -->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Specification Types</div>
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
                    <div class="col-md-3">
                        <input type="text" name="title" value="{!! isset($_GET['title']) ? $_GET['title'] : '' !!}" class="form-control" placeholder="Title">
                    </div>
                    <div class="col-md-2">
                        <select name="status" class="form-select">
                            <option value="">-Select Status-</option>
                            <option {!! isset($_GET['status']) && $_GET['status'] == 1 ? 'selected' : '' !!} value="1">Active</option>
                            <option {!! isset($_GET['status']) && $_GET['status'] == 2 ? 'selected' : '' !!} value="2">Inactive</option>
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
							<th scope="col">Title</th>
							<th scope="col">Slug</th>
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
							<td>{!! $list->slug !!}</td>
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
										<li><a class="dropdown-item" href="{!! route('SpecificationTypes Edit', $list->id) !!}">Edit</a>
										</li>
										<li><a class="dropdown-item confirmDelete" href="{!! route('SpecificationTypes Delete', $list->id) !!}">Delete</a>
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

