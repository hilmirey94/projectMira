<?= $this->extend('layouts/dashboard-layout'); ?>
<?= $this->section('content'); ?>


        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-dark">
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
            </div>
            <!-- /.col -->
            <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-dark">
                    <label class="form-group">Temperature (Past 30 Days)</label>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1">
                                    <i class="fas fa-thermometer-half"></i>      
                                </span>
                                <div class="info-box-content">
                                <span class="info-box-text">Normal</span>
                                <span class="info-box-number">
                                    <?= (isset($tempnormal)) ? $tempnormal:'0' ?>
                                </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-md-4">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-primary elevation-1">
                                    <i class="fas fa-thermometer-quarter"></i>
                                    <span class="pl-2"></span>
                                    <i class="fas fa-caret-down"></i>
                                </span>
                                <div class="info-box-content">
                                <span class="info-box-text">Low</span>
                                <span class="info-box-number">
                                    <?= (isset($templow)) ? $templow:'0' ?>
                                </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-md-4">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1">
                                    <i class="fas fa-thermometer-full"></i>
                                    <span class="pl-2"></span>
                                    <i class="fas fa-caret-up"></i>
                                </span>
                                <div class="info-box-content">
                                <span class="info-box-text">High</span>
                                <span class="info-box-number">
                                    <?= (isset($temphigh)) ? $temphigh:'0' ?>
                                </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- /.col -->
            <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-dark">
                    <label class="form-group">Heartbeat (Past 30 Days)</label>
                </div>
                <div class="card-body">
                <div class="row">
                        <div class="col-md-4">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1">
                                    <i class="fas fa-heartbeat"></i>
                                </span>
                                <div class="info-box-content">
                                <span class="info-box-text">Normal</span>
                                <span class="info-box-number">
                                    <?= (isset($bpmnormal)) ? $bpmnormal:'0' ?>
                                </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-md-4">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-primary elevation-1">
                                    <i class="fas fa-heartbeat"></i>
                                    <span class="pl-2"></span>
                                    <i class="fas fa-caret-down"></i>
                                </span>
                                <div class="info-box-content">
                                <span class="info-box-text">Low</span>
                                <span class="info-box-number">
                                    <?= (isset($bpmlow)) ? $bpmlow:'0' ?>
                                </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-md-4">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1">
                                    <i class="fas fa-heartbeat"></i>
                                    <span class="pl-2"></span>
                                    <i class="fas fa-caret-up"></i>
                                </span>
                                <div class="info-box-content">
                                <span class="info-box-text">High</span>
                                <span class="info-box-number">
                                    <?= (isset($bpmhigh)) ? $bpmhigh:'0' ?>
                                </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- /.col -->
            <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-dark">
                    <label class="form-group">Oxygen (Past 30 Days)</label>
                </div>
                <div class="card-body">
                <div class="row">
                        <div class="col-md-4">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1">
                                    <i class="fas fa-lungs"></i>
                                </span>
                                <div class="info-box-content">
                                <span class="info-box-text">Normal</span>
                                <span class="info-box-number">
                                    <?= (isset($sponormal)) ? $sponormal:'0' ?>
                                </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-md-4">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-primary elevation-1">
                                    <i class="fas fa-lungs"></i>
                                    <span class="pl-2"></span>
                                    <i class="fas fa-caret-down"></i>
                                </span>
                                <div class="info-box-content">
                                <span class="info-box-text">Low</span>
                                <span class="info-box-number">
                                    <?= (isset($spolow)) ? $spolow:'0' ?>
                                </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-md-4">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1">
                                    <i class="fas fa-lungs"></i>
                                    <span class="pl-2"></span>
                                    <i class="fas fa-caret-up"></i>
                                </span>
                                <div class="info-box-content">
                                <span class="info-box-text">High</span>
                                <span class="info-box-number">
                                    <?= (isset($spohigh)) ? $spohigh:'0' ?>
                                </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Query Table -->
        <div class="row pt-2">
            <div class="col-md-12 pt-2">
                <div class="card">
                    <div class="card-header bg-dark">
                        <label>Records (<?php echo (isset($name)) ? $name:'Self';?>)</label>
                    </div>
                    <div class="card-body">
                        <!-- Date -->
                        <div class="row">
                            
                        </div>
                        <div class="table-responsive">
                            <table id="reportTable" class="table table-sm table-striped table-bordered" style="width:100%;">
                        
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
        </div>




<?= $this->endSection() ?>