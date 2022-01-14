<?= $this->section('css'); ?>
    <link rel="stylesheet" href="assets/css/deletemodal.css">
<?= $this->endSection(); ?>
<?= $this->extend('layouts/dashboard-layout'); ?>
<?= $this->section('content'); ?>

<!-- Query Table -->
<div class="row pt-2">
    <div class="col-md-12 pt-2">
        <div class="card">
            <div class="card-header">
                <label>System Logs</label>
            </div>
            <div class="card-body">
                <!-- Date -->
                <div class="row">
                    
                </div>
                <div class="table-responsive">
                    <table id="reportTable" class="table table-sm table-striped table-bordered" style="width:100%;">
                
                        <thead>
                            <tr>
                                <th scope="col">Logs ID</th>
                                <th scope="col">Date</th>
                                <th scope="col">Operation</th>
                                <th scope="col">Description</th>
                                <th scope="col">RFID</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if($reading): ?>
                        <?php foreach($reading as $i): ?>
                        <tr>
                            <td><?php echo $i['id']; ?></td>
                            <td><?php echo $i['date_created']; ?></td>
                            <td><?php echo $i['operation']; ?></td>
                            <td><?php echo $i['description']; ?></td>
                            <td><?php echo $i['rfid']; ?></td>
                            <td>
                                <a href="#delModal" class="trigger-btn btn btn-danger btn-sm btn-delete" data-toggle="modal" data-id="<?php echo $i['id']; ?>">Delete</a>
                            </td>
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

<!-- Modal HTML -->
<div id="delModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header flex-column">
				<div class="icon-box">
                    <i class="fas fa-times"></i>
				</div>						
				<h4 class="modal-title w-100">Are you sure?</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Do you really want to delete these records? This process cannot be undone.</p>
                Logs ID : <p id="showId" name="showId"></p>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary btn-modal" data-dismiss="modal">Cancel</button>
				<a id="delId" name="delId" style="color:white" href="<?php site_url('/');?>" class="btn btn-danger btn-modal">Delete</a>
			</div>
		</div>
	</div>
</div> 


<?= $this->section('script'); ?>
<script>
    $(function () {
        $(".btn-delete").click(function () {
            var id = $(this).data('id');
            document.getElementById('showId').innerHTML = id;
            document.getElementById('delId').href = '<?php echo site_url('/logs/delete/');?>' + id;
        })
    });
</script>
<?= $this->endSection() ?>

<?= $this->endSection() ?>

