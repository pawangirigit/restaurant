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
              <h3>Upload Video</h3>
              <h3><a href="">Back</a></h3>
            </div>
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
          @if(session('status'))
              <div class="alert alert-success">
              {{session('status')}}
    					</div>
   				@endif
						<form action="{{route('post_video')}}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="row">
								<div class="col-md-6">
									<input type="file" name="video">
                  <span class="text-danger">
                  @error('video')
                  {{$message}}
                  @enderror
                  </span>
                 
								</div>
                <div class="col-md-6">
                <button class="btn btn-primary" type="submit">Upload</button>
								</div>
							</div>
						</form>
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