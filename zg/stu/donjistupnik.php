<?php
include('../../security.php');
include('../../includes/header.php'); 
include('../../includes/navbar.php'); 

/*Temperature data*/

require_once "../../connect.php";

$dse1p1 = $dse1p2 = $dse1p3 = "";
$dse1p1c = $dse1p2c = $dse1p3c = $averagec = "blue";


$sql = "SELECT temp1 from Temp WHERE sensid = 'dse1p1' ORDER BY time_date DESC LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	$row = mysqli_fetch_assoc($result);
    $dse1p1 = $row["temp1"];
	if($dse1p1 >= 20){
		$dse1p1c = "red";
	}
    }
else {
    $dse1p1 = "%.%%";
}

$sql = "SELECT temp1 from Temp WHERE sensid = 'dse1p2' ORDER BY time_date DESC LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	$row = mysqli_fetch_assoc($result);
    $dse1p2 = $row["temp1"];
	if($dse1p2 >= 20){
		$dse1p2c = "red";
	}
    }
else {
    $dse1p2 = "%.%%";
}

$sql = "SELECT temp1 from Temp WHERE sensid = 'dse1p3' ORDER BY time_date DESC LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	$row = mysqli_fetch_assoc($result);
    $dse1p3 = $row["temp1"];
	if($dse1p3 >= 20){
		$dse1p3c = "red";
	}
    }
else {
    $dse1p3 = "%.%%";
}

$sql = "SELECT * from AvrgTemp WHERE date_time > DATE_SUB(now(), INTERVAL 24 HOUR) ORDER BY date_time ASC";
$data = mysqli_query($conn, $sql);

//How many sensors.
$numbersInSet = 3;
 
//Get the sum of those numbers.
$sum = $dse1p1+ $dse1p2 + $dse1p3;
 
//Calculate the average by dividing $sum by the
//amount of numbers that are in our set.
$average = $sum / $numbersInSet;
if($average >= 20){
		$averagec = "red";
}
?>

<!-- Begin Page Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<ul class="breadcrumb">
			<li>Zagreb</li>
			<li>Donji Stupnik</li>

		</ul>
		
	</div>
	<div class="row">&nbsp &nbsp &nbsp &nbsp <p>  </p></div>

       
		  <!-- Content Row -->
          <div class="row">

            <!-- 1. etaža -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
				  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a href="/emmezeta/zg/stu/donjistupnik1.php">1. etaža</a></div>
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Prodaja 1: <span class="temp" style="color:<?php echo $dse1p1c; ?>;"><?php echo $dse1p1; ?>°C</span></div>
                    </div>
                    <div class="col-auto">
						<img src="../../img/thermo_<?php echo $dse1p1c; ?>.png" class="thm">
                    </div>
                  </div>
				  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Prodaja 2: <span class="temp" style="color:<?php echo $dse1p2c; ?>;"><?php echo $dse1p2; ?>°C</span></div>
                    </div>
                    <div class="col-auto">
						<img src="../../img/thermo_<?php echo $dse1p2c; ?>.png" class="thm">
                    </div>
                  </div>
				  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Prodaja 3: <span class="temp" style="color:<?php echo $dse1p3c; ?>;"><?php echo $dse1p3; ?>°C</span></div>
                    </div>
                    <div class="col-auto">
						<img src="../../img/thermo_<?php echo $dse1p3c; ?>.png" class="thm">
                    </div>
                  </div>
				  <!-- Prosječna temperatura -->
				  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Prosječna temperatura</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><span class="temp" style="color:<?php echo $averagec; ?>;"><?php echo round($average,2); ?>°C</span></div>
                    </div>
                    <div class="col-auto">
						<img src="../../img/thermo_<?php echo $averagec; ?>.png" class="thm">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Mapa 1. etaža -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Plan prostora 1. etaža</div>
						<img src="../../img/2KAT.jpg" class="imgplan">
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
		  <div class="row">
			<div class="col-lg-12 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
						<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Graf prosječne temperature</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo round($average,2); ?>°C</div>
						<div class="chartb">
							<canvas id="
							-chart"></canvas>
						</div>
						<input type="button" value="Dan (24h)" class="chartb" onclick="day(MyChart);"/>
						<input type="button" value="Tjedan (7 dana)" class="chartb" onclick="week(MyChart);"/>
						<input type="button" value="Mjesec (30 dana)" class="chartb" onclick="month(MyChart);"/>
						<input type="button" value="Godina (365 dana)" class="chartb" onclick="year(MyChart);"/>
                    </div>
                    
                  </div>
                </div>
              </div>
			  
            </div>
		  </div>
		  
	   
	   <!-- Chart script -->
		<script>
	var myData=[<?php 
    while($info=mysqli_fetch_array($data))
    echo $info['atemp1'].','; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
    ?>];
    <?php
    $sql = "SELECT DATE_FORMAT(date_time, '%H:%i:%s') TIMEONLY from AvrgTemp WHERE date_time > DATE_SUB(now(), INTERVAL 24 HOUR) ORDER BY date_time ASC";
    $data = mysqli_query($conn, $sql);
    ?>
    var myLabels=[<?php 
    while($info=mysqli_fetch_array($data))
    echo '"'.$info['TIMEONLY'].'",'; /* The concatenation operator '.' is used here to create string values from our database names. */
    ?>];
    var MyChart = new Chart(document.getElementById("line-chart"), {
    type: 'line',
    data: {
    labels: myLabels,
    datasets: [{ 
        data: myData,
        label: "Temperatura",
        borderColor: "#e60000",
        BackgroundColor:"#e60000",
        pointBackgroundColor: "#e60000",
        pointRadius: 1,
        fill: false
    }]
    },
    options: {
    title: {
        fontSize: 22,
        display: true,
        text: 'Prosječna temperatura u centru'
    },
    legend:{
        labels:{
            fontSize: 18,
            fontColor: "#e60000"
        }
    }
    }
    });
    
    function day(chart){
         <?php
        $sql = "SELECT DATE_FORMAT(time_date, '%H:%i:%s') TIMEONLY from AvrgTemp WHERE date_time > DATE_SUB(now(), INTERVAL 24 HOUR) ORDER BY time_date ASC";
        $data = mysqli_query($conn, $sql);
        ?>
        var myLabels=[<?php 
        while($info=mysqli_fetch_array($data))
        echo '"'.$info['TIMEONLY'].'",'; /* The concatenation operator '.' is used here to create string values from our database names. */
        ?>];
        <?php
        $sql = "SELECT * from AvrgTemp WHERE date_time > DATE_SUB(now(), INTERVAL 24 HOUR) ORDER BY time_date ASC";
        $data = mysqli_query($conn, $sql);
        ?>
        var myData=[<?php 
        while($info=mysqli_fetch_array($data))
        echo $info['temp1'].','; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
        ?>];
        chart.data.datasets[0].data = myData;
        chart.data.labels = myLabels;
        chart.update();
    }
    function week(chart){
         <?php
        $sql = "SELECT DATE_FORMAT(time_date, '%W') DATEONLY from AvrgTemp WHERE date_time > DATE_SUB(now(), INTERVAL 7 DAY) ORDER BY time_date ASC";
        $data = mysqli_query($conn, $sql);
        ?>
        var myLabels=[<?php 
        while($info=mysqli_fetch_array($data))
        echo '"'.$info['DATEONLY'].'",'; /* The concatenation operator '.' is used here to create string values from our database names. */
        ?>];
        <?php
        $sql = "SELECT * from AvrgTemp WHERE date_time > DATE_SUB(now(), INTERVAL 7 DAY) ORDER BY time_date ASC";
        $data = mysqli_query($conn, $sql);
        ?>
        var myData=[<?php 
        while($info=mysqli_fetch_array($data))
        echo $info['temp1'].','; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
        ?>];
        chart.data.datasets[0].data = myData;
        chart.data.labels = myLabels;
        chart.update();
    }
    function month(chart){
         <?php
        $sql = "SELECT DATE_FORMAT(date_time, '%e.%c') DATEONLY from AvrgTemp WHERE date_time > DATE_SUB(now(), INTERVAL 30 DAY) ORDER BY date_time ASC";
        $data = mysqli_query($conn, $sql);
        ?>
        var myLabels=[<?php 
        while($info=mysqli_fetch_array($data))
        echo '"'.$info['DATEONLY'].'",'; /* The concatenation operator '.' is used here to create string values from our database names. */
        ?>];
        <?php
        $sql = "SELECT * from AvrgTemp WHERE date_time > DATE_SUB(now(), INTERVAL 30 DAY) ORDER BY date_time ASC";
        $data = mysqli_query($conn, $sql);
        ?>
        var myData=[<?php 
        while($info=mysqli_fetch_array($data))
        echo $info['atemp1'].','; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
        ?>];
        chart.data.datasets[0].data = myData;
        chart.data.labels = myLabels;
        chart.update();
    }
    function year(chart){
         <?php
        $sql = "SELECT DATE_FORMAT(date_time, '%M') DATEONLY from AvrgTemp WHERE date_time > DATE_SUB(now(), INTERVAL 365 DAY) ORDER BY date_time ASC";
        $data = mysqli_query($conn, $sql);
        ?>
        var myLabels=[<?php 
        while($info=mysqli_fetch_array($data))
        echo '"'.$info['DATEONLY'].'",'; /* The concatenation operator '.' is used here to create string values from our database names. */
        ?>];
        <?php
        $sql = "SELECT * from AvrgTemp WHERE date_time > DATE_SUB(now(), INTERVAL 365 DAY) ORDER BY date_time ASC";
        $data = mysqli_query($conn, $sql);
        ?>
        var myData=[<?php 
        while($info=mysqli_fetch_array($data))
        echo $info['atemp1'].','; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
        ?>];
        chart.data.datasets[0].data = myData;
        chart.data.labels = myLabels;
        chart.update();
    }
    
    </script>
		
 
<?php
	include($_SERVER['DOCUMENT_ROOT'].'/emmezeta/includes/footer.php');
?>