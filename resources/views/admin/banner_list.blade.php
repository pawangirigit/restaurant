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
                			<h3>Banner</h3>
                			<h3><a href="{{route('form_upload_banner')}}">Add Banner</a></h3>
            			</div>
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="table-responsive">
											<table class=" table table-boredred">
												<thead>
													<tr>
														<th>Sr.No.</th>
														<th>Banner</th>
													</tr>
												</thead>
												<tbody>
													@foreach($banner as $k=>$v)
													<tr>
														<td>{{$k+1}}</td>
														<td><img src="{{asset('banner/'.$v->image)}}"  alt="Not Updated"></td>
														<td><a href="{{route('delete_banner',['delete'=>$v->id])}}">Delete</a></td>
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