
<?php $__env->startSection('title', 'Complaint'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="bg-inner cart-section order-details-table">
                        <div class="row g-4">
                            <div class="col-xl-8">
                                <div class="card-details-title">
                                    <h3>Complaint<span> <?php echo e($complaint->subject); ?></span></h3>
                                </div>
                                <div class="table-responsive table-details">
                                    <table class="table cart-table table-borderless">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Complaint body</th>
                                                <th colspan="2"><?php echo e($complaint->status); ?></th>
                                            </tr>
                                            
                                            
                                        </thead>

                                        <tbody>
                                            <tr class="table-order">
                                                <td>
                                                   <p><?php echo $complaint->body; ?></p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/panel/complaints/show.blade.php ENDPATH**/ ?>