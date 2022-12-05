
<?php $__env->startSection('title', __('body.Order_Details')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <?php if(auth()->user()->userable_type == 'App\Models\Admin'): ?>
                    <a href="javascript:void(0)" class="btn btn-primary mt-md-0 mt-2 asign-ticket">
                        <?php echo e(__('adminBody.new_product')); ?>

                    </a>
                    <?php endif; ?>
                </div>
                <section class="section-b-space pt-0 ratio_asos">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="returned-message"></div>
                                <div class="card">
                                    <div class="card-header">
                                        <div class="header-title">
                                            <h4 style="<?php if(app()->getLocale() == 'en'): ?>float: left; <?php else: ?> float: right; <?php endif; ?> "><?php echo e(__('body.Order_Details')); ?></h4>
                                            <div style="<?php if(app()->getLocale() == 'en'): ?>float: right; <?php else: ?> float: left; <?php endif; ?>">                                                  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                        <table class="table table-striped table-hovered">
                                            <thead>
                                                <th>#<?php echo e(__('body.refrence_number')); ?></th>
                                                <th><?php echo e(__('body.date')); ?></th>
                                                <th><?php echo e(__('body.product')); ?></th>
                                                <th><?php echo e(__('body.quantity')); ?></th>
                                                <th><?php echo e(__('body.price')); ?></th>
                                                <?php if(auth()->user()->userable_type == 'App\Models\Admin'): ?>
                                                <th><?php echo e(__('body.payment_status')); ?></th>
                                                <th><?php echo e(__('adminBody.Actions')); ?></th>
                                                <?php endif; ?>
                                            </thead>
                                            <tbody>

                                                <?php $__currentLoopData = $order->newProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $one): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>

                                                    <td><?php echo e($one->pivot->id); ?></td>
                                                    <td><?php echo e($one->pivot->created_at); ?></td>
                                                    <td>
                                                        <?php if(app()->getLocale() == 'en'): ?>
                                                        <?php echo e($one->en_name); ?>

                                                        <?php else: ?>
                                                        <?php echo e($one->name); ?>

                                                        <?php endif; ?>    
                                                    </td>
                                                    <td><?php echo e($one->pivot->quantity); ?></td>
                                                    <td><?php echo e(number_format($one->pivot->price * $one->pivot->quantity,2)); ?>

                                                    </td>
                                                    <?php if(auth()->user()->userable_type == 'App\Models\Admin'): ?>
                                                    <td>
                                                        <?php if($order->payment): ?>
                                                        <?php echo e($order->payment->status); ?>

                                                        <?php else: ?>
                                                        <?php echo e(__('body.Pending')); ?>

                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo e(route('admin.products.deleteItem', $one->pivot->id)); ?>">
                                                            <i style="color: red;" class="fa fa-trash" title="<?php echo e(__('body.delete')); ?>"></i>
                                                        </a>
                                                    </td>
                                                    <?php endif; ?>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                        </div>
                                        
                                    </div>
                                    <div class="card-footer">

                                    </div>
                                </div>
                            </div>
                            
                            <?php if(auth()->user()->userable_type == 'App\Models\Admin' && $delivery['status'] != 0): ?>
                            <div class="col-lg-12 mt-3">
                                <div id="returned-message"></div>
                                <div class="card">
                                    <div class="card-header">
                                        <div class="header-title">
                                            <h4 style="<?php if(app()->getLocale() == 'en'): ?>float: left; <?php else: ?> float: right; <?php endif; ?>"><?php echo e(__('body.Delivery_Details')); ?></h4>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hovered">
                                            <thead>
                                                <th>#<?php echo e(__('body.refrence_number')); ?></th>
                                                <th><?php echo e(__('body.address')); ?></th>
                                                <th><?php echo e(__('body.address')); ?></th>
                                                <th><?php echo e(__('body.cash')); ?></th>
                                                <th><?php echo e(__('body.status')); ?></th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo e($delivery['data']['ref_no']); ?></td>
                                                    <td>
                                                        <?php echo e($delivery['data']['phone']); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($delivery['data']['region'] . ' , ' .
                                                        $delivery['data']['address']); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($delivery['data']['price']); ?>

                                                    </td>
                                                    <td>
                                                        <?php if($order->status == 'pending' ): ?>
                                                        <?php echo e(__('body.Pending')); ?>

                                                        <?php elseif($order->status == 'in progress'): ?>
                                                        <?php echo e(__('body.in_progress')); ?>

                                                        <?php elseif($order->status == 'completed'): ?>
                                                        <?php echo e(__('body.order_completed')); ?>

                                                        <?php elseif($order->status == 'canceled'): ?>
                                                        <?php echo e(__('body.canceled')); ?>

                                                        <?php endif; ?>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                    <div class="card-footer">

                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="return-order-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLongTitle">
                    <?php if(app()->getLocale() == 'en'): ?>
                                                Add a Product
                                                
                                                <?php else: ?>
                                                إضافة منتج
                                                    
                                                <?php endif; ?>
                </h5>
            </div>
            <div class="modal-body">
                <form id="asign-ticket" action="<?php echo e(route('admin.products.newItem')); ?>" method="POST" id="return-order-form">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                     <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>">


                    <div class="form-group">
                        <label for=""><?php echo e(__('body.Choose')); ?></label>
                        <div class="col-md-7">
                        <select class="form-control" name="product_id" style="width: 100%" id="stockId" required>
                            <option value=""></option>
                        </select>
                        </div>
                    </div>
                    <div id="product-options">

                    </div>

                    <div class="form-group">
                        <input type="submit" value="<?php echo e(__('adminBody.save')); ?>" class="btn btn-success">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="clsBtnFooter" data-dismiss="modal"><?php echo e(__('body.Close')); ?></button>

            </div>
        </div>
    </div>
</div>

<script src="<?php echo e(asset('main/js/modal/order.js')); ?>" defer></script>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            
            var dir = "<?php echo e(app()->getLocale()); ?>";
            var lang = "";

            if(dir == 'en')
            {
                lang = 'ltr';
            }else{
                lang = 'rtl';
            }

        $('#select2_modal').select2({
            dropdownParent: $('#return-order-modal'),
            dir:lang 
        });
            $('#stockId').select2({
            dropdownParent: $('#return-order-modal'),
            dir:lang, 
            ajax : {
                url: "<?php echo e(route('admin.products.getProducts')); ?>",
                type : "get" ,
                dataType : "json",
                data : function (params) {
                    return {
                        search : params.term
                    };
                } ,
                processResults: function (response) {
                    return{
                    results : response
                    };
                },
                cache: true
                }
            });

            $('#stockId').on('change', function(){
                var id = $(this).val();
                $.ajax({
                    url : "<?php echo e(route('admin.products.getOptions')); ?>",
                    data:{product_id:id},
                    success:function(result){
                        if(result.length > 0){
                            $('#product-options').html(result);
                        }else {
                            $('#product-options').html('no options');
                        }
                        
                    }
                });
            });
    });
        $('.asign-ticket').on('click',function () {  
        $('#return-order-modal').modal('show');
    });
    </script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\mazin projects\sudakart-latest-2023\resources\views/panel/orders/show.blade.php ENDPATH**/ ?>