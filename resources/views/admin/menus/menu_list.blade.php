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
              <h3>Menus</h3>
              <h3><a href="{{route('form_menu')}}">Add Menu</a></h3>
            </div>
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>id</th>
                        <th>Menu</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
                </div>
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

<script>
	$(document).ready(function(){

		$.ajaxSetup({
        	headers: {
        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    	}
	});
  function fetchmenu(){
            $.ajax({
                    type:"GET",
                    url:"/menu_list",
                    dataType:"json",
                    success:function(data){
                       $.each(data,function(key,value){
                        $('tbody').append(
                            '<tr>\
                              <td>'+value.id+'</td>\
                              <td>'+value.name+'</td>\
                            </tr>');
					               });
                    }
                });
          }
          fetchmenu();
		
		});

</script>