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
					<h3><a href="{{route('menu')}}">Back</a></h3>	
				</div>
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								@if(session('status'))
              					<div class="alert alert-success">
                				{{session('status')}}
              					</div>
            					@endif
								<form action="{{route('post_add_menu')}}" method="post" enctype="multipart/form-data">
									<input type="hidden" name="id" value="{{request()->update}}">
									@csrf
									<div class="row">
										<div class="col-md-6">
											<label for="">Menu</label>
											<input type="text" name="menu" value="{{$update->menu ?? ''}}"class="form-control">
										</div>
										<div class="col-md-6">
											<label for="">Image</label>
											<input type="text" name="image" value="{{$update->image ?? ''}}"/>
											<input type="file" name="image" class="form-control" onchange="readURL(this);" >
											<span class="text-danger">
												@error('image')
												{{$message}}
												@enderror
											</span>
										</div>
										<button class="btn btn-{{!empty($update) ? 'danger' : 'primary' }}" type="submit">{{!empty($update) ? 'Update Menu' : 'Add Menu'}}</button>
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