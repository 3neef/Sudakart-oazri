<?php $__env->startSection('content'); ?>

<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row" style="padding-top: 20px;">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2><?php echo e(__('body.checkout')); ?></h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><?php echo e(__('body.home')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('body.checkout')); ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!-- section start -->
<section class="section-b-space">
    <div class="container">
         <?php if($errors->any()): ?>
           <div class="row">
             <div class="col-lg-12">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="alert alert-danger">
                    <?php echo e($error); ?>

                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </div>
           </div>
          <?php endif; ?>
        <div class="checkout-page">
            <div class="checkout-form">
                <form action="<?php echo e(route('order.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-title">
                                <h3><?php echo e(__('body.billing_details')); ?></h3>
                            </div>
                            <div class="row check-out">
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label"><?php echo e(__('body.name')); ?></div>
                                    <input type="text" name="name" value="<?php echo e(Auth::guard('web')->user()->userable->name); ?>" placeholder="Name" required>
                                </div>
                                
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label"><?php echo e(__('body.phone')); ?></div>
                                    <input type="text" name="phone" value="<?php echo e(Auth::guard('web')->user()->phone); ?>" placeholder="" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label"><?php echo e(__('body.email')); ?></div>
                                    <input type="text" name="email" value="<?php echo e(Auth::guard('web')->user()->email); ?>" placeholder="" required>
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label"><?php echo e(__('body.region')); ?></div>
                                    <select name="region_id" id="region_id" class="form-control" required>
                                        <option value="" selected><?php echo e(__('body.Select_region')); ?></option>
                                        <?php $__empty_1 = true; $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        
                                        <?php if($region['state'] != '.'): ?>
                                        <option value="<?php echo e($region['region_id']); ?>">
                                            <?php echo e($region['state']); ?>

                                            </option>
                                        <?php endif; ?>
                                            
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            
                                        <?php endif; ?>
                                    </select>
                                    
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label"><?php echo e(__('body.address')); ?></div>
                                    <input type="text" name="address" value="" placeholder="<?php echo e(__('body.address')); ?>" required>
                                </div>

                                <div>
                                    <input type="hidden" name="coupon_id" id="coupon-hidden-input">
                                </div>
                                <div>
                                    <input type="hidden" name="coupon" id="coupon-code-hidden-input">
                                </div>

                               

                                <div class="form-group col-md-12 col-sm-12 col-xs-12" id="coupon-area">
                                    <div class="input-group">
                                        <input type="text" id="coupon-input" placeholder="" 
                                         class="form-control">
                                         <div class="input-group-prepend">
                                            <input class="btn btn-warning" id="apply-coupon-btn" value="<?php echo e(__('body.apply_coupon')); ?>">
                                          </div>
                                        
                                     </div>
                                </div>
                               
                               
                              
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-details">
                                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('show-check-out')->html();
} elseif ($_instance->childHasBeenRendered('Sr5eT9I')) {
    $componentId = $_instance->getRenderedChildComponentId('Sr5eT9I');
    $componentTag = $_instance->getRenderedChildComponentTagName('Sr5eT9I');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Sr5eT9I');
} else {
    $response = \Livewire\Livewire::mount('show-check-out');
    $html = $response->html();
    $_instance->logRenderedChild('Sr5eT9I', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                <div class="payment-box">
                                    <div class="upper-box">
                                        <div class="payment-options">
                                            <h4 class="mb-3"><?php echo e(__('body.shipping_cost')); ?></h4>
                                            <input type="text" name="shipping_cost_input" id="shipping_cost_input" readonly>
                                            <input type="hidden" name="shipping_cost" id="shipping_cost">
                                            <div style="display: flex; flex-direction: row; width:80%">
                                                
                                            </div>
                                            
                                        </div>
                                        <div class="payment-options">
                                            <h4 class="mb-3"><?php echo e(__('body.payment_method')); ?></h4>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                
                                                <select name="payment_method" id="payment_method" class="form-control" required>
                                                    <option value="" selected><?php echo e(__('labels.select_payment')); ?></option>
                                                    <option value="cash">
                                                    <?php echo e(__('body.cash')); ?>

                                                    </option>
                                                    <option value="online">
                                                    <?php echo e(__('body.online')); ?>

                                                    </option>
                                                    <option value="bank">
                                                        <?php echo e(__('body.bank_transfer')); ?>

                                                    </option>
                                                </select>
                                                
                                            </div>
                                            
                                        </div>
                                       
                                    </div>
                                    <div class="text-end"> <input type="submit" value="<?php echo e(__('body.place_order')); ?>" class="btn-solid btn"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- section end -->

<?php $__env->stopSection(); ?>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="bank-info-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLongTitle"><?php echo e(__('body.bank_title')); ?></h5>
            </div>
            <div class="modal-body">
               <h5><?php echo e(__('labels.bank_account_name')); ?></h5>
               <h5><?php echo e(__('labels.bank_name')); ?></h5>
               <h5><?php echo e(__('labels.account_number')); ?> : 0375042367640016</h5>
               <h5><?php echo e(__('labels.send_on_whats')); ?> : 93734317 <?php echo e(__('labels.confirm_order')); ?></h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="clsBtnBank" data-dismiss="modal"><?php echo e(__('body.Close')); ?></button>

            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('custom-js'); ?>
<script>
    $(document).ready(function() {
        $("#region_id").on('change', function() {
            var region_id = $(this).val();
            $("#shipping_cost_input").val("<?php echo e($regions[0]['region_delivery_fee']); ?>");
            $("#shipping_cost").val("<?php echo e($regions[0]['region_delivery_fee']); ?>");
        });

        $("#payment_method").on('change', function() {
            var payment_method = $(this).val();
            if(payment_method == 'bank') {
                $('#bank-info-modal').modal('show');
            }
        });

        $('#clsBtnBank').on('click',function () {  
            $('#bank-info-modal').modal('hide');
        });
        
    })
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('main/layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/main/checkout/index.blade.php ENDPATH**/ ?>