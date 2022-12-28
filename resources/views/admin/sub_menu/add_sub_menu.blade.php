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
				<h3><button class="btn btn-default"><a href="{{route('sub_menu')}}">Back</a></button></h3>
			</div>
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
							@if(session('status'))
              					<div class="alert alert-success">
                				{{session('status')}}
              					</div>
            				@endif
								<form action="{{route('post_add_sub_menu')}}" method="post" enctype="multipart/form-data">
									<input type="hidden" name="id" value="{{request()->update}}">
									@csrf
									<div class="row">
										<div class="col-md-4">
											<label for="">Menu</label>
											<select name="menu_id" id="" value="" class="form-control">
												@foreach(DB::table('menu')->get() as $k=>$v)
												<option value="{{$v->id}}" {{isset($update->menu_id) ? ($update->menu_id == $v->id ? 'Selected' : '') : ''}} >{{$v->menu}}</option>
												@endforeach
											</select>
										</div>
										<div class="col-md-4">
											<label for="">Sub-menu</label>
											<input type="text" name="sub_menu" value="{{$update->sub_menu ?? ''}}" class="form-control">
										</div>
										<div class="col-md-4">
											<label for="">Image</label>
											<input type="text" name="image" value="{{$update->image ?? ''}}"/>
											<input type="file" name="image" class="form-control" onchange="readURL(this);" >
											<span class="text-danger">
												@error('image')
												{{$message}}
												@enderror
											</span>
										</div>
										<div>
										<button class="btn btn-{{!empty($update) ? 'danger' : 'primary'}}" type="submit">{{!empty($update) ? 'Update' : 'Save'}}</button>
										</div>
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