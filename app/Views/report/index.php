<?= $this->extend('layouts/dashboard-layout'); ?>
<?= $this->section('content'); ?>

<!-- Query Table -->
<div class="row pt-2">
    <div class="col-md-12 pt-2">
        <div class="card">
            <div class="card-header">
                <label>List of Temperature (<?php echo (isset($name)) ? $name:'Self';?>)</label>
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