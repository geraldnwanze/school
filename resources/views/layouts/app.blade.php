<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/attnlg.png" rel="icon">
  <title>Dashboard</title>
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/ruang-admin.min.css') }}" rel="stylesheet">
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

  <style>
    th,td{
        white-space: nowrap;
    }
  </style>
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion " id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center bg-gradient-primary  justify-content-center" href="{{ route('home') }}">
          <div class="sidebar-brand-icon" >
            <img src="{{ asset('img/logo/attnlg.png') }}">
          </div>
          <div class="sidebar-brand-text mx-3">SMS</div>
        </a>

        <hr class="sidebar-divider my-0">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>

        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Offences
        </div>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#offences"
            aria-expanded="true" aria-controls="offences">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Manage Offences</span>
          </a>
          <div id="offences" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Manage Offences</h6>
               <a class="collapse-item" href="{{ route('offences.index') }}">Offences</a>
               <a class="collapse-item" href="{{ route('offence-payments.index') }}">Offence Payments</a>
            </div>
          </div>
        </li>

        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Inventory
        </div>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#inventory"
            aria-expanded="true" aria-controls="inventory">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Manage Inventory</span>
          </a>
          <div id="inventory" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Manage Inventory</h6>
               <a class="collapse-item" href="{{ route('inventory.index') }}">Inventory</a>
               <a class="collapse-item" href="{{ route('inventory-payments.index') }}">Inventory Payments</a>
            </div>
          </div>
        </li>

        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Accounts
        </div>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#accounts"
            aria-expanded="true" aria-controls="accounts">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Manage Accounts</span>
          </a>
          <div id="accounts" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Manage Accounts</h6>
               <a class="collapse-item" href="{{ route('accounts.index') }}">Accounts</a>
            </div>
          </div>
        </li>

        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Classrooms
        </div>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#classrooms"
            aria-expanded="true" aria-controls="classrooms">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Manage Classes</span>
          </a>
          <div id="classrooms" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Manage Classes</h6>
               <a class="collapse-item" href="{{ route('classrooms.index') }}">Classes</a>
            </div>
          </div>
        </li>

         <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Teachers
        </div>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#teachers"
            aria-expanded="true" aria-controls="teachers">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Manage Teachers</span>
          </a>
          <div id="teachers" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Manage Teachers</h6>
               <a class="collapse-item" href="{{ route('teachers.index') }}">Teachers</a>
               <a class="collapse-item" href="{{ route('teacher-classrooms.index') }}">Teachers Classrooms</a>
               <a class="collapse-item" href="{{ route('teacher-subjects.index') }}">Teachers Subjects</a>
            </div>
          </div>
        </li>

         <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Subjects
        </div>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#subjects"
            aria-expanded="true" aria-controls="subjects">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Manage Subjects</span>
          </a>
          <div id="subjects" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Manage Subjects</h6>
               <a class="collapse-item" href="{{ route('subjects.index') }}">Subjects</a>
            </div>
          </div>
        </li>

         <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Staffs
        </div>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#staffs"
            aria-expanded="true" aria-controls="staffs">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Manage Staffs</span>
          </a>
          <div id="staffs" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Staffs</h6>
               <a class="collapse-item" href="#">staffs</a>
            </div>
          </div>
        </li>

        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Students
        </div>
        </li>
         <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#students"
            aria-expanded="true" aria-controls="students">
            <i class="fas fa-user-graduate"></i>
            <span>Manage Students</span>
          </a>
          <div id="students" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Students</h6>
              <a class="collapse-item" href="{{ route('students.index') }}">Students</a>
            </div>
          </div>
        </li>

        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          School Fees
        </div>
        </li>
         <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#schoolFees"
            aria-expanded="true" aria-controls="schoolFees">
            <i class="fas fa-user-graduate"></i>
            <span>Manage School Fees</span>
          </a>
          <div id="schoolFees" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">School Fees</h6>
              <a class="collapse-item" href="{{ route('school-fees.attributes.index') }}">Attributes</a>
              <a class="collapse-item" href="{{ route('school-fees.index') }}">School Fees</a>
              <a class="collapse-item" href="{{ route('school-fee-payments.index') }}">School Fee Payments</a>
            </div>
          </div>
        </li>

        <hr class="sidebar-divider">
        <div class="sidebar-heading">
         Session & Term
        </div>
        </li>
         <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrapcon"
            aria-expanded="true" aria-controls="collapseBootstrapcon">
            <i class="fa fa-calendar-alt"></i>
            <span>Manage Session & Term</span>
          </a>
          <div id="collapseBootstrapcon" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Contribution</h6>
              <a class="collapse-item" href="createSessionTerm.php">Create Session and Term</a>
              <!-- <a class="collapse-item" href="addMemberToContLevel.php ">Add Member to Level</a> -->
            </div>
          </div>
        </li>

        <hr class="sidebar-divider">
        <div class="version" id="version-ruangadmin"></div>
      </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->


    <nav class="navbar navbar-expand navbar-light bg-gradient-primary topbar mb-4 static-top ">
        <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button>

        <div class="text-white big" style="margin-left:100px;"><b></b></div>

        <ul class="navbar-nav ml-auto">
          <div class="topbar-divider d-none d-sm-block"></div>
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <img class="img-profile rounded-circle" src="{{ asset('img/user-icn.png') }}" style="max-width: 60px">
              <span class="ml-2 d-none d-lg-inline text-white small"><b>Welcome </b></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="#">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <i class="fas fa-power-off fa-fw mr-2 text-danger"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
        <!-- Topbar -->
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">


          @yield('content')

        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span> &copy; <script> document.write(new Date().getFullYear()); </script>
              SCHOOL MANAGEMENT SYSTEM
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
  <script src="{{ asset('js/ruang-admin.min.js') }}"></script>
  <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
</body>

@include('sweetalert::alert')

</html>
