<?= $this->extend('layouts/dashboard-layout'); ?>
<?= $this->section('content'); ?>

<!-- Info boxes Display Simple Reading Data -->
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box bg-dark">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-id-badge"></i></span>

        <div class="info-box-content">
            <div id="tempCarousel" class="carousel slide" data-ride="carousel">
                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <span class="info-box-text">Total Scan (Today)</span>
                        <span class="info-box-number">
                            <?= (isset($tempToday)) ? $scanToday:'0' ?>
                        </span>
                    </div>
                    <div class="carousel-item">
                        <span class="info-box-text">Total Scan (Past 7 Days)</span>
                        <span class="info-box-number">
                            <?= (isset($tempToday)) ? $scan7Days:'0' ?>
                        </span>
                    </div>
                    <div class="carousel-item">
                        <span class="info-box-text">Total Scan (Past 30 Days)</span>
                        <span class="info-box-number">
                            <?= (isset($tempToday)) ? $scan30Days:'0' ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box bg-dark">
        <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-thermometer-half"></i></span>

        <div class="info-box-content">
            <div id="tempCarousel" class="carousel slide" data-ride="carousel">
                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <span class="info-box-text">Risk Temperature (Today)</span>
                        <span class="info-box-number">
                            <?= (isset($tempToday)) ? $tempToday:'0' ?>
                        </span>
                    </div>
                    <div class="carousel-item">
                        <span class="info-box-text">Risk Temperature (Past 7 Days)</span>
                        <span class="info-box-number">
                            <?= (isset($tempToday)) ? $temp7Days:'0' ?>
                        </span>
                    </div>
                    <div class="carousel-item">
                        <span class="info-box-text">Risk Temperature (Past 30 Days)</span>
                        <span class="info-box-number">
                            <?= (isset($tempToday)) ? $temp30Days:'0' ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3 bg-dark">
        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-heartbeat"></i></span>

        <div class="info-box-content">
            <div id="tempCarousel" class="carousel slide" data-ride="carousel">
                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <span class="info-box-text">Risk Heartrate (Today)</span>
                        <span class="info-box-number">
                            <?= (isset($tempToday)) ? $bpmToday:'0' ?>
                        </span>
                    </div>
                    <div class="carousel-item">
                        <span class="info-box-text">Risk Heartrate (Past 7 Days)</span>
                        <span class="info-box-number">
                            <?= (isset($tempToday)) ? $bpm7Days:'0' ?>
                        </span>
                    </div>
                    <div class="carousel-item">
                        <span class="info-box-text">Risk Heartrate (Past 30 Days)</span>
                        <span class="info-box-number">
                            <?= (isset($tempToday)) ? $bpm30Days:'0' ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3 bg-dark">
        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-lungs"></i></span>

        <div class="info-box-content">
            <div id="tempCarousel" class="carousel slide" data-ride="carousel">
                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <span class="info-box-text">Risk Oxygen (Today)</span>
                        <span class="info-box-number">
                            <?= (isset($tempToday)) ? $spoToday:'0' ?>
                        </span>
                    </div>
                    <div class="carousel-item">
                        <span class="info-box-text">Risk Oxygen (Past 7 Days)</span>
                        <span class="info-box-number">
                            <?= (isset($tempToday)) ? $spo7Days:'0' ?>
                        </span>
                    </div>
                    <div class="carousel-item">
                        <span class="info-box-text">Risk Oxygen (Past 30 Days)</span>
                        <span class="info-box-number">
                            <?= (isset($tempToday)) ? $spo30Days:'0' ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
    
</div>
<!-- /.row -->

<div class="row d-none d-lg-block">
    <div class="col-md-12">
        <div class="card shadow p-4 bg-dark" width="100%">
            <!-- Information Section -->
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="5000">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner pl-5 pr-5" style=" width:100%; height: 400px !important;">
                <div class="carousel-item active">
                <img class="d-block h-100 mx-auto" src="<?php echo base_url(); ?>/public/assets/img/Banner1.jpeg" alt="First slide">
                </div>
                <div class="carousel-item">
                <img class="d-block h-100 mx-auto" src="<?php echo base_url(); ?>/public/assets/img/Banner2.jpeg" alt="Second slide">
                </div>
                <div class="carousel-item">
                <img class="d-block h-100 mx-auto" src="<?php echo base_url(); ?>/public/assets/img/Banner3.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
        </div>
    </div>  
</div>

<!-- Risky Person -->
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-dark">
                <label class="label">Risky Person Chart - Past 7 Days</label>
            </div>
            <div class="card-body p-5">
                <div class="chart-container">
                    <div class="bar-chart-container">
                        <div id="GoogleChart" style="height: 350px; width: 100%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-dark">
                <label class="label">Possible Risky Person - Past 7 Days</label>
            </div>
            <div class="card-body p-5">
                <div class="table-responsive" style="height: 350px; width: 100%">
                    <table id="simpleTable" class="table table-sm" style="width:100%;">
                
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Date Risk</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if($riskyPerson): ?>
                        <?php foreach($riskyPerson as $row): ?>
                            <?php
                                if($users):
                                    foreach($users as $u):
                                        if($u['rfid'] == $row->drfid):
                                            $username = $u['name'];
                                            $email = $u['email'];
                                        endif;
                                    endforeach;
                                else:
                                    $username = 'N/A';
                                endif;
                            ?>
                            <tr>
                                <td><?php echo $username; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><?php echo $row->date_created; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Temperature Chart -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-dark">
                <label class="label">Average Temperature Reading - Past 7 Days (All User)</label>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="chart-container">
                                    <div class="bar-chart-container">
                                        <div id="GoogleLineChart" style="height: 350px; width: 100%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="chart-container">
                                    <div class="bar-chart-container">
                                        <div id="GoogleBarChart" style="height: 350px; width: 100%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>

<!-- HeartRate Chart -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-dark">
                <label class="label">Average Heartrate Reading - Past 7 Days (All User)</label>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="chart-container">
                                    <div class="bar-chart-container">
                                        <div id="GoogleLineChart2" style="height: 350px; width: 100%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="chart-container">
                                    <div class="bar-chart-container">
                                        <div id="GoogleBarChart2" style="height: 350px; width: 100%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>

<!-- Oxygen Chart -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-dark">
                <label class="label">Average Oxygen Reading - Past 7 Days (All User)</label>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="chart-container">
                                    <div class="bar-chart-container">
                                        <div id="GoogleLineChart3" style="height: 350px; width: 100%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="chart-container">
                                    <div class="bar-chart-container">
                                        <div id="GoogleBarChart3" style="height: 350px; width: 100%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script'); ?>

<script>
    google.charts.load('current', {'packages':['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawChart);
    google.charts.setOnLoadCallback(drawLineChart);
    google.charts.setOnLoadCallback(drawLineChart2);
    google.charts.setOnLoadCallback(drawLineChart3);
    google.charts.setOnLoadCallback(drawBarChart);
    google.charts.setOnLoadCallback(drawBarChart2);
    google.charts.setOnLoadCallback(drawBarChart3);

    // Step Chart Risky
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Total Risky Person'],
                <?php 
                    foreach ($riskyPersonChart as $row){
                        echo "['".$row->date."',".$row->total."],";
                } ?>
        ]);

        var options = {
          title: 'Step Chart of Risky Person Per Day (Past 7 Days)',
          vAxis: {title: 'Accumulated Rating'},
          isStacked: true
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('GoogleChart'));

        chart.draw(data, options);
    }

    // Line Chart Temperature
    function drawLineChart() {
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Average Temperature (°C)'],
                <?php 
                    foreach ($tempArray as $row){
                        echo "['".$row['date']."',".$row['avgtemp']."],";
                } ?>
        ]);

        var options = {
            title: 'Line Chart Average Temperature By Date (Past 7 Days)',
            curveType: 'function',
            legend: {
                position: 'top'
            }
        };
        var chart = new google.visualization.LineChart(document.getElementById('GoogleLineChart'));
        chart.draw(data, options);
    }

    // Line Chart Heartrate
    function drawLineChart2() {
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Average Heartrate (BPM)'],
                <?php 
                    foreach ($bpmArray as $row){
                        echo "['".$row['date']."',".$row['avgbpm']."],";
                } ?>
        ]);

        var options = {
            title: 'Line Chart Average Heartrate By Date (Past 7 Days)',
            curveType: 'function',
            legend: {
                position: 'top'
            }
        };
        var chart = new google.visualization.LineChart(document.getElementById('GoogleLineChart2'));
        chart.draw(data, options);
    }

    // Line Chart Oxygen
    function drawLineChart3() {
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Average Oxygen (SPO2)'],
                <?php 
                    foreach ($spoArray as $row){
                        echo "['".$row['date']."',".$row['avgspo']."],";
                } ?>
        ]);

        var options = {
            title: 'Line Chart Average Oxygen By Date (Past 7 Days)',
            curveType: 'function',
            legend: {
                position: 'top'
            }
        };
        var chart = new google.visualization.LineChart(document.getElementById('GoogleLineChart3'));
        chart.draw(data, options);
    }
    
    
    // Bar Chart Temperature
    google.charts.setOnLoadCallback(showBarChart);
    function drawBarChart() {
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Average Temperature (°C)'], 
                <?php 
                    foreach ($tempArray as $row){
                        echo "['".$row['date']."',".$row['avgtemp']."],";
                    }
                ?>
        ]);
        var options = {
            title: 'Bar Chart Average Temperature By Date (Past 7 Days)',
            is3D: true,
        };
        var chart = new google.visualization.BarChart(document.getElementById('GoogleBarChart'));
        chart.draw(data, options);
    }

    // Bar Chart Heartrate
    google.charts.setOnLoadCallback(showBarChart2);
    function drawBarChart2() {
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Average Heartrate (BPM)'], 
                <?php 
                    foreach ($bpmArray as $row){
                        echo "['".$row['date']."',".$row['avgbpm']."],";
                    }
                ?>
        ]);
        var options = {
            title: 'Bar Chart Average Heartrate By Date (Past 7 Days)',
            is3D: true,
        };
        var chart = new google.visualization.BarChart(document.getElementById('GoogleBarChart2'));
        chart.draw(data, options);
    }

    // Bar Chart Oxygen
    google.charts.setOnLoadCallback(showBarChart3);
    function drawBarChart3() {
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Average Oxygen (SPO2)'], 
                <?php 
                    foreach ($spoArray as $row){
                        echo "['".$row['date']."',".$row['avgspo']."],";
                    }
                ?>
        ]);
        var options = {
            title: 'Bar Chart Average Oxygen By Date (Past 7 Days)',
            is3D: true,
        };
        var chart = new google.visualization.BarChart(document.getElementById('GoogleBarChart3'));
        chart.draw(data, options);
    }
    
</script>


<?= $this->endSection() ?>