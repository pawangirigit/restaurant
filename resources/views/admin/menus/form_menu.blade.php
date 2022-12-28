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
					<h3><a href="{{route('menu')}}">Back</a></h3>	
				</div>
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<form id="form">
									<div class="row">
										<div class="col-md-6">
											<label for="">Menu</label>
											<input type="text" id="menu" class="form-control">
										</div>
										<div class="col-md-6">
											<label for="">Image</label>
											<input type="file" name="image" id="image" class="form-control" >
										</div>
									</div>
									<button class="btn btn-primary" id="addButton" type="submit">Save</button>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.15/dist/sweetalert2.all.min.js"></script>

<script>
	$(document).ready(function(){

		$.ajaxSetup({
        	headers: {
        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    	}
	});

		$(document).on('click','#addButton',function(e){
			e.preventDefault();
			var data={
                'menu':$('#menu').val(),
            }
			$.ajax({
                type:"POST",
                url:"/store",
                data:data,
                dataType:"json",
                success:function(data){
					//alert("Data Save: " + data);
			Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Menu added!!',
                timer: 1500
            })
					
        },
            }); 
		});

	});
</script>
