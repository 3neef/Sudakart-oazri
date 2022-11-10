
<?php $__env->startSection('title', __('adminBody.SALES_REPORT')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
    <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                aria-selected="true" data-original-title="" title=""><?php echo e(__('adminBody.New')); ?></a></li>
                    </ul>
                    <?php if($errors->count() > 0): ?>
                    <?php echo e($errors); ?>

                        
                    <?php endif; ?>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="account" role="tabpanel"
                            aria-labelledby="account-tab">
                            <form method="GET" action="<?php echo e(route('admin.sales-report.request')); ?>" class="needs-validation user-add">
                                <h4><?php echo e(__('adminBody.find_sales')); ?></h4>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('adminBody.Vendors')); ?></label>
                                    <div class="col-md-7">
                                        <div class="button-container" style=" margin-bottom: 10px;">
                                            <button type="button" onclick="selectAll()"><?php echo e(__('adminBody.Select_All')); ?></button>
                                            <button type="button" onclick="deselectAll()"><?php echo e(__('adminBody.Deselect_All')); ?></button>
                                        </div>
                                        <select class="js-example-basic-multiple form-control" name="vendors[]" multiple="multiple">
                                            <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($id); ?>" <?php echo e(old('vendor_id') == $id ? 'selected' : ''); ?>><?php echo e($entry); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('adminBody.from')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="date_from" name="date_from" type="date"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('adminBody.to')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="date_to" name="date_to" type="date"
                                            required="">
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <input type="submit" class="btn btn-primary"></input>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    

                    <div class="card-details-title">
                        <h3><?php echo e(__('adminBody.Total_Sales')); ?> <span><?php echo money($products->sum('total'),'OMR'); ?></span></h3>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="table list-digital all-package table-category "
                            id="editableTable">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('adminBody.no')); ?></th>
                                    <th><?php echo e(__('adminBody.product_image')); ?></th>
                                    <th><?php echo e(__('adminBody.Product_Name')); ?></th>
                                    <th><?php echo e(__('adminBody.product_category')); ?></th>
                                    <th><?php echo e(__('adminBody.price')); ?></th>
                                    <th><?php echo e(__('adminBody.Quantity')); ?></th>
                                    <th><?php echo e(__('adminBody.total')); ?></th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($product->id); ?></td>

                                    <td>
                                    
                                        <img src="<?php echo e(asset($product->product->first)); ?>"
                                            data-field="image" alt="
                                            ">
                                        
                                    </td>
                                        
                                    <td data-field="name"><?php echo e($product->product->name); ?></td>
                                    <?php if($product->product->category->name): ?>
                                    
                                    <td data-field="price"><?php echo e($product->product->category->name); ?></td>
                                    <?php else: ?>
                                    
                                    <td data-field="price"><?php echo e($product->product->name); ?></td>
                                    <?php endif; ?>

                                    <td data-field="name"><?php echo e($product->price); ?></td>

                                    <td data-field="name"><?php echo e($product->quantity); ?></td>

                                    <td data-field="name"><?php echo e($product->total); ?></td>

                                </tr>
                                    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <?php echo $products->withQueryString()->links(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/panel/reports/sales/index.blade.php ENDPATH**/ ?>