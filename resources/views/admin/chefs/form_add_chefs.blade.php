<x-app-layout>
    
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.admincss')
   
  </head>
  <body>
  <div class="container-scroller">
      @include('admin.adminnav')
      <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
          	<div class="content-wrapper pb-0">
            	<div class="page-header flex-wrap"><h3>{{$title}}</h3>
				<h3><a href="{{route('chefs')}}">Back</a></h3></div>
              <div class="col-md-12">
				<div class="card">
					<div class="card-body">
					<form action="{{route('post_add_chefs')}}" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id" value="{{request()->update}}">
						@csrf
						<div class="row">
							<div class="col-md-6 mb-2">
								<label for="">Name</label>
								<input type="text" name="name" value="{{$update->name ?? ''}}" class="form-control">
							</div>
							<div class="col-md-6 mb-2">
								<label for="">Menu</label>
								<input type="text" name="menu" value="{{$update->menu ?? ''}}" class="form-control">
							</div>
							<div class="col-md-6 mb-2">
								<label for="">Image</label>
								<input type="text" name="image" value="{{$update->image ?? ''}}"/>
								<input type="file" name="image" class="form-control" >
								<span class="text-danger">
									@error('image')
									{{$message}}
									@enderror
								</span>
							</div>
							<div class="col-md-6 mb-2">
								<label for="">Sallery</label>
								<input type="text" name="sallery" value="{{$update->joining_date ?? ''}}" class="form-control">
							</div>
							<div class="col-md-6 mb-2">
								<label for="">Joining Date</label>
								<input type="date" name="joining_date" value="{{$update->joining_date ?? ''}}" class="form-control">
							</div>
							<div class="col-md-6 mb-2">
								<label for="">Address</label>
								<input type="text" name="address" value="{{$update->address ?? ''}}" class="form-control">
							</div>
							<div class="col-md-6 mb-2">
								<label for="">Contact</label>
								<input type="text" name="contact_no" value="{{$update->contact_no ?? ''}}" class="form-control">
							</div>
							<div class="col-md-6 mb-2">
								<label for="">Email</label>
								<input type="text" name="email" value="{{$update->email ?? ''}}" class="form-control">
							</div>
							<div class="col-md-6 mb-2">
								<label for="">Adhar</label>
								<input type="text" name="aadhar" value="{{$update->aadhar ?? ''}}" class="form-control">
							</div>
						</div>
						<button class="btn btn-{{!empty($update) ? 'danger' : 'primary'}}" type="submit">{{!empty($update) ? 'Update' : 'Add'}}</button>
					</form>
					</div>
				</div>
				</div>
          	</div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
          @include('admin.adminfooter')
    <!-- End custom js for this page -->
  </body>
</html>
@include('admin.adminjs')