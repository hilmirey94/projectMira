<?= $this->extend('layouts/dashboard-layout'); ?>
<?= $this->section('content'); ?>
    <!-- BPM Card -->
    <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h6>Total Heartbeat Scan</h6>
                        </div>
                        <div class="card-body">
                            <h2>200</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header bg-success">
                            <h6>Normal Heartbeat</h6>
                        </div>
                        <div class="card-body">
                            <h2>200</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h6>Low Heartbeat Scan</h6>
                        </div>
                        <div class="card-body">
                            <h2>200</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header bg-danger">
                            <h6>High Heartbeat Scan</h6>
                        </div>
                        <div class="card-body">
                            <h2>200</h2>
                        </div>
                    </div>
                </div>
    </div>

    <!-- BPM Table -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <label>Heartbeat Reading List</label>
                </div>
                <div class="card-body">
                    <table id="myTable" class="table table-sm table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                            <th scope="col">Date</th>
                            <th scope="col">RFID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Heartbeat</th>
                            </tr>
                        </thead>
                        <tbody>
                        <td colspan="4" class="text-center">No Record Found.</td>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
<?= $this->endSection() ?>