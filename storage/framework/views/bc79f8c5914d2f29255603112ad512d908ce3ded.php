
<?php $__env->startSection('title', __('adminDash.dashboard')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-xxl-3 col-md-3 xl-4">
            <div class="card o-hidden widget-cards">
                <div class="secondary-box card-body">
                    <div class="media static-top-widget align-items-center">
                        <div class="icons-widgets">
                            <div class="align-self-center text-center">
                                <i data-feather="box" class="font-secondary"></i>
                            </div>
                        </div>
                        <div class="media-body media-doller">
                            <span class="m-0"><?php echo e(__('adminDash.total_products')); ?></span>
                            <h3 class="mb-0"><span class="counter"><?php echo e($stats->total_products); ?></span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-3 xl-4">
            <div class="card o-hidden widget-cards">
                <div class="primary-box card-body">
                    <div class="media static-top-widget align-items-center">
                        <div class="icons-widgets">
                            <div class="align-self-center text-center"><i data-feather="shopping-bag"
                                    class="font-primary"></i></div>
                        </div>
                        <div class="media-body media-doller"><span class="m-0"><?php echo e(__('adminDash.total_orders')); ?></span>
                            <h3 class="mb-0"><span class="counter"><?php echo e($stats->total_orders); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-3 xl-25">
            <div class="card o-hidden widget-cards">
                <div class="warning-box card-body">
                    <div class="media static-top-widget align-items-center">
                        <div class="icons-widgets">
                            <div class="align-self-center text-center"><i data-feather="message-square"
                                    class="font-success"></i></div>
                        </div>
                        <div class="media-body media-doller"><span class="m-0"><?php echo e(__('adminDash.todays_sales')); ?></span>
                            <h3 class="mb-0"><span class="counter"><?php echo e($stats->todays_sales); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-3 xl-25">
            <div class="card o-hidden widget-cards">
                <div class="secondary-box card-body">
                    <div class="media static-top-widget align-items-center">
                        <div class="icons-widgets">
                            <div class="align-self-center text-center"><i data-feather="message-square"
                                    class="font-secondary"></i></div>
                        </div>
                        <div class="media-body media-doller"><span class="m-0"><?php echo e(__('adminDash.total_wallets')); ?></span>
                            <h3 class="mb-0"><span class="counter"><?php echo e($stats->total_wallets); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-3 xl-25">
            <div class="card o-hidden widget-cards">
                <div class="secondary-box card-body">
                    <div class="media static-top-widget align-items-center">
                        <div class="icons-widgets">
                            <div class="align-self-center text-center"><i data-feather="message-square"
                                    class="font-danger"></i></div>
                        </div>
                        <div class="media-body media-doller"><span class="m-0"><?php echo e(__('adminDash.total_vendors')); ?></span>
                            <h3 class="mb-0"><span class="counter"><?php echo e($stats->total_vendors); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-md-3 xl-25">
            <div class="card o-hidden widget-cards">
                <div class="primary-box card-body">
                    <div class="media static-top-widget align-items-center">
                        <div class="icons-widgets">
                            <div class="align-self-center text-center"><i data-feather="message-square"
                                    class="font-secondary"></i></div>
                        </div>
                        <div class="media-body media-doller"><span class="m-0"><?php echo e(__('adminDash.Todays_orders')); ?></span>
                            <h3 class="mb-0"><span class="counter"><?php echo e($stats->todays_orders); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-3 xl-25">
            <div class="card o-hidden widget-cards">
                <div class="warning-box card-body">
                    <div class="media static-top-widget align-items-center">
                        <div class="icons-widgets">
                            <div class="align-self-center text-center"><i data-feather="message-square"
                                    class="font-warning"></i></div>
                        </div>
                        <div class="media-body media-doller"><span class="m-0"><?php echo e(__('adminDash.total_products_sold')); ?></span>
                            <h3 class="mb-0"><span class="counter"><?php echo e($stats->total_Sales); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-3 xl-25">
            <div class="card o-hidden widget-cards">
                <div class="secondary-box card-body">
                    <div class="media static-top-widget align-items-center">
                        <div class="icons-widgets">
                            <div class="align-self-center text-center"><i data-feather="message-square"
                                    class="font-secondary"></i></div>
                        </div>
                        <div class="media-body media-doller"><span class="m-0"><?php echo e(__('adminDash.total_commission')); ?></span>
                            <h3 class="mb-0"><span class="counter"><?php echo e(round(array_sum($stats->total_commition))); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-5 xl-10">
            <div class="card o-hidden widget-cards">
                <div class="secondary-box card-body">
                    <div class="media static-top-widget align-items-center">
                        <div class="icons-widgets">
                            <div class="align-self-center text-center"><i data-feather="message-square"
                                    class="font-secondary"></i></div>
                        </div>
                        <div class="media-body media-doller"><span class="m-0"><?php echo e(__('adminDash.Online_Payments_Transactions')); ?></span>
                            <h3 class="mb-0"><span class="counter"><?php echo e($stats->total_transactions); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 xl-100">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('adminDash.latest_orders')); ?></h5>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="icofont icofont-simple-left"></i></li>
                            <li><i class="view-html fa fa-code"></i></li>
                            <li><i class="icofont icofont-maximize full-card"></i></li>
                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                            <li><i class="icofont icofont-refresh reload-card"></i></li>
                            <li><i class="icofont icofont-error close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="user-status table-responsive latest-order-table">
                        <table class="table table-bordernone">
                            <thead>
                                <tr>
                                    <th scope="col"><?php echo e(__('adminDash.id')); ?></th>
                                    <th scope="col"><?php echo e(__('adminDash.order_total')); ?></th>
                                    <th scope="col"><?php echo e(__('adminDash.payment_method')); ?></th>
                                    <th scope="col"><?php echo e(__('adminDash.status')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $last_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                <tr>
                                    <td><?php echo e($order->id); ?></td>
                                    <td class="digits"><?php echo e($order->amount); ?></td>
                                    <td class="font-danger"><?php echo e($order->payment_method); ?></td>
                                    <td class="digits"><?php echo e($order->status); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 xl-100">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('adminNav.returned_products')); ?></h5>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="icofont icofont-simple-left"></i></li>
                            <li><i class="view-html fa fa-code"></i></li>
                            <li><i class="icofont icofont-maximize full-card"></i></li>
                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                            <li><i class="icofont icofont-refresh reload-card"></i></li>
                            <li><i class="icofont icofont-error close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="user-status table-responsive latest-order-table">
                        <table class="table table-bordernone">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col"><?php echo e(__('adminDash.product_name')); ?></th>
                                    <th scope="col"><?php echo e(__('adminDash.product_status')); ?></th>
                                    <th scope="col"><?php echo e(__('adminDash.reason')); ?></th>
                                    <th scope="col"><?php echo e(__('adminDash.order_ref')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $r_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                <tr>
                                    <td><?php echo e($r_product->id); ?></td>
                                    <td class="digits"><?php if($r_product->product): ?><?php echo e($r_product->product->name); ?><?php endif; ?></td>
                                    <td class="font-danger"><?php echo e($r_product->status); ?></td>
                                    <td class="digits"><?php echo e($r_product->reason); ?></td>
                                    <td class="digits">#<?php echo e($r_product->order_id); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('adminDash.monthly_Sales')); ?></h5>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="icofont icofont-simple-left"></i></li>
                            <li><i class="view-html fa fa-code"></i></li>
                            <li><i class="icofont icofont-maximize full-card"></i></li>
                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                            <li><i class="icofont icofont-refresh reload-card"></i></li>
                            <li><i class="icofont icofont-error close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body sell-graph">
                    <canvas id="myNewGraph"></canvas>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('adminDash.monthly_expenses')); ?></h5>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="icofont icofont-simple-left"></i></li>
                            <li><i class="view-html fa fa-code"></i></li>
                            <li><i class="icofont icofont-maximize full-card"></i></li>
                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                            <li><i class="icofont icofont-refresh reload-card"></i></li>
                            <li><i class="icofont icofont-error close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body sell-graph">
                    <canvas id="monthlyExpense"></canvas>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('adminDash.Monthly_Returned_Products')); ?></h5>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="icofont icofont-simple-left"></i></li>
                            <li><i class="view-html fa fa-code"></i></li>
                            <li><i class="icofont icofont-maximize full-card"></i></li>
                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                            <li><i class="icofont icofont-refresh reload-card"></i></li>
                            <li><i class="icofont icofont-error close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body sell-graph">
                    <canvas id="monthlyReturnedProdcuts"></canvas>
                </div>
            </div>
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

    var monthlyGraph =  ['January', 'February', 'March', 'April', 'May', 'June', 'July',
		 'August', 'September', 'October', 'November', 'December'];
    var monthlyGraph_total_sales =  <?php echo e(Illuminate\Support\Js::from($stats->SalesMonthlyGraph)); ?>;
  
      const data = {
        labels: monthlyGraph,
        datasets: [{
          label: 'Sales Graph',
          backgroundColor: 'rgb(255, 99, 132)',
          borderColor: 'rgb(255, 99, 132)',
          data: monthlyGraph_total_sales,
        }]
      };
  
      const config = {
        type: 'line',
        data: data,
        options: {}
      };
  
      const myChart = new Chart(
        document.getElementById('myNewGraph'),
        config
      );

      // expense graph
      var expenseMonthlyGraph_price =  <?php echo e(Illuminate\Support\Js::from($stats->expensesGraph)); ?>;
  
      const ExpensegraphData = {
        labels: monthlyGraph,
        datasets: [{
          label: 'Expenses Graph',
          backgroundColor: 'rgb(255, 99, 132)',
          borderColor: 'rgb(255, 99, 132)',
          data: expenseMonthlyGraph_price,
        }]
      };
  
      const ExpenseGraphconfig = {
        type: 'line',
        data: ExpensegraphData,
        options: {}
      };
  
      const ExpenseGraphChart = new Chart(
        document.getElementById('monthlyExpense'),
        ExpenseGraphconfig
      );
     // returned products graph
      var ReturnProductMonthlyGraphCount =  <?php echo e(Illuminate\Support\Js::from($stats->returnedProductGraph)); ?>;
  
      const ReturnProductgraphData = {
        labels: monthlyGraph,
        datasets: [{
          label: 'Returned Products Graph',
          backgroundColor: 'rgb(255, 99, 132)',
          borderColor: 'rgb(255, 99, 132)',
          data: ReturnProductMonthlyGraphCount,
        }]
      };
  
      const ReturnedProductsGraphconfig = {
        type: 'line',
        data: ReturnProductgraphData,
        options: {}
      };
  
      const ReturnedProductGraphChart = new Chart(
        document.getElementById('monthlyReturnedProdcuts'),
        ReturnedProductsGraphconfig
      );
  </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\10\Desktop\oazri\suda\resources\views/dashboard.blade.php ENDPATH**/ ?>