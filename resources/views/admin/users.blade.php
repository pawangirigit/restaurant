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
            	<div class="page-header flex-wrap"><h3>{{$title}}</h3></div>
				<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table class=" table table-bordered table-hover f14 datatable">
										<thead>
                        					<tr class="bg-primary text-white">
												<td>Sr.No.</td>
												<td>Name</td>
												<td>Email</td>
												<td>Mobile</td>
												<td>User Type</td>
												<td>Action</td>
											</tr>
										</thead>
										<tbody>
											@foreach($list as $k=>$v)
											<tr>
												<td>{{$v->id}}</td>
												<td>{{$v->name}}</td>
												<td>{{$v->email}}</td>
												<td>{{$v->mobile}}</td>

												@if($v->usertype==1)
												<td>Admin</td>
												@else
												<td>User</td>
												@endif

												@if($v->usertype==0)
												<td>
												<button class="btn"><a href="{{route('delete_user',['delete'=>$v->id])}}">Delete</a></button>
												</td>
												@else
												<td><a>Not Allowed</a></td>
												@endif
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
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
