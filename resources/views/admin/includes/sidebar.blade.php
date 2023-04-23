 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="{{ url('admin/dashboard') }}">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ url('admin/assign-course') }}">
      <i class="bi bi-journal-text"></i>
      <span>Assign Course</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ url('admin/enrollment') }}">
      <i class="bi bi-grid"></i>
      <span>Enrollment Requests</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{ url('admin/all-students') }}">
          <i class="bi bi-circle"></i><span>All students</span>
        </a>
      </li>
      <li>
        <a href="{{ url('admin/all-teachers') }}">
          <i class="bi bi-circle"></i><span>All teachers</span>
        </a>
      </li>
      <li>
        <a href="{{ url('admin/all-sessions') }}">
          <i class="bi bi-circle"></i><span>All sessions</span>
        </a>
      </li>
      <li>
        <a href="{{ url('admin/all-courses') }}">
          <i class="bi bi-circle"></i><span>All courses</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Creation</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{ url('admin/create-student') }}">
          <i class="bi bi-circle"></i><span>Student</span>
        </a>
      </li>
      <li>
        <a href="{{ url('admin/create-teacher') }}">
          <i class="bi bi-circle"></i><span>Teacher</span>
        </a>
      </li>
      <li>
        <a href="{{ url('admin/create-session') }}">
          <i class="bi bi-circle"></i><span>Session</span>
        </a>
      </li>
      <li>
        <a href="{{ url('admin/create-course') }}">
          <i class="bi bi-circle"></i><span>Course</span>
        </a>
      </li>
      <li>
        <a href="{{ url('admin/create-section') }}">
          <i class="bi bi-circle"></i><span>Section</span>
        </a>
      </li>
      
    </ul>
  </li><!-- End Components Nav -->
</ul>

</aside><!-- End Sidebar-->