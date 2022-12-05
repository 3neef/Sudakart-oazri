
<?php $__env->startSection('title', __('adminBody.update_a_product')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
                <?php if($errors->any()): ?>
                <section class="col-lg-12">
                
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="alert alert-danger d-flex justify-content-between align-items-center">
                            <?php echo e($error); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                </section>
                <?php endif; ?>
    <form method="POST" action="<?php echo e(route('admin.products.update', $pro->id)); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
       <?php echo method_field('PUT'); ?>
        <div class="row product-adding">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5><?php echo e(__('form.general')); ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="digital-add needs-validation">
                            <div class="form-group">
                                <label for="validationCustom01" class="col-form-label pt-0"><span>*</span>
                                    <?php echo e(__('body.name')); ?></label>
                                <input class="form-control" value="<?php echo e($pro->name); ?>" name="name" type="text" required="">
                            </div>
                            <div class="form-group">
                                <label for="validationCustom01" class="col-form-label pt-0"><span>*</span>
                                    <?php echo e(__('form.en_name')); ?></label>
                                <input class="form-control"  value="<?php echo e($pro->en_name); ?>" name="en_name"  type="text" required="">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label categories-basic"><span>*</span>
                                    <?php echo e(__('form.categories')); ?></label>
                                <select class="custom-select form-control <?php echo e($errors->has('category') ? 'is-invalid' : ''); ?>" name="category_id" value="<?php echo e($pro->category_id); ?>" required>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($id); ?>" <?php echo e(old('category_id') == $id ? 'selected' : ''); ?>><?php echo e($entry); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="validationCustom02" class="col-form-label"><span>*</span>
                                    <?php echo e(__('body.price')); ?></label>
                                <input class="form-control"  value="<?php echo e($pro->price); ?>" name="price" step="0.1"  type="number" required="">
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02" class="col-form-label"><span>*</span>
                                    <?php echo e(__('body.sku')); ?></label>
                                <input class="form-control"   value="<?php echo e($pro->sku != null ? $pro->sku : 'N/A'); ?>" id="sku" name="sku" type="text" required="">
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02" class="col-form-label"><span>*</span>
                                    <?php echo e(__('form.cost')); ?></label>
                                <input class="form-control"  value="<?php echo e($pro->cost > 0 ? $pro->cost : 0); ?>" min="<?php echo e($pro->cost < 0 ? 0 : 0); ?>" name="cost"  type="number" required="">
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02" class="col-form-label"><span>*</span>
                                    <?php echo e(__('body.quantity')); ?></label>
                                <input class="form-control"  value="<?php echo e($pro->quantity > 0 ? $pro->quantity : 0); ?>" min="<?php echo e($pro->quantity < 0 ? 0 : 0); ?>" name="quantity"  type="number" required="">
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02" class="col-form-label"><span>*</span>
                                    <?php echo e(__('form.warranty')); ?></label>
                                <input class="form-control"  value="<?php echo e($pro->warranty); ?>" name="warranty"  type="text">
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02" class="col-form-label"><span>*</span>
                                    <?php echo e(__('body.weight')); ?></label>
                                <input class="form-control"  id="weight" name="weight" value="<?php echo e($pro->weight); ?>" type="number">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label"><span>*</span><?php echo e(__('body.free_shipping')); ?></label>
                                <div class="m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                    <label class="d-block" for="edo-ani">
                                        <input class="radio_animated" id="edo-ani" value="1" type="radio"
                                            name="frs" <?php echo e($pro->frs == 1 ? 'checked' : ''); ?>>
                                        <?php echo e(__('form.free')); ?>

                                    </label>
                                    <label class="d-block" for="edo-ani1">
                                        <input class="radio_animated" id="edo-ani1" value="0" type="radio"
                                            name="frs" <?php echo e($pro->frs == 0 ? 'checked' : ''); ?>>
                                        <?php echo e(__('form.regular')); ?>

                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02" class="col-form-label"><span></span>
                                    <?php echo e(__('body.image')); ?></label>
                                    <input class="form-control" type="file" id="formFileMultiple" id="images" name="images[]" multiple />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5><?php echo e(__('form.add_des')); ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="digital-add needs-validation">
                            <div class="form-group mb-0">
                                <div class="description-sm">
                                    <textarea value="<?php echo e($pro->description); ?>" name="description" cols="10" rows="4"><?php echo e($pro->description); ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5><?php echo e(__('form.add_en_des')); ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="digital-add needs-validation">
                            <div class="form-group mb-0">
                                <div class="description-sm">
                                    <textarea value="<?php echo e($pro->en_description); ?>" name="en_description" cols="10" rows="4"><?php echo e($pro->en_description); ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5><?php echo e(__('body.options')); ?></h5>
                    </div>
                    <div class="card-body">
                        <div id="dynamicAddRemove" class="addandremove">
                            <div class="form-group row">
                                <label for="validationCustom2"
                                    class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('adminBody.option')); ?></label>
                                <div class="col-xl-8 col-md-7">
                                        <select class="custom-select w-100 form-control <?php echo e($errors->has('brand') ? 'is-invalid' : ''); ?>" id="options[0][option_id]" name="options[0][option_id]" >
                                            <option value="" selected><?php echo e(__('body.Choose')); ?></option>
                                            <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($id); ?>" <?php echo e(old('optilon_id') == $id ? 'selected' : ''); ?>><?php echo e($entry); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02" class="col-form-label"><span>*</span>
                                    <?php echo e(__('form.increment')); ?></label>
                                <input class="form-control"  id="options[0][increment]" name="options[0][increment]"  type="number">
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02" class="col-form-label"><span>*</span>
                                    <?php echo e(__('body.quantity')); ?></label>
                                <input class="form-control"  id="options[0][quantity]" name="options[0][quantity]"  type="number" >
                            </div>
                        </div>
                        <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary"><?php echo e(__('form.add_other_op')); ?></button></td>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group mb-0">
            <div class="product-buttons">
                <button type="submit" class="btn btn-outline-primary"><?php echo e(__('adminBody.save')); ?></button>
            </div>
        </div>
    </form>
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
                class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('adminBody.option')); ?></label>
            <div class="col-xl-8 col-md-7">` +
                '<select class="custom-select w-100 form-control <?php echo e($errors->has('') ? '' : ''); ?>" id="options['+i+'][option_id]" name="options['+i+'][option_id]" required>'
                + `
                <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($id); ?>" <?php echo e(old('option_id') == $id ? 'selected' : ''); ?>><?php echo e($entry); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="validationCustom02" class="col-form-label"><span>*</span>
                <?php echo e(__('form.increment')); ?></label>
                    <input class="form-control"  id="options[`+i+`][increment]" name="options[`+i+`][increment]"  type="number" required="">
        </div>
        <div class="form-group">
            <label for="validationCustom02" class="col-form-label"><span>*</span>
                <?php echo e(__('body.quantity')); ?></label>
            <input class="form-control"  id="options[`+i+`][quantity]" name="options[`+i+`][quantity]"  type="number" required="">
        </div>
                            ` + '<div style="text-align: right; cursor: pointer; margin-right: 5.7rem" class="remove-input-field"><i class="fa fa-trash-o text-danger h5" aria-hidden="true"></i> </div></section>'); 
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('section').remove();
    });
</script>
    
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\mazin projects\sudakart-latest-2023\resources\views/panel/products/edit.blade.php ENDPATH**/ ?>