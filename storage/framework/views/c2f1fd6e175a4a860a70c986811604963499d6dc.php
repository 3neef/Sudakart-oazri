
<?php $__env->startSection('title', __('adminBody.TICKETS_LIST')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <form class="form-inline search-form search-box">
                        
                    </form>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="table all-package">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('adminBody.Ticket_Number')); ?></th>
                                    <th><?php echo e(__('adminBody.date')); ?></th>
                                    <th><?php echo e(__('adminBody.Subject')); ?></th>
                                    <th><?php echo e(__('adminBody.Status')); ?></th>
                                    <th><?php echo e(__('adminBody.option')); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $complaints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $complaint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>#<?php echo e($complaint->id); ?></td>

                                    <td><?php echo e(\Carbon\Carbon::createFromTimestamp(strtotime($complaint->created_at))->format('d-m-Y')); ?></td>

                                    <td><?php echo e($complaint->subject); ?></td>
                                    <?php if($complaint->status == 'pending'): ?>
                                    <td class="order-pending">
                                        
                                        <?php elseif($complaint->status == 'On-hold'): ?>
                                        <td class="order-warning">
                                        <?php elseif($complaint->status == 'resolved'): ?>
                                        <td class="order-success">
                                            <?php elseif($complaint->status == 'canceled' || $complaint->status == 'returned'): ?>
                                            <td class="order-cancle">
                                            <?php elseif($complaint->status == 'packaging'): ?>
                                            <td class="order-continue">
                                        
                                    <?php endif; ?>
                                        <span><?php echo e($complaint->status); ?></span>
                                    </td>
                                    <td><?php echo e($complaint->admin ? $complaint->admin->name : ''); ?></td>

                                    <td>
                                        <a href="<?php echo e(route('admin.complaints.show', $complaint->id)); ?>">
                                            <i class="fa fa-edit" title="show"></i>
                                        </a>

                                        <a  href="javascript:void(0)">
                                            <i  data-id="<?php echo e($complaint->id); ?>" class="fa fa-check-square-o asign-ticket" title="Asgine an Admin"></i>
                                        </a>

                                        <a  href="javascript:void(0)">
                                            <i  data-id="<?php echo e($complaint->id); ?>" class="fa fa-dot-circle-o status-ticket" title="change status"></i>
                                        </a>
                                    </td>
                                </tr>
                                    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="return-order-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLongTitle">Asign an Admin</h5>
            </div>
            <div class="modal-body">
                <form id="asign-ticket" action="#" method="POST" id="return-order-form">
                    <?php echo csrf_field(); ?>
                    


                    <div class="form-group">
                        <label for="">Choose an Admin</label>
                        <div class="col-md-7">
                        <select class="js-example-basic-multiple form-control" name="admin_id" required>
                            <option value=""></option>
                            <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($id); ?>"><?php echo e($entry); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Request" class="btn btn-success">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="clsBtnFooter" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="return-ticket-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLongTitle">Change the ticket status</h5>
            </div>
            <div class="modal-body">
                <form id="status-ticket" action="#" method="POST" id="return-ticket-form">
                    <?php echo csrf_field(); ?>
                    


                    <div class="form-group">
                        <label for="">Choose a Status</label>
                        <div class="col-md-7">
                        <select class="js-example-basic-multiple form-control" name="status" required>
                            <option value=""></option>
                            <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($status); ?>"><?php echo e($status); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Request" class="btn btn-success">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="clsBtnFooter" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>



<script src="<?php echo e(asset('main/js/modal/order.js')); ?>" defer></script>
<script src="<?php echo e(asset('main/js/modal/ticket.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $('.asign-ticket').on('click',function () {  
        var id = $(this).data('id');
        console.log(id);
        $('#asign-ticket').attr('action', '/admin/complaints/ticket/'+id);
        $('#return-order-modal').modal('show');
    });
    </script>

    <script>
        $('.status-ticket').on('click',function () {  
        var id = $(this).data('id');
        console.log(id);
        $('#status-ticket').attr('action', '/admin/complaints/ticket/'+id);
        $('#return-ticket-modal').modal('show');
    });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/panel/complaints/tickets.blade.php ENDPATH**/ ?>