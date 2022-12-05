
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title', __('adminBody.new_market')); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                aria-selected="true" data-original-title="" title=""><?php echo e(__('adminBody.new_market')); ?></a></li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="account" role="tabpanel"
                            aria-labelledby="account-tab">
                            <form method="POST" action="<?php echo e(route('admin.markets.store')); ?>" class="needs-validation user-add" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <h4><?php echo e(__('adminBody.new_market')); ?></h4>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('adminBody.city')); ?></label>
                                    <div class="col-md-7">
                                        <select class="form-control" name="city_id" style="width: 100%" id="cityId" required>
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom0"
                                        class="col-xl-3 col-md-4"><span>*</span><?php echo e(__('body.name')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="name" name="name" type="text"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span> <?php echo e(__('form.en_name')); ?></label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="en_name" name="en_name" type="text"
                                            required="">
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <input type="submit" class="btn btn-primary" value="<?php echo e(__('adminBody.save')); ?>"></input>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
    });
    </script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\mazin projects\sudakart-latest-2023\resources\views/panel/settings/markets/create.blade.php ENDPATH**/ ?>