<?php $__env->startSection('title', 'Create | Roles'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="card tab2-card">
		<div class="card-body">
			<ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
				<li class="nav-item"><a class="nav-link active show" id="restriction-tabs" data-bs-toggle="tab"
						href="#restriction" role="tab" aria-controls="restriction" aria-selected="false"
						data-original-title="" title="">Create Roles</a></li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade active show" id="restriction" role="tabpanel"
					aria-labelledby="restriction-tabs">
					<form method="POST" action="<?php echo e(route('admin.roles.store')); ?>">
						<?php echo csrf_field(); ?>
						<div class="form-group row">
							<label for="validationCustom4" class="col-xl-3 col-md-4">role Name</label>
							<div class="col-md-7">
								<input class="form-control" value="<?php echo e(old('name')); ?>" name="name" id="name" type="text">
							</div>
						</div>


						<div class="form-group row">
							<button type="submit" class="btn btn-primary btn-sm w-25">Submit</button>
							
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\oazri\suda\resources\views/panel/settings/roles/create.blade.php ENDPATH**/ ?>