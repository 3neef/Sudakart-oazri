
<?php $__env->startSection('title', 'Edit A Product'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <?php if($errors->count() > 0): ?>
        <?php echo e($errors); ?>

    <?php endif; ?>
    <form method="POST" action="<?php echo e(route('admin.products.update', $pro->id)); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
       <?php echo method_field('PUT'); ?>
        <div class="row product-adding">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5>General</h5>
                    </div>
                    <div class="card-body">
                        <div class="digital-add needs-validation">
                            <div class="form-group">
                                <label for="validationCustom01" class="col-form-label pt-0"><span>*</span>
                                    Name</label>
                                <input class="form-control" value="<?php echo e($pro->name); ?>" name="name" type="text" required="">
                            </div>
                            <div class="form-group">
                                <label for="validationCustom01" class="col-form-label pt-0"><span>*</span>
                                    English Name</label>
                                <input class="form-control"  value="<?php echo e($pro->en_name); ?>" name="en_name"  type="text" required="">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label categories-basic"><span>*</span>
                                    Categories</label>
                                <select class="custom-select form-control <?php echo e($errors->has('category') ? 'is-invalid' : ''); ?>" name="category_id" value="<?php echo e($pro->category_id); ?>" required>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($id); ?>" <?php echo e(old('category_id') == $id ? 'selected' : ''); ?>><?php echo e($entry); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="validationCustom02" class="col-form-label"><span>*</span>
                                    Product Price</label>
                                <input class="form-control"  value="<?php echo e($pro->price); ?>" name="price" step="0.1"  type="number" required="">
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02" class="col-form-label"><span>*</span>
                                    Product SKU</label>
                                <input class="form-control"   value="<?php echo e($pro->sku != null ? $pro->sku : 'N/A'); ?>" id="sku" name="sku" type="text" required="">
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02" class="col-form-label"><span>*</span>
                                    Product Cost</label>
                                <input class="form-control"  value="<?php echo e($pro->cost > 0 ? $pro->cost : 0); ?>" min="<?php echo e($pro->cost < 0 ? 0 : 0); ?>" name="cost"  type="number" required="">
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02" class="col-form-label"><span>*</span>
                                    Product Quantity</label>
                                <input class="form-control"  value="<?php echo e($pro->quantity > 0 ? $pro->quantity : 0); ?>" min="<?php echo e($pro->quantity < 0 ? 0 : 0); ?>" name="quantity"  type="number" required="">
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02" class="col-form-label"><span>*</span>
                                    Product Warranty</label>
                                <input class="form-control"  value="<?php echo e($pro->warranty); ?>" name="warranty"  type="text" required="">
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02" class="col-form-label"><span>*</span>
                                    Product weight</label>
                                <input class="form-control"  id="weight" name="weight" value="<?php echo e($pro->weight); ?>" type="number" required="">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label"><span>*</span> Shipping</label>
                                <div class="m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                    <label class="d-block" for="edo-ani">
                                        <input class="radio_animated" id="edo-ani" value="1" type="radio"
                                            name="frs">
                                        Free
                                    </label>
                                    <label class="d-block" for="edo-ani1">
                                        <input class="radio_animated" id="edo-ani1" value="0" type="radio"
                                            name="frs">
                                        Regular
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02" class="col-form-label"><span></span>
                                    Product Images</label>
                                    <input class="form-control" type="file" id="formFileMultiple" id="images" name="images[]" multiple />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Add Description</h5>
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
                        <h5>Add an English Description</h5>
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
                        <h5>Options</h5>
                    </div>
                    <div class="card-body">
                        <div id="dynamicAddRemove" class="addandremove">
                            <div class="form-group row">
                                <label for="validationCustom2"
                                    class="col-xl-3 col-md-4"><span>*</span>Option</label>
                                <div class="col-xl-8 col-md-7">
                                        <select class="custom-select w-100 form-control <?php echo e($errors->has('brand') ? 'is-invalid' : ''); ?>" id="options[0][option_id]" name="options[0][option_id]" >
                                            <option value="" selected>choose</option>
                                            <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($id); ?>" <?php echo e(old('optilon_id') == $id ? 'selected' : ''); ?>><?php echo e($entry); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02" class="col-form-label"><span>*</span>
                                    Option Increment</label>
                                <input class="form-control"  id="options[0][increment]" name="options[0][increment]"  type="number">
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02" class="col-form-label"><span>*</span>
                                    Option Quantity</label>
                                <input class="form-control"  id="options[0][quantity]" name="options[0][quantity]"  type="number" >
                            </div>
                        </div>
                        <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add another Option</button></td>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group mb-0">
            <div class="product-buttons">
                <input type="submit" class="btn btn-primary"></input>
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
                class="col-xl-3 col-md-4"><span>*</span>Product</label>
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
                Option Increment</label>
                    <input class="form-control"  id="options[`+i+`][increment]" name="options[`+i+`][increment]"  type="number" required="">
        </div>
        <div class="form-group">
            <label for="validationCustom02" class="col-form-label"><span>*</span>
                Option Quantity</label>
            <input class="form-control"  id="options[`+i+`][quantity]" name="options[`+i+`][quantity]"  type="number" required="">
        </div>
                            ` + '<div style="text-align: right; cursor: pointer; margin-right: 5.7rem" class="remove-input-field"><i class="fa fa-trash-o text-danger h5" aria-hidden="true"></i> </div></section>'); 
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('section').remove();
    });
</script>
    
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\oazri\suda\resources\views/panel/products/edit.blade.php ENDPATH**/ ?>