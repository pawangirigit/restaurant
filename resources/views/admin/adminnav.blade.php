<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
          <a class="sidebar-brand brand-logo" href="index.html"><img src="admin/assets/images/logo.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="index.html"><img src="admin/assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item nav-profile">
            
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('redirects')}}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
		      <li class="nav-item">
            <a class="nav-link" href="{{route('users')}}">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">Users</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              <span class="menu-title">Manage Menu</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{route('menu')}}">Menu</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('sub_menu')}}">Sub-menu</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('food_item')}}">Food Item</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('form_meal_time')}}">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">Meal_time</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('chefs')}}">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">Chefs</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('reservation_list')}}">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">Reservation</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('form_upload_video')}}">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">Upload Video</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('form_upload_banner')}}">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">Upload Banner</span>
            </a>
          </li>
        </ul>
      </nav>