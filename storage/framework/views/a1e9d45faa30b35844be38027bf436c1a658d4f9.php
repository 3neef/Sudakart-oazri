
<?php $__env->startSection('title', __('adminBody.update_reason')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="card tab2-card">
        <div class="card-body">
            <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                <li class="nav-item"><a class="nav-link active show" id="restriction-tabs" data-bs-toggle="tab"
                        href="#restriction" role="tab" aria-controls="restriction" aria-selected="false"
                        data-original-title="" title=""><?php echo e(__('adminBody.update_card')); ?></a></li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="restriction" role="tabpanel"
                    aria-labelledby="restriction-tabs">
                    <form method="POST" action="<?php echo e(route('admin.card.update', $card->id)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="form-group row">
                            <label for="validationCustom4" class="col-xl-3 col-md-4"><?php echo e(__('adminBody.Amount')); ?></label>
                            <div class="col-md-7">
                                <input class="form-control" value="<?php echo e($card->amount); ?>" name="amount" id="amount" type="number" step="100">
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="submit" class="btn btn-primary" value="<?php echo e(__('adminBody.save')); ?>"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\mazin projects\sudakart-latest-2023\resources\views/panel/settings/cards/edit.blade.php ENDPATH**/ ?>