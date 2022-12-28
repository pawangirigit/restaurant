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
					<h3><a href="{{route('form_add_chefs')}}">Add Chefs</a></h3></div>
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-borederd">
										<thead>
											<tr>
												<th>S.No.</th>
												<th>Name</th>
												<th>Email</th>
												<th>Adhar</th>
												<th>Menu</th>
												<th>Image</th>
												<th>Sallery</th>
												<th>Joining Date</th>
												<th>Address</th>
												<th>Contact No.</th>
												<th>Action</th>

											</tr>
										</thead>
										<tbody>
											@foreach($list as $k=>$v)
											<tr>
												<td>{{$k+1}}</td>
												<td>{{$v->name}}</td>
												<td>{{$v->email}}</td>
												<td>{{$v->aadhar}}</td>
												<td>{{$v->menu}}</td>
												<td>{{$v->image}}</td>
												<td>{{$v->sallery}}</td>
												<td>{{$v->joining_date}}</td>
												<td>{{$v->address}}</td>
												<td>{{$v->contact_no}}</td>
												<td><a href="{{route('form_add_chefs',['update'=>$v->id])}}">Edit</a></td>
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
	    </div>
      
    </div>
          @include('admin.adminfooter')
    <!-- End custom js for this page -->
  </body>
</html>
@include('admin.adminjs')