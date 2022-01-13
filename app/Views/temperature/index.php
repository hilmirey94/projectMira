<?= $this->extend('layouts/dashboard-layout'); ?>
<?= $this->section('content'); ?>
    <!-- Temp Card -->
    <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h6>Total Temperature Scan</h6>
                        </div>
                        <div class="card-body">
                            <h2>200</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header bg-success">
                            <h6>Normal Temperature</h6>
                        </div>
                        <div class="card-body">
                            <h2>200</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h6>Low Temperature Scan</h6>
                        </div>
                        <div class="card-body">
                            <h2>200</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header bg-danger">
                            <h6>High Temperature Scan</h6>
                        </div>
                        <div class="card-body">
                            <h2>200</h2>
                        </div>
                    </div>
                </div>
    </div>

    <!-- Temp Table -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <label>Temperature Reading List</label>
                </div>
                <div class="card-body">
                    <table id="myTable" class="table table-sm table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                            <th scope="col">Date</th>
                            <th scope="col">RFID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Temperature</th>
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