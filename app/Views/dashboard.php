<?= $this->extend('layouts/dashboard-layout'); ?>
<?= $this->section('content'); ?>


<!-- Info boxes -->
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-id-badge"></i></span>

        <div class="info-box-content">
        <span class="info-box-text">Total Scan (Today)</span>
        <span class="info-box-number">
            <?= (isset($scanToday)) ? $scanToday:'0' ?>
        </span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thermometer"></i></span>

        <div class="info-box-content">
        <span class="info-box-text">Risk Temperature (Today)</span>
        <span class="info-box-number">
            <?= (isset($tempToday)) ? $tempToday:'0' ?>
        </span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
        <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-heartbeat"></i></span>

        <div class="info-box-content">
        <span class="info-box-text">Risk Heartbeat (Today)</span>
        <span class="info-box-number">
            <?= (isset($bpmToday)) ? $bpmToday:'0' ?>
        </span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-lungs"></i></span>

        <div class="info-box-content">
        <span class="info-box-text">Risk Oxygen (Today)</span>
        <span class="info-box-number">
            <?= (isset($spoToday)) ? $spoToday:'0' ?>
        </span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

<!-- Recent Query Table -->
<div class="row pt-2">
    <div class="col-md-12 pt-2">
        <div class="card">
            <div class="card-header">
                <label>List of Temperature (Today)</label>
            </div>
            <div class="card-body">
                <table id="dashboardTable" class="table table-sm table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">RFID</th>
                            <th scope="col">Temperature (°C)</th>
                            <th scope="col">Heartbeat (BPM)</th>
                            <th scope="col">Oxygen (SPO<sup>2</sup>)</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if($reading): ?>
                    <?php foreach($reading as $i): ?>
                    <tr>
                        <td><?php echo $i['date_created']; ?></td>
                        <td><?php echo $i['rfid']; ?></td>
                        <td><?php echo $i['temperature']; ?></td>
                        <td><?php echo $i['bpm']; ?></td>
                        <td><?php echo $i['spo2']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>