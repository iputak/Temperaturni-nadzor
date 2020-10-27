<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 

require_once "connect.php";

/*Avg temp*/
$sql = "SELECT atemp1 FROM avrgtemp ORDER BY avrgid DESC LIMIT 1";
$data = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($data);
$pros = $row["atemp1"];
?>


<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Kontrolna ploča</h1>
		
	</div>
	<div class="row">&nbsp &nbsp &nbsp &nbsp<p>  Dobrodošli u <b>Čistimir - Temperaturni nadzor</b>.</p></div>

       
		  <!-- Content Row -->
          <div class="row">

            <!-- Donji Stupnik -->
            <div class="col-xl-4 col-md-4 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a href="/emmezeta/zg/stu/donjistupnik.php">Donji Stupnik</a></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pros; ?>°C</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-thermometer-half fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-4 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jankomir</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pros; ?>°C</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-thermometer-half fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			<!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-4 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Žitnjak</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pros; ?>°C</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-thermometer-half fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
	   <!-- Content Row -->
    <div class="row">
		<div class="col-lg-12 mb-4 karta">
			<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d89027.46874403261!2d15.9155794714689!3d45.78905602946953!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1semmezeta!5e0!3m2!1shr!2shr!4v1544962462977"></iframe>
		</div>
    </div>
		
 <?php
  include($_SERVER['DOCUMENT_ROOT'].'/emmezeta/includes/footer.php');
 ?>