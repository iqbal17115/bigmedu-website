@extends('backend.layouts.app')
@section('content')
<!-- Default box -->
<div class="card">
	<div class="card-header">
		<h3 class="card-title">User List</h3>
		<div class="card-tools">
			{{-- <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button> --}}
			<a href="{{ route('user.add') }}" class="btn btn-sm btn-info" ><i class="fas fa-plus"></i> Add User</a>
			<a href="{{ route('user.add_member_to_user') }}" class="btn btn-sm btn-info" ><i class="fas fa-plus"></i> Add Member to User</a>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered table-striped">
				<thead>
					<tr class="text-center">
						<th>Sl.</th>
						<th>Image</th>
						<th>Name</th>
						<th>Email</th>
						<th>Permission</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@if (isset($users) && count($users) > 0)
					@foreach ($users as $u)
					<tr>
						<td>{{ $loop->iteration }}</td>
						@php
							if(!empty($u->member_id))
							{
								$member = DB::table('members')->where('id',@$u->member_id)->first();
							}
						@endphp
						<td>
							@if(!empty(@$u->member_id))
								@if(@$member->image)
								<img src="{{asset('public/upload/members/'.$member->image)}}" height="100px" alt="Image">
								@else
								<img src="{{asset('public/backend/images/noimage.png')}}" width="100px" alt="Image">
								@endif
							@else
								@if(@$u->image)
								<img src="{{asset('public/backend/images/user_images/'.$u->image)}}" height="100px" alt="Image">
								@else
								<img src="{{asset('public/backend/images/noimage.png')}}" width="100px" alt="Image">
								@endif
							@endif
						</td>
						<td>{{ $u->name }}</td>
						<td>{{ $u->email }}</td>
						<td><?php echo AccessRole(@$u->user_role) ?></td>
						<td>
							@if(@$u->status == 1)
								<span class="badge badge-success">Active</span>
							@else
								<span class="badge badge-danger">Inactive</span>
							@endif
						</td>
						<td>
							@if(!empty(@$u->member_id))
							<a href="{{ route('user.edit_member_to_user',$u->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
							@else
							<a href="{{ route('user.edit',$u->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
							@endif
							{{-- <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a> --}}
						</td>
					</tr>
					@endforeach
					@else
					<tr class="text-center bg-danger">
						<td colspan="12" >No Data Found</td>
					</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>
	<!-- /.card-body -->
</div>
<!-- /.card -->
@endsection