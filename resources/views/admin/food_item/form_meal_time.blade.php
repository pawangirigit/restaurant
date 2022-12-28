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
            	<div class="page-header flex-wrap"><h3></h3>
				<h3><button class="btn"><a href="{{route('meal_time_list')}}">Back</a></button></h3>
			</div>
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
							
								<form action="{{route('post_meal_time')}}" method="post" enctype="multipart/form-data">
									
									@csrf
									<div class="row">
										<div class="col-md-4">
											<label for="">Menu</label>
											<select name="menu_id" id="menu_id" value=""  class="form-control">
												@foreach(DB::table('menu')->get() as $k=>$v)
												<option value="{{$v->id}}" {{isset($update->menu_id) ? ($update->menu_id == $v->id ? 'Selected' : '') : ''}}>{{$v->menu}}</option>
												@endforeach
											</select>
										</div>
										<div class="col-md-4">
											<label for="">Sub-menu</label>
											<select name="sub_menu_id" id="sub_menu_id" class="form-control">
                  								
											</select>

										</div>
										<div class="col-md-4">
											<label for="">Food Item</label>
											<select name="item_id" id="item_id" class="form-control">
												
											</select>
										</div>
										<div class="col-md-4">
											<label for="">Meal Time</label>
											<select name="meal_time" id="" class="form-control">
												<option value="Breakfast">Breakfast</option>
												<option value="Lunch">Lunch</option>
												<option value="Dinner">Dinner</option>
											</select>
										</div>
										<div class="col-md-4">
											<label for="">Price</label>
											<input type="number" name="price" class="form-control">
										</div>
										<div class="col-md-4">
											<label for="">Description</label>
											<input type="text" name="description" " class="form-control">
										</div>
										<div class="col-md-4">
											<label for="">Image</label>
											<!-- <input type="text" name="image" value="{{$update->image ?? ''}}"/> -->
											<input type="file" name="image"  "class="form-control">
										</div>
										
									</div>
										<div>
										<button class="btn btn-primary type="submit">Save</button>
										</div>
								</form>
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