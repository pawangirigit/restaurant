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
                			
            			</div>
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="table-responsive">
											<table class=" table table-boredred">
												<thead>
													<tr>
														<th>Name</th>
														<th>Email</th>
														<th>Phone</th>
														<th>Guest</th>
														<th>Date</th>
														<th>Time</th>
														<th>Message</th>
													</tr>
												</thead>
												<tbody>
													@foreach($list as $k=>$v)
													<tr>
														<td>{{$v->name}}</td>
														<td>{{$v->email}}</td>
														<td>{{$v->phone}}</td>
														<td>{{$v->guest}}</td>
														<td>{{$v->date}}</td>
														<td>{{$v->time}}</td>
														<td>{{$v->message}}</td>
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