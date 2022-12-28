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
				<h3><button class="btn"><a href="{{route('food_item')}}">Back</a></button></h3>
			</div>
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
							@if(session('status'))
              					<div class="alert alert-success">
                				{{session('status')}}
              					</div>
            				@endif
								<form action="{{route('post_food_item')}}" method="post" enctype="multipart/form-data">
									<input type="hidden" name="id" value="{{request()->update}}">
									@csrf
									<div class="row">
										<div class="col-md-4">
											<label for="">Menu</label>
											<select name="menu_id" id="menu_id" value=""  class="form-control">
												@foreach(DB::table('menu')->get() as $k=>$v)
												<option value="{{$v->id}}" {{isset($update->menu_id) ? ($update->menu_id == $v->id ? 'Selected' : '') : ''}}>{{$v->menu}}</option>
												@endforeach
											</select>
											<span class="text-danger">
												@error('menu_id')
												{{$message}}
												@enderror
											</span>
										</div>
										<div class="col-md-4">
											<label for="">Sub-menu</label>
											<select name="sub_menu_id" id="sub_menu_id" class="form-control">
												@if(isset($update->sub_menu_id))
                    							<option value="{{$update->sub_menu_id}}"><?= DB::table("sub_menu")->where("id",$update->sub_menu_id)->value('sub_menu')?></option>
                  								@else
                      							<option value="">--Select Sub-menu--</option>
                  								@endif
											</select>
											<span class="text-danger">
												@error('sub_menu_id')
												{{$message}}
												@enderror
											</span>

										</div>
										<div class="col-md-4">
											<label for="">Food Item</label>
											<input type="text" name="item_name" value="{{$update->item_name ?? ''}}" class="form-control">
											<span class="text-danger">
												@error('item_name')
												{{$message}}
												@enderror
											</span>
										</div>
										<div class="col-md-4">
											<label for="">Price</label>
											<input type="number" name="price" value="{{$update->price ?? ''}}" class="form-control">
										</div>
										<div class="col-md-4">
											<label for="">Description</label>
											<input type="text" name="description" value="{{$update->description ?? ''}}" class="form-control">
										</div>
										<div class="col-md-4">
											<label for="">Image</label>
											<!-- <input type="text" name="image" value="{{$update->image ?? ''}}"/> -->
											<input type="file" name="image" class="form-control">
											<span class="text-danger">
												@error('image')
												{{$message}}
												@enderror
											</span>
										</div>
										
									</div>
									<div>
										<button class="btn btn-{{!empty($update) ? 'danger' : 'primary'}}" type="submit">{{!empty($update) ? 'Update' : 'Save'}}</button>
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
});
</script>