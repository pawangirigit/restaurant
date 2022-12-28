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
            	<div class="page-header flex-wrap"><h3>Meal Time</h3>
				<h3><button class="btn"><a href="{{route('meal_time_list')}}">Back</a></button></h3>
			</div>
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
							<table class="table-responsive">
										<thead>
											<tr>
												<th>Sr. No.</th>
												<th>Menu</th>
												<th>Sub Menu</th>
												<th>Food Item</th>
												<th>Meal Time</th>
												<th>Price</th>
											</tr>
										</thead>
										<tbody>
											@foreach($list as $k=>$v)
											<tr>
												<td>{{$k+1}}</td>
												<td>{{$v->menu}}</td>
												<td>{{$v->sub_menu}}</td>
												<td>{{$v->item_name}}</td>
												<td>{{$v->meal_time}}</td>
												<td>{{$v->price}}</td>
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
          @include('admin.adminfooter')
    <!-- End custom js for this page -->
  </body>
</html>
@include('admin.adminjs')

<script>
    $(document).ready(function(){
      $('#menu_id').change(function(){
        let mid=$(this).val();
        $.ajax({
            type:'post',
            url:'/ajax_getsubmenu',
            data:'mid='+mid+'&_token={{csrf_token()}}',
            success:function(result){
				$('#sub_menu_id').html(result)
            }
        });
    });

	$('#sub_menu_id').change(function(){
        let mid=$(this).val();
        $.ajax({
            type:'post',
            url:'/ajax_getitem',
            data:'mid='+mid+'&_token={{csrf_token()}}',
            success:function(result){
				$('#item_id').html(result)
            }
        });
    });
});
</script>