@extends('layouts.app2')
@section('title', 'Update | Roles')
@section('content')
<div class="container-fluid">
	<div class="card tab2-card">
		<div class="card-body">
			<ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
				<li class="nav-item"><a class="nav-link active show" id="restriction-tabs" data-bs-toggle="tab"
						href="#restriction" role="tab" aria-controls="restriction" aria-selected="false"
						data-original-title="" title="">Update an Roles</a></li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade active show" id="restriction" role="tabpanel"
					aria-labelledby="restriction-tabs">
					<form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
						@csrf
						@method('PUT')
						<div class="form-group row">
							<label for="validationCustom4" class="col-xl-3 col-md-4">role Name</label>
							<div class="col-md-7">
								<input class="form-control" value="{{$role->name}}" name="name" id="name" type="text">
							</div>
						</div>

						<div class="row">
							<label for="">All Permissions</label>
							{{-- {{ dd($role->permissions) }} --}}
							@forelse ($permissions as $key => $permission)
							@php
							$checkedPer = $role->permissions->where('id', $permission->id)->first();
							@endphp
							<label class="custom-control custom-radio col-3">
								<div class="form-check">
									<label class="form-check-label">
										<input type="checkbox" class="form-check-input" name="permissions[]"
											id="permissions" value="{{ $permission->id }}" {{ $checkedPer ? 'checked' : '' }}>
										{{ $permission->name }}
									</label>
								</div>
							</label>
							@empty

							@endforelse
						</div>

						<div class="form-group row">
							<button type="submit" class="btn btn-primary btn-sm w-25">Submit</button>
							{{-- <input type="submit" class="btn btn-primary"></input> --}}
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection