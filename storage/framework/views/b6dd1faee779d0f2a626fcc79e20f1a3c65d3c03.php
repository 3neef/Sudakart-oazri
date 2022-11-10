
<?php $__env->startSection('title', 'Add A Slider Ad'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="card tab2-card">
        <div class="card-body">
            <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                <li class="nav-item"><a class="nav-link active show" id="general-tab"
                        data-bs-toggle="tab" href="#general" role="tab" aria-controls="general"
                        aria-selected="true" data-original-title="" title="">Sliders</a></li>
            </ul>
            <?php if($errors->count() > 0): ?>
                <?php echo e($errors); ?>

            <?php endif; ?>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="general" role="tabpanel"
                    aria-labelledby="general-tab">
                    <form method="POST" action="<?php echo e(route('admin.ads.store')); ?>" class="needs-validation" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <h4>Add A Slider</h4>
                        <div class="form-group row">
                            <label class="col-xl-3 col-md-4"><span>*</span>Product</label>
                            <div class="col-md-7">
                                <select class="js-example-basic-multiple form-control" name="product_id" >
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($id); ?>" <?php echo e(old('category_id') == $id ? 'selected' : ''); ?>><?php echo e($entry); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>
                                Image</label>
                            <div class="col-xl-8 col-md-7">
                                <input class="form-control" type="file" id="image" name="image">
                            </div>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/panel/promotions/ads/create.blade.php ENDPATH**/ ?>