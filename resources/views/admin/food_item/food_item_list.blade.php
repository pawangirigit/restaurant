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
            			<div class="page-header flex-wrap">
                			<h3>{{$title}}</h3>
                			<button class="btn"><h3><a href="{{route('form_food_item')}}">Add Food item</a></h3></button>
            			</div>
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="table-responsive">
											<table class=" table table-boredred">
												<thead>
													<tr>
														<th>Sr.No.</th>
														<th>Menu</th>
														<th>Sub-Menu</th>
														<th>Food Item</th>
														<th>Image</th>
														<th>Price</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													@foreach($list as $k=>$v)
													<tr>
														<td>{{$k+1}}</td>
														<td>{{$v->menu}}</td>
														<td>{{$v->sub_menu}}</td>
														<td>{{$v->item_name}}</td>
														<td><img src="{{asset('foodimage/'.$v->image)}}"  alt="Not Updated"></td>
														<td>{{$v->price}}</td>
														<td><button class="btn"><a href="{{route('form_food_item',['update'=>$v->id])}}">Edit</a></button>
															<button class="btn"><a href="{{route('item_delete',['delete'=>$v->id])}}">Delete</a></button>
														</td>
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
  	</body>
</html>
@include('admin.adminjs')