@extends('backend.layouts.app')
@section('content')
<!-- Default box -->
<div class="card">
	<div class="card-header">
		<h3 class="card-title">{{ isset($editData) ? 'Update' : 'Add' }} Member to User</h3>
		<div class="card-tools">
			{{-- <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button> --}}
			<a href="{{ route('user.list') }}" class="btn btn-sm btn-info" ><i class="fas fa-list"></i> All User</a>
		</div>
	</div>
	<div class="card-body">
		<form method="post" action="{{ isset($editData) ? route('user.update_member_to_user',$editData->id) : route('user.store_member_to_user') }}" enctype="multipart/form-data" id="myForm">
			@csrf
			<div class="form-row">
				<div class="form-group col-sm-5">
                    <label class="control-label">Member</label>
                    <select id="member_id" {{ !empty($editData) ? "disabled" : "" }} class="form-control form-control-sm select2" name="member_id">
                        <option value="" disabled selected>Select Member</option>
						@if(!empty($editData))
						<option selected value="{{ $editData->member_id }}" >{{ $member->name }}</option>
						@else
							@foreach($members as $member)
								<option @if( !empty($editData) && $editData->member_id == $member->id) selected @endif value="{{ $member->id }}" >{{ $member->name }}</option>                 
							@endforeach
						@endif

                    </select>
                    <style>
                        .select2-container .select2-selection--single {
                            height: 34px;
                        }
                    </style>
				</div>
				<div class="form-group col-sm-5">
					<label class="control-label">Email</label>
				<input id="member_email" type="" name="" value="{{ !empty($editData) ? $member->email : "" }}" class="form-control form-control-sm" readonly>
				</div>
				<div class="col-md-2" style="margin-top: 35px;">
					<div class="form-check" style="margin-left: 5px;">
					  <input type="checkbox" name="status" class="form-check-input" id="status" value="1" {{ @$editData->status == 1 ? 'checked':'' }}>
					  <label class="form-check-label" for="status">Status</label>
					</div>
				</div>
				<div class="form-group col-sm-4" >
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
                <div class="form-group col-sm-4">
					<label class="control-label">Login Email</label>
					<input type="email" name="email" value="{{@$editData->email}}" class="form-control form-control-sm @error('email') is-invalid @enderror" placeholder="Write email">
					@error('email')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Password</label>
					<input type="password" name="password" id="password" value="" class="form-control form-control-sm @error('password') is-invalid @enderror" placeholder="New Password" autocomplete="off">
					@error('password')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group col-sm-4">
					<label class="control-label">Confirm Password</label>
					<input type="password" name="password_confirmation" value="" class="form-control form-control-sm @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password" autocomplete="off">
					@error('password_confirmation')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
				{{-- <div class="col-md-4">
					<label for="image">Image</label>
					<input type="file" name="image" id="image" class="form-control">
				</div> --}}
				{{-- <div class="col-md-4">
					@if(@$member->image)
					<img id="showImage" src="{{asset('public/upload/members/'.@$member->image)}}" style="height: 100px; width: 100px; border: 1px solid black">
					@else
					<img id="showImage" src="{{asset('public/backend/images/noimage.png')}}" style="height: 100px; width: 100px; border: 1px solid black">
					@endif
				</div> --}}
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
				'password_confirmation': {
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

        $(document).on('select change','#member_id',function(){
            var member_id = $('#member_id').val();
            console.log(member_id);
            $.ajax({
                url: "{{ route('member_wise_email') }}",
                type: "GET",
                data: { member_id: member_id },
                success: function(data)
                {
                    //console.log(data);
                    if(data != 'fail')
                    {   console.log(data);
                        $('#member_email').val(data.email);
                    }
                    else
                    {
                        console.log('failed');
                    }
                }
            });
        });
	});
</script>

@endsection