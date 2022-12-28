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
			<h3><button><a href="{{route('add_sub_menu')}}">Add Sub-menu</a></button></h3></div>
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table class=" table table-borederd">
                  						<thead>
											<tr>
												<th>Sr.No.</th>
												<th>Menu</th>
												<th>Sub-Menu</th>
												<th>Image</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											@foreach($list as $k=>$v)
											<tr>
												<td>{{$k+1}}</td>
												<td>{{$v->menu}}</td>
												<td>{{$v->sub_menu}}</td>
												<td><img src="{{asset('foodimage/'.$v->image)}}"  alt="Not Updated"></td>
												<td><button class="btn"><a href="{{route('add_sub_menu',['update'=>$v->id])}}">Edit</a></button>
												<button class="btn"><a href="{{route('sub_menu_delete',['delete'=>$v->id])}}">Delete</a></button></td>
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