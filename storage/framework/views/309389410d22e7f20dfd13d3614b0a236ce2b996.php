
<?php $__env->startSection('title', __('adminBody.MAKE_COMPLAINT')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="card tab2-card">
        <div class="card-body">
            <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                <li class="nav-item"><a class="nav-link active show" id="general-tab"
                        data-bs-toggle="tab" href="#general" role="tab" aria-controls="general"
                        aria-selected="true" data-original-title="" title=""><?php echo e(__('adminBody.New')); ?></a></li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="general" role="tabpanel"
                    aria-labelledby="general-tab">
                    <form method="POST" action="<?php echo e(route('admin.complaints.store')); ?>" class="needs-validation">
                        <?php echo csrf_field(); ?>
                       
                        <div class="form-group row">
                            <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>
                                <?php echo e(__('adminBody.Subject')); ?></label>
                            <div class="col-xl-8 col-md-7">
                                <input class="form-control" id="validationCustom0" name="subject" type="text">
                            </div>
                        </div>
                        <div class="form-group row editor-label">
                            <label class="col-xl-3 col-md-4"><span>*</span> <?php echo e(__('adminBody.Description')); ?></label>
                            <div class="col-xl-8 col-md-7">
                                <div class="editor-space">
                                    <textarea id="editor1" name="body" cols="30"
                                        rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary"><?php echo e(__('adminBody.save')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/panel/complaints/index.blade.php ENDPATH**/ ?>