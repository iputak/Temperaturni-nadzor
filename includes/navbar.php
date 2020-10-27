   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/emmezeta/home.php">
  <div class="sidebar-brand-logo">
	<img style="height: 45px; filter: invert(1);"src="/emmezeta/img/cistimir_small.svg" alt="Čistimir logo">
  </div>
  <div class="sidebar-brand-text mx-3">
	<img style="height: 37px; filter: invert(1);"src="/emmezeta/img/cistimir.svg" alt="Čistimir logo">
  </div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="/emmezeta/home.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Kontrolna ploča</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Emmezeta-Zagreb
</div>

<li class="nav-item">
  <a class="nav-link" href="/emmezeta/zg/stu/donjistupnik.php">
	<i class="fas fa-caret-right"></i>
    <span>Donji Stupnik</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="#">
	<i class="fas fa-caret-right"></i>
    <span>Jankomir</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="#">
	<i class="fas fa-caret-right"></i>
    <span>Žitnjak</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
        
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
                           
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                <?php echo $_SESSION['username']; ?>
                  
                </span>
                <img class="img-profile rounded-circle" src="/emmezeta/img/undraw_male_avatar.svg">
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Odjava
                </a>
              </div>
            </li>
          </ul>
        </nav>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Jeste li sigurni da se želite odjaviti?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pritisnite "Odjava" ako ste spremni prekinuti sesiju.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Poništi</button>

          <form action="/emmezeta/logout.php" method="POST"> 
          
            <button style="background-color:#800080; border-color:#800080c7;" type="submit" name="logout_btn" class="btn btn-primary">Odjava</button>

          </form>


        </div>
      </div>
    </div>
  </div>