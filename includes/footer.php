

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Čistimir d.o.o. Zagreb, Croatia | Čistimir d.o.o. © 2019. All rights reserved. | <a href="https://www.cistimir.hr" target="_blank">www.cistimir.hr</a></span>
          </div>
        </div>
		<?php
		include($_SERVER['DOCUMENT_ROOT'].'/emmezeta/includes/scripts.php'); 
		?>
      </footer>
      <!-- End of Footer -->
      </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->
	
	<!-- Chart script -->
	<script>
	var myData=[<?php 
    while($info=mysqli_fetch_array($data))
    echo $info['atemp1'].','; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
    ?>];
    <?php
    $sql = "SELECT DATE_FORMAT(date_time, '%H:%i:%s') TIMEONLY from avrgtemp WHERE date_time > DATE_SUB(now(), INTERVAL 24 HOUR) ORDER BY date_time ASC";
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
    
</body>

</html>
