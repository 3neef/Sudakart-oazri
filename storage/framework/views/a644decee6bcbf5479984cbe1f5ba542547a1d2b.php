
<?php $__env->startSection('title', 'Send A Notification'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="card tab2-card">
        <div class="card-body">
            <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                <li class="nav-item"><a class="nav-link active show" id="general-tab"
                        data-bs-toggle="tab" href="#general" role="tab" aria-controls="general"
                        aria-selected="true" data-original-title="" title="">Push Notification</a></li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="general" role="tabpanel"
                    aria-labelledby="general-tab">
                    <form method="POST" action="<?php echo e(route('admin.push.specified.store')); ?>" class="needs-validation">
                        <?php echo csrf_field(); ?>
                        <h4>Send A Notification</h4>
                        <div class="form-group row">
                            <label class="col-xl-3 col-md-4"><span>*</span>Select Number</label>
                            <div class="col-md-7">
                                <select class="js-example-basic-multiple form-control" name="users[]" multiple="multiple">
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($id); ?>" <?php echo e(old('category_id') == $id ? 'selected' : ''); ?>><?php echo e($entry); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>
                                Subject</label>
                            <div class="col-xl-8 col-md-7">
                                <input class="form-control" id="validationCustom0" name="title" type="text">
                            </div>
                        </div>
                        <div class="form-group row editor-label">
                            <label class="col-xl-3 col-md-4"><span>*</span> Message</label>
                            <div class="col-xl-8 col-md-7">
                                    <textarea class="form-control" name="body" rows="10"></textarea>
                        
                            </div>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/panel/promotions/notifications/specified.blade.php ENDPATH**/ ?>