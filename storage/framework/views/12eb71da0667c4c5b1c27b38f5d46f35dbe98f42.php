
<?php $__env->startSection('title', 'Outbound List'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                aria-selected="true" data-original-title="" title=""><?php echo e(__('adminNav.regions')); ?></a></li>
                    </ul>
                    <?php if($errors->count() > 0): ?>
                    <?php echo e($errors); ?>

                        
                    <?php endif; ?>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="account" role="tabpanel"
                            aria-labelledby="account-tab">
                            <form method="GET" action="<?php echo e(route('admin.orders.outBoundCity')); ?>" class="needs-validation user-add">
                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('body.region')); ?></label>
                                    <div class="col-md-7">
                                            <select class="form-control" name="city_id" style="width: 100%" id="cityId" required>
                                                <option value=""></option>
                                            </select>
                                        </select>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <input type="submit" class="btn btn-primary" value="<?php echo e(__('body.search-btn')); ?>"></input>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <form method="POST" action="<?php echo e(route('admin.orders.outbound.drivers')); ?>" class="needs-validation" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                <div class="table-responsive table-desi">
                    <table class="table all-package">
                    <thead>
                        <tr>
                            <th><input id="selectAll" type="checkbox"></th>
                            <th><?php echo e(__('adminBody.Ref_No')); ?></th>
                            <th><?php echo e(__('adminBody.customer_name')); ?></th>
                            <th><?php echo e(__('adminBody.Product_Name')); ?></th>
                            <th><?php echo e(__('adminDash.payment_method')); ?></th>
                            <th><?php echo e(__('adminBody.delivery_amount')); ?></th>
                            <th><?php echo e(__('adminBody.order_status')); ?></th>
                            <th><?php echo e(__('adminBody.date')); ?></th>
                            <th><?php echo e(__('adminBody.total')); ?></th>
                            <th><?php echo e(__('adminBody.Approved')); ?></th>
                            <th><?php echo e(__('adminBody.manage')); ?></th>
                            <th><?php echo e(__('adminBody.Actions')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                    <tr>
                        <td><input name="ids[]" value="<?php echo e($order->id); ?>" type="checkbox" ></td>
                        <td>#<?php echo e($order->id); ?></td>
                        <td><?php echo e($order->customer ? $order->customer->name : 'deleted'); ?></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <?php $__currentLoopData = $order->products->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <img src="<?php echo e(asset($product->product->first)); ?>" alt=""
                                        class="img-fluid img-30 me-2 blur-up lazyloaded">
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </td>
                        <td>
                            <?php if($order->payment_method == 'online'): ?>
                            <span class="badge badge-secondary"><?php echo e(__('body.online')); ?></span>
                            <?php elseif($order->payment_method == 'bank'): ?>
                            <span class="badge badge-dark"><?php echo e(__('body.bank_transfer')); ?></span>
                            <?php else: ?>
                            <span class="badge badge-danger"><?php echo e(__('body.cash')); ?></span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($order->delivery_amount); ?></td>
                        <td>
                            <a  href="javascript:void(0)"  class="<?php echo e($order->handover == 1 ? 'disabled' : ''); ?>" style="<?php echo e($order->handover == 1 ? 'pointer-events: none;' : ''); ?>">
                                <span data-id="<?php echo e($order->id); ?>" 
                                    class=" badge
                                    <?php if($order->status == 'pending'): ?>
                                        badge-danger
                                    <?php elseif($order->status == 'in progress'): ?>
                                        badge-info
                                    <?php elseif($order->status == 'completed'): ?>
                                        badge-success
                                    <?php elseif($order->status == 'canceled'): ?>
                                        badge-primary
                                    <?php endif; ?>
                                        asign-ticket">
                                        <?php if($order->status == 'pending' ): ?>
                                        <?php echo e(__('body.Pending')); ?>

                                        <?php elseif($order->status == 'in progress'): ?>
                                        <?php echo e(__('body.in_progress')); ?>

                                        <?php elseif($order->status == 'completed'): ?>
                                        <?php echo e(__('body.completed')); ?>

                                        <?php elseif($order->status == 'canceled'): ?>
                                        <?php echo e(__('body.canceled')); ?>

                                        <?php endif; ?>
                                </span>
                            </a>
                        </td>
                        <td><?php echo e(\Carbon\Carbon::createFromTimestamp(strtotime($order->created_at))->format('d-m-Y')); ?></td>
                        <td>
                            <?php if(auth()->user()->userable_type == 'App\Models\Admin'): ?>
                            <?php echo money($order->total,'OMR'); ?>
                            <?php else: ?>
                            <?php echo money($order->vendor_total , 'OMR'); ?>
                            <?php endif; ?>
                        </td>
                        <?php if($order->approved == true): ?>
                        <td class="td-check">
                            <i data-feather="check-circle"></i>
                        </td>
                            
                        <?php else: ?>
                            
                        <td class="td-cross">
                            <i data-feather="x-circle"></i>
                        </td>
                        <?php endif; ?>
                        <td>
                            <span
                                class=" badge
                                <?php if($order->handover == 0): ?>
                                    badge-danger
                                <?php elseif($order->handover == 1): ?>
                                    badge-info
                                <?php endif; ?>
                                    ">
                                <?php if($order->handover == 0): ?>
                                <?php echo e(__('adminBody.self')); ?>

                                <?php elseif($order->handover == 1): ?>
                                <?php echo e(__('adminBody.party')); ?>

                                <?php endif; ?>
                            </span>
                        </td>
                        <td>
                            <div style="display: flex;">
                            <?php if(auth()->user()->userable_type == 'App\Models\Admin' && $order->delivery_ref_id == null && $order->status != 'completed' && $order->status != 'canceled' && Str::contains($order->region_id, 'region_') == false): ?>
                            <a class=" mx-1 btn btn-success" href="javascript:void(0)" style="padding: 5px 5px;">
                                <i  data-id="<?php echo e($order->id); ?>" class="fa fa-dot-circle-o px-1 status-ticket" title="<?php echo e(__('adminBody.order_handling')); ?>"></i>
                            </a>
                            <?php endif; ?>
                            <?php if(auth()->user()->userable_type == 'App\Models\Admin' && $order->approved == 0 && $order->status == 'completed'): ?>
                            <a class=" mx-1 btn btn-success" href="<?php echo e(route('admin.orders.approve', $order->id)); ?>" aria-label="Approve Order" style="padding: 5px 5px;">
                                <i class="fa fa-check-circle px-1" aria-hidden="true" title="<?php echo e(__('adminBody.approve')); ?>"></i>
                            </a>
                            <?php endif; ?>
                            <a class=" mx-1 btn btn-warning" href="<?php echo e(route('admin.orders.show', $order->id)); ?>" aria-label="Show Order" style="padding: 5px 5px;">
                                <i class="fa fa-eye  px-1" aria-hidden="true" title="<?php echo e(__('body.show')); ?>"></i>
                            </a>
                            <?php if(auth()->user()->userable_type == 'App\Models\Admin'): ?>
                            <?php if($order->status == 'pending'): ?>
                            <a class=" mx-1 btn btn-primary" href="<?php echo e(route('admin.orders.cancel', $order->id)); ?>" aria-label="Cancel Order" style="padding: 5px 5px;">
                                <i class="fa fa-ban  px-1" aria-hidden="true" title="<?php echo e(__('body.cancel_order')); ?>"></i>
                            </a>
                            <?php endif; ?>
                            <?php if($order->status != 'canceled' && $order->handover == 1 && $order->delivery_ref_id == null && Str::contains($order->region_id, 'region_') == false): ?>
                            <a class=" mx-1 btn btn-info" href="<?php echo e(route('admin.orders.sendtoDelivery', $order->id)); ?>" aria-label="Send Order To Delivery" style="padding: 5px 5px;">
                                <i class="fa fa-paper-plane  px-1" aria-hidden="true" title="<?php echo e(__('adminBody.delivery')); ?>"></i>
                            </a>
                            <?php endif; ?>

                            <a class=" mx-1 btn btn-secondary" href="<?php echo e(route('admin.orders.print', $order->id)); ?>" aria-label="Order Recipt" style="padding: 5px 5px;">
                                <i class="fa fa-file-text-o  px-1" aria-hidden="true" title="<?php echo e(__('adminBody.Download_Receipt')); ?>"></i>
                            </a>
                            <?php endif; ?>

                            </div>
                            
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="form-group row mt-5">
                <label class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('adminBody.dirvers')); ?></label>
                <div class="col-md-7">
                        <select class="form-control" name="driver_id" style="width: 100%" id="driverId" required>
                            <option value=""></option>
                        </select>
                    </select>
                </div>
            </div>
            <div class="pull-right">
                <button type="submit" class="btn btn-primary"><?php echo e(__('adminBody.save')); ?></button>
            </div>
            </form>
        </div>
        <div class="d-flex justify-content-center">
            <?php echo $orders->links(); ?>

        </div>
        </div>
    </div>
</div>
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

            $('#cityId').select2({
            dir:lang, 
            ajax : {
                url: "<?php echo e(route('admin.markets.getcities')); ?>",
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
            $('#driverId').select2({
            dir:lang, 
            ajax : {
                url: "<?php echo e(route('admin.markets.getdrivers')); ?>",
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
        });
    </script>
    <script>
        $("#selectAll").click(function() {
            $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
            });

            $("input[type=checkbox]").click(function() {
            if (!$(this).prop("checked")) {
                $("#selectAll").prop("checked", false);
            }
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\mazin projects\sudakart-latest-2023\resources\views/panel/orders/outbound.blade.php ENDPATH**/ ?>