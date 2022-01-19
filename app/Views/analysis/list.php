<?= $this->extend('layouts/dashboard-layout'); ?>
<?= $this->section('content'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card bg-dark">
            <div class="card-body">
                <div class="d-flex">
                    <label class="col-md-1">Name</label>
                    <p class="col-md-11"><?= (isset($name))?$name:'N/A';?></p>
                </div>
                <div class="d-flex">
                    <label class="col-md-1">RFID</label>
                    <p class="col-md-11"><?= (isset($rfid))?$rfid:'N/A';?></p>
                </div>
                <hr style="background-color:white"/>
                <form method="post" id="analysis" name="analysis" action="<?= site_url('analysis') ?>" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-md-8 d-flex flex-wrap mx-auto my-auto">
                            <label class="col-md-12 text-secondary">
                                Custom Search
                            </label>
                            <label class="label col-md-1">From :</label>
                            <input type="date" name="fromDate" id="fromDate" class="form-control col-md-3 mr-2" />
                            <label class="label col-md-1">To :</label>
                            <input type="date" name="toDate" id="toDate" class="form-control col-md-3 mr-2" />
                            <button class="btn btn-sm btn-primary" name="search" id="search" type="submit" style="width: 65px;"><i class="fas fa-search"></i></button>
                        </div>
                        <div class="col-md-4 d-flex flex-wrap mx-auto my-auto">
                            <label class="col-md-12 text-secondary">
                                Quick Search
                            </label>
                            <button id="days" name="days" value=3 class="btn btn-info m-2">3 Days</button>
                            <button id="days" name="days" value=7 class="btn btn-info m-2">7 Days</button>
                            <button id="days" name="days" value=14 class="btn btn-info m-2">14 Days</button>
                            <button id="days" name="days" value=30 class="btn btn-info m-2">30 Days</button>
                        </div> 
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Temperature Chart -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-dark">
                <label class="label">Temperature Reading <br /><?= (isset($startDate))?'From : '.$startDate:' '?> <?= (isset($endDate))?'To : '.$endDate:''?> <?= (isset($days))?'Past '.$days.' Days':''?></label>
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
                <label class="label">Heartrate Reading Past <br /><?= (isset($startDate))?'From : '.$startDate:' '?> <?= (isset($endDate))?'To : '.$endDate:''?> <?= (isset($days))?'Past '.$days.' Days':''?></label>
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
                <label class="label">Oxygen Reading Past <br /><?= (isset($startDate))?'From : '.$startDate:' '?> <?= (isset($endDate))?'To : '.$endDate:''?> <?= (isset($days))?'Past '.$days.' Days':''?></label>
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
    google.charts.setOnLoadCallback(drawLineChart);
    google.charts.setOnLoadCallback(drawLineChart2);
    google.charts.setOnLoadCallback(drawLineChart3);
    google.charts.setOnLoadCallback(drawBarChart);
    google.charts.setOnLoadCallback(drawBarChart2);
    google.charts.setOnLoadCallback(drawBarChart3);

    // Line Chart Temperature
    function drawLineChart() {
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Temperature (°C)'],
                <?php 
                    foreach ($dataArray as $row){
                        echo "['".$row['date']."',".$row['temperature']."],";
                } ?>
        ]);

        var options = {
            title: 'Line Chart Temperature By Date (Past <?= (isset($days))?$days:'-'?> Days)',
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
            ['Date', 'Heartrate (BPM)'],
                <?php 
                    foreach ($dataArray as $row){
                        echo "['".$row['date']."',".$row['bpm']."],";
                } ?>
        ]);

        var options = {
            title: 'Line Chart Heartrate By Date (Past <?= (isset($days))?$days:'-'?> Days)',
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
            ['Date', 'Oxygen (SPO2)'],
                <?php 
                    foreach ($dataArray as $row){
                        echo "['".$row['date']."',".$row['spo2']."],";
                } ?>
        ]);

        var options = {
            title: 'Line Chart Oxygen By Date (Past <?= (isset($days))?$days:'-'?> Days)',
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
            ['Date', 'Temperature (°C)'], 
                <?php 
                    foreach ($dataArray as $row){
                        echo "['".$row['date']."',".$row['temperature']."],";
                    }
                ?>
        ]);
        var options = {
            title: 'Bar Chart Temperature By Date (Past <?= (isset($days))?$days:'-'?> Days)',
            is3D: true,
        };
        var chart = new google.visualization.BarChart(document.getElementById('GoogleBarChart'));
        chart.draw(data, options);
    }

    // Bar Chart Heartrate
    google.charts.setOnLoadCallback(showBarChart2);
    function drawBarChart2() {
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Heartrate (BPM)'], 
                <?php 
                    foreach ($dataArray as $row){
                        echo "['".$row['date']."',".$row['bpm']."],";
                    }
                ?>
        ]);
        var options = {
            title: 'Bar Chart Heartrate By Date (Past <?= (isset($days))?$days:'-'?> Days)',
            is3D: true,
        };
        var chart = new google.visualization.BarChart(document.getElementById('GoogleBarChart2'));
        chart.draw(data, options);
    }

    // Bar Chart Oxygen
    google.charts.setOnLoadCallback(showBarChart3);
    function drawBarChart3() {
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Oxygen (SPO2)'], 
                <?php 
                    foreach ($dataArray as $row){
                        echo "['".$row['date']."',".$row['spo2']."],";
                    }
                ?>
        ]);
        var options = {
            title: 'Bar Chart Oxygen By Date (Past <?= (isset($days))?$days:'-'?> Days)',
            is3D: true,
        };
        var chart = new google.visualization.BarChart(document.getElementById('GoogleBarChart3'));
        chart.draw(data, options);
    }
    
</script>


<?= $this->endSection() ?>