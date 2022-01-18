<?= $this->section('css'); ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/css/deletemodal.css">
<?= $this->endSection(); ?>
<?= $this->extend('layouts/dashboard-layout'); ?>
<?= $this->section('content'); ?>

<!-- Query Table -->
<div class="row pt-2">
    <div class="col-md-12 pt-2">
        <div class="card">
            <div class="card-header bg-dark">
                <label>User List</label>
                <?php if ($user_type == 'admin') {
                    echo '<div class="float-right">
                        <a href="';
                    echo base_url('/manage-user/create');
                    echo  '" class="btn btn-primary">
                            <i class="fas fa-plus"></i>
                            New
                            </a>
                        </div>';
                } ?>
                
            </div>
            <div class="card-body">
                <!-- Date -->
                <div class="row">
                    
                </div>
                <div class="table-responsive">
                    <table id="reportTable" class="table table-sm table-striped table-bordered" style="width:100%;">
                
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">RFID</th>
                                <th scope="col">Created Date</th>
                                <th scope="col">Access Type</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if($users): ?>
                        <?php foreach($users as $i): ?>
                        <tr>
                            <td><?php echo $i['name']; ?></td>
                            <td><?php echo $i['email']; ?></td>
                            <td><?php echo $i['rfid']; ?></td>
                            <td><?php echo $i['date_created']; ?></td>
                            <td><?php echo $i['user_type']; ?></td>
                            <td>
                                <a href="<?php echo base_url('/manage-user/edit/'.$i['id']);?>" class="btn btn-info btn-sm" title="Edit this row.">
                                Edit</a>
                                <a href="#delModal" class="trigger-btn btn btn-danger btn-delete btn-sm" data-toggle="modal" data-id="<?php echo $i['id']; ?>" title="Remove this row.">
                                Delete</a>
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
	<div class="modal-dialog modal-confirm modal-dialog-centered">
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
            document.getElementById('delId').href = '<?php echo site_url('/manage-user/delete/');?>' + id;
        })
    });
</script>
<?= $this->endSection() ?>

<?= $this->endSection() ?>

