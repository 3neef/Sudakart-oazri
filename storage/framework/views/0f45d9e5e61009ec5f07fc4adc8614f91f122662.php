
<?php $__env->startSection('title', 'Deposit | Withdraw'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="bg-inner cart-section order-details-table">
                        <div class="row g-12">
                            <div class="col-max">
                                <div class="card-details-title">
                                    <h3>This Wallet Balance is <span><?php echo e($wallet->balance); ?> OMR</span></h3>
                                </div>
                                <div class="card tab2-card">
                        <div class="card-body">
                            <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                                <li class="nav-item"><a class="nav-link active show" id="general-tab"
                                        data-bs-toggle="tab" href="#general" role="tab" aria-controls="general"
                                        aria-selected="true" data-original-title="" title="">Withdraw</a></li>
                                <li class="nav-item"><a class="nav-link" id="usage-tab" data-bs-toggle="tab"
                                        href="#usage" role="tab" aria-controls="usage" aria-selected="false"
                                        data-original-title="" title="">Deposit</a></li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active show" id="general" role="tabpanel"
                                    aria-labelledby="general-tab">
                                    <form method="POST" action="<?php echo e(route('withdraw')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <h4>Make a Withdraw from this wallet</h4>
                                        <div class="form-group row">
                                                <input class="form-control" id="user_id" name="user_id" value="<?php echo e($wallet->accountable->user->id); ?>" type="number" hidden>
                                        </div>
                                        <div class="form-group row">
                                            <label for="validationCustom6" class="col-xl-3 col-md-4">Amount</label>
                                            <div class="col-md-7">
                                                <input class="form-control" id="amount" name="amount" type="number">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="validationCustom7" class="col-xl-3 col-md-4">Notes</label>
                                            <div class="col-md-7">
                                                <input class="form-control" id="notes" name="notes" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <input class="btn btn-primary" type="submit"></input>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="usage" role="tabpanel" aria-labelledby="usage-tab">
                                    <form method="POST" action="<?php echo e(route('deposit')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <h4>Make a deposit to this wallet</h4>
                                        <div class="form-group row">
                                                <input class="form-control" id="user_id" name="user_id" value="<?php echo e($wallet->accountable->user->id); ?>" type="number" hidden>
                                        </div>
                                        <div class="form-group row">
                                            <label for="validationCustom6" class="col-xl-3 col-md-4">Amount</label>
                                            <div class="col-md-7">
                                                <input class="form-control" id="amount" name="amount" type="number">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="validationCustom7" class="col-xl-3 col-md-4">Notes</label>
                                            <div class="col-md-7">
                                                <input class="form-control" id="notes" name="notes" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <input class="btn btn-primary" type="submit"></input>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                            </div>


                        </div>
                    </div>
                    <!-- section end -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/panel/wallets/operation.blade.php ENDPATH**/ ?>