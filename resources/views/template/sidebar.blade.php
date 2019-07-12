<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
      <a href="#" class="simple-text logo-normal">
        {{ Auth::user()->name }}
      </a>
    </div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item @yield('dashboard')">
          <a class="nav-link" href="#">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        @if (Auth::user()->roles()->first()->name=="user")
        <li class="nav-item  @yield('profile')">
          <a class="nav-link" href="{{url('profile')}}">
            <i class="material-icons">person</i>
            <p>User Profile</p>
          </a>
        </li>
        <li class="nav-item  @yield('appli')">
          <a class="nav-link" href="{{url('my-applications')}}">
            <i class="material-icons">content_paste</i>
            <p>My Applications</p>
          </a>
        </li>
        <li class="nav-item  @yield('jobs')">
          <a class="nav-link" href="{{url('open-jobs')}}">
            <i class="material-icons">content_paste</i>
            <p>Jobs List</p>
          </a>
        </li>

        @else        
        <li class="nav-item  @yield('manageuser')">
          <a class="nav-link" href="{{url('manage-user')}}">
            <i class="material-icons">library_books</i>
            <p>Manage Users</p>
          </a>
        </li>
        <li class="nav-item @yield('manageappli')">
          <a class="nav-link" href="{{url('manage-applicants')}}">
            <i class="material-icons">library_books</i>
            <p>Manage Applicants</p>
          </a>
        </li>
        <li class="nav-item @yield('managejob')">
          <a class="nav-link" href="{{url('manage-jobs')}}">
            <i class="material-icons">library_books</i>
            <p>Manage Job</p>
          </a>
        </li>
        @endif

      </ul>
    </div>
  </div>