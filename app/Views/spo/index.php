<?= $this->extend('layouts/dashboard-layout'); ?>
<?= $this->section('content'); ?>
<!-- Info boxes -->
<div class="row">
    <div class="col-12 col-sm-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="input-group">
                    <label class="col-md-1">Batch ID</label>
                    <span class="col-md-11"><?= (isset($rfid)) ? $rfid: '-'; ?></span>
                </div>
                <div class="input-group">
                    <label class="col-md-1">User</label>
                    <span class="col-md-11"><?= (isset($name)) ? $name: '-'; ?></span>
                </div>
            </div>
        </div>
        
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-6">
    <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1">
            <i class="fas fa-lungs"></i>
            <span class="pl-2"></span>
            <i class="fas fa-exclamation"></i>
        </span>
        <div class="info-box-content">
        <span class="info-box-text">Low Oxygen (Today)</span>
        <span class="info-box-number">
            <?= (isset($lowSPO)) ? $lowSPO:'0' ?>
        </span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-6">
    <div class="info-box mb-3">
        <span class="info-box-icon bg-danger elevation-1" width="150px;">
            <i class="fas fa-lungs"></i>
            <span class="pl-2"></span>
            <i class="fas fa-exclamation"></i>
        </span>

        <div class="info-box-content">
        <span class="info-box-text">High Oxygen (Today)</span>
        <span class="info-box-number">
            <?= (isset($highSPO)) ? $highSPO:'0' ?>
        </span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

<!-- Temp Table -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <label>Oxygen Reading List</label>
            </div>
            <div class="card-body">
                <table id="reportTable" class="table table-sm table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                        <th scope="col">Date</th>
                        <th scope="col">RFID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Oxygen (SPO<sup>2</sup>)</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if($reading): ?>
                    <?php foreach($reading as $i): ?>
                    <tr>
                        <td><?php echo $i['date_created']; ?></td>
                        <td><?php echo $i['rfid']; ?></td>
                        <td><?php echo (isset($name))? $name: '-'; ?></td>
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