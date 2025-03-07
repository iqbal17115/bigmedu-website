@extends('backend.layouts.app')
@section('content')
<!-- Default box -->
<div class="card">
	<div class="card-header">
		<h3 class="card-title">{{ isset($editData) ? 'Update' : 'Add' }} User</h3>
		<div class="card-tools">
			{{-- <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button> --}}
			<a href="{{ route('user.list') }}" class="btn btn-sm btn-info" ><i class="fas fa-list"></i> All User</a>
		</div>
	</div>
	<div class="card-body">
		<form method="post" action="{{ isset($editData) ? route('user.update',$editData->id) : route('user.store') }}" enctype="multipart/form-data" id="myForm">
			@csrf
			<div class="form-row">
				<div class="form-group col-sm-4">
					<label class="control-label">Name</label>
					<input type="text" name="name" value="{{@$editData->name}}" class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="Write name">
					@error('name')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Email</label>
					<input type="email" name="email" value="{{@$editData->email}}" class="form-control form-control-sm @error('email') is-invalid @enderror" placeholder="Write email">
					@error('email')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>

				<div class="form-group col-sm-4">
					<label class="control-label">রোল পারমিশন<span style="color: red">*</span></label>
					<select name="user_role[]" id="user_role" class="form-control form-control-sm select2" multiple>							
						@foreach($roles as $role)
						<option value="{{$role->id}}" 
							{{@$role_array? in_array($role->id, array_column($role_array, 'role_id'))?"selected":"":""}}>
							{{$role->name}}
						</option>
						@endforeach
					</select>
				</div>
				<div class="form-group col-sm-6">
					<label class="control-label">Password</label>
					<input type="password" name="password" id="password" value="" class="form-control form-control-sm @error('password') is-invalid @enderror" placeholder="New Password" autocomplete="off">
					@error('password')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group col-sm-6">
					<label class="control-label">Confirm Password</label>
					<input type="password" name="confirm_password" value="" class="form-control form-control-sm @error('confirm_password') is-invalid @enderror" placeholder="Confirm Password" autocomplete="off">
					@error('confirm_password')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
				<div class="col-md-7">
					<label for="image">Image<small style="color: brown"> (Max 2 mb)</small></label>
					<input type="file" name="image" id="image" class="form-control">
				</div>
				<div class="col-md-2">
					@if(@$editData->image)
					<img id="showImage" src="{{asset('public/backend/images/user_images/'.@$editData->image)}}" style="height: 100px; width: 100px; border: 1px solid black">
					@else
					<img id="showImage" src="{{asset('public/backend/images/noimage.png')}}" style="height: 100px; width: 100px; border: 1px solid black">
					@endif
				</div>
				<div class="col-md-3" style="margin-top: 35px;">
					<div class="form-check" style="margin-left: 5px;">
					  <input type="checkbox" name="status" class="form-check-input" id="status" value="1" {{ @$editData->status == 1 ? 'checked':'' }}>
					  <label class="form-check-label" for="status">Status</label>
					</div>
				</div>
				<div class="form-group col-sm-12 mt-sm-auto">
					<button type="submit" class="btn btn-sm btn-info"><i class="fas fa-save"></i> {{ isset($editData) ? 'Update' : 'Save' }}</button>
				</div>
			</div>
		</form>
	</div>
	<!-- /.card-body -->
</div>
<!-- /.card -->

<script type="text/javascript">
	$(document).ready(function () {
		$('#myForm').validate({
			ignore:[],
			errorPlacement: function(error, element){
				if (element.attr("name") == "user_role[]" ){ error.insertAfter(element.next()); }
				else{error.insertAfter(element);}
			},
			errorClass:'text-danger',
			validClass:'text-success',
			rules: {
				'name': {
					required: true,
				},
				'email': {
					required: true,
					email:true
				},
				'user_role[]': {
					required: true
				},
				<?php if(!@$editData){ ?>
				'password': {
					required: true,
					minlength: 5
				},
				'confirm_password': {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
				<?php } ?>
				}
			});
		
		$('#image').change(function (e) { //show Slider Image before upload
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#showImage').attr('src', e.target.result);
			};
			reader.readAsDataURL(e.target.files[0]);
		});
	});
</script>

@endsection