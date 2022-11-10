
<?php $__env->startSection('title', 'Add New Offer'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                aria-selected="true" data-original-title="" title="">New</a></li>
                    </ul>
                    <?php if($errors->count() > 0): ?>
                    <?php echo e($errors); ?>

                        
                    <?php endif; ?>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="account" role="tabpanel"
                            aria-labelledby="account-tab">
                            <form method="POST" action="<?php echo e(route('admin.offers.store')); ?>" class="needs-validation user-add">
                                <?php echo csrf_field(); ?>
                                <h4>Account</h4>
                                <div class="form-group row">
                                    <label for="validationCustom0"
                                        class="col-xl-3 col-md-4"><span>*</span>Name</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="name" name="name" type="text"
                                            required="">
                                    </div>
                                    <?php if($errors->has('name')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('name')); ?>

                                    </div>
                                <?php endif; ?>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span> English Name</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="en_name" name="en_name" type="text"
                                            required="">
                                    </div>
                                    <?php if($errors->has('en_name')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('en_name')); ?>

                                    </div>
                                <?php endif; ?>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span> Discount</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="discount" name="discount" type="number"
                                        step="0.01"
                                            required="">
                                    </div>
                                     <?php if($errors->has('discount')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('discount')); ?>

                                    </div>
                                <?php endif; ?>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span>Expire At</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="expire_at" name="expire_at" type="date"
                                            required="">
                                    </div>
                                     <?php if($errors->has('expire_at')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('expire_at')); ?>

                                    </div>
                                <?php endif; ?>
                                </div>
                                <div id="dynamicAddRemove" class="addandremove">
                                    <div class="form-group row">
                                        <label for="validationCustom2"
                                            class="col-xl-3 col-md-4"><span>*</span>Product</label>
                                        <div class="col-xl-8 col-md-7">
                                                <select class="custom-select w-100 form-control <?php echo e($errors->has('brand') ? 'is-invalid' : ''); ?>" id="products[0][product_id]" name="products[0][product_id]" required>
                                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($id); ?>" <?php echo e(old('product_id') == $id ? 'selected' : ''); ?>><?php echo e($entry); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                        </div>
                                         <?php if($errors->has('products[0][product_id]')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('products[0][product_id]')); ?>

                                    </div>
                                <?php endif; ?>
                                    </div>
                                </div>
                                <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add Product</button></td>
                                <div class="pull-right">
                                    <input type="submit" class="btn btn-primary"></input>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<script src="<?php echo e(asset('assets/js/jquery-3.3.1.min.js')); ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append(`<section class="pt-1 border-top mt-3">
        <div class="form-group row">
            <label for="validationCustom2"
                class="col-xl-3 col-md-4"><span>*</span>Product</label>
            <div class="col-xl-8 col-md-7">` +
                '<select class="custom-select w-100 form-control <?php echo e($errors->has('') ? '' : ''); ?>" id="products['+i+'][product_id]" name="products['+i+'][product_id]" required>'
                + `
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($id); ?>" <?php echo e(old('product_id') == $id ? 'selected' : ''); ?>><?php echo e($entry); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>` + '<div style="text-align: right; cursor: pointer; margin-right: 5.7rem" class="remove-input-field"><i class="fa fa-trash-o text-danger h5" aria-hidden="true"></i> </div></section>'); 
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('section').remove();
    });
</script>
    
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/panel/promotions/offers/create.blade.php ENDPATH**/ ?>