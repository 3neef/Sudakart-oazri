<?php $__env->startSection('title', 'Update | Roles'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="card tab2-card">
		<div class="card-body">
			<ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
				<li class="nav-item"><a class="nav-link active show" id="restriction-tabs" data-bs-toggle="tab"
						href="#restriction" role="tab" aria-controls="restriction" aria-selected="false"
						data-original-title="" title="">Update an Roles</a></li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade active show" id="restriction" role="tabpanel"
					aria-labelledby="restriction-tabs">
					<form method="POST" action="<?php echo e(route('admin.roles.update', $role->id)); ?>">
						<?php echo csrf_field(); ?>
						<?php echo method_field('PUT'); ?>
						<div class="form-group row">
							<label for="validationCustom4" class="col-xl-3 col-md-4">role Name</label>
							<div class="col-md-7">
								<input class="form-control" value="<?php echo e($role->name); ?>" name="name" id="name" type="text">
							</div>
						</div>

						<div class="row">
							<label for="">All Permissions</label>
							
							<?php $__empty_1 = true; $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
							<?php
							$checkedPer = $role->permissions->where('id', $permission->id)->first();
							?>
							<label class="custom-control custom-radio col-3">
								<div class="form-check">
									<label class="form-check-label">
										<input type="checkbox" class="form-check-input" name="permissions[]"
											id="permissions" value="<?php echo e($permission->id); ?>" <?php echo e($checkedPer ? 'checked' : ''); ?>>
										<?php echo e($permission->name); ?>

									</label>
								</div>
							</label>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

							<?php endif; ?>
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
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\oazri\suda\resources\views/panel/settings/roles/edit.blade.php ENDPATH**/ ?>