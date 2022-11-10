@extends('layouts.app2')
@section('title', __('adminDash.dashboard'))
@section('content')
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
                            <span class="m-0">{{ __('adminDash.total_products') }}</span>
                            <h3 class="mb-0"><span class="counter">{{$stats->total_products}}</span>
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
                        <div class="media-body media-doller"><span class="m-0">{{ __('adminDash.total_orders') }}</span>
                            <h3 class="mb-0"><span class="counter">{{$stats->total_orders}}</span>
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
                        <div class="media-body media-doller"><span class="m-0">{{ __('adminDash.todays_sales') }}</span>
                            <h3 class="mb-0"><span class="counter">{{$stats->todays_sales}}</span>
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
                        <div class="media-body media-doller"><span class="m-0">{{ __('adminDash.total_wallets') }}</span>
                            <h3 class="mb-0"><span class="counter">{{ $stats->total_wallets }}</span>
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
                        <div class="media-body media-doller"><span class="m-0">{{ __('adminDash.total_vendors') }}</span>
                            <h3 class="mb-0"><span class="counter">{{ $stats->total_vendors }}</span>
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
                        <div class="media-body media-doller"><span class="m-0">{{ __('adminDash.Todays_orders') }}</span>
                            <h3 class="mb-0"><span class="counter">{{$stats->todays_orders}}</span>
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
                        <div class="media-body media-doller"><span class="m-0">{{ __('adminDash.total_products_sold') }}</span>
                            <h3 class="mb-0"><span class="counter">{{$stats->total_Sales}}</span>
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
                        <div class="media-body media-doller"><span class="m-0">{{ __('adminDash.total_commission') }}</span>
                            <h3 class="mb-0"><span class="counter">{{ round(array_sum($stats->total_commition)) }}</span>
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
                        <div class="media-body media-doller"><span class="m-0">{{ __('adminDash.Online_Payments_Transactions') }}</span>
                            <h3 class="mb-0"><span class="counter">{{ $stats->total_transactions }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 xl-100">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('adminDash.latest_orders') }}</h5>
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
                                    <th scope="col">{{ __('adminDash.id') }}</th>
                                    <th scope="col">{{ __('adminDash.order_total') }}</th>
                                    <th scope="col">{{ __('adminDash.payment_method') }}</th>
                                    <th scope="col">{{ __('adminDash.status') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($last_orders as $order)
                                    
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td class="digits">{{$order->amount}}</td>
                                    <td class="font-danger">{{$order->payment_method}}</td>
                                    <td class="digits">{{$order->status}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- <a href="order.html" class="btn btn-primary mt-4">View All Orders</a> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 xl-100">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('adminNav.returned_products') }}</h5>
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
                                    <th scope="col">{{ __('adminDash.product_name') }}</th>
                                    <th scope="col">{{ __('adminDash.product_status') }}</th>
                                    <th scope="col">{{ __('adminDash.reason') }}</th>
                                    <th scope="col">{{ __('adminDash.order_ref') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($r_products as $r_product)
                                    
                                <tr>
                                    <td>{{$r_product->id}}</td>
                                    <td class="digits">@if($r_product->product){{$r_product->product->name}}@endif</td>
                                    <td class="font-danger">{{$r_product->status}}</td>
                                    <td class="digits">{{$r_product->reason}}</td>
                                    <td class="digits">#{{$r_product->order_id}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- <a href="order.html" class="btn btn-primary mt-4">View All Orders</a> --}}
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-xl-3 col-md-6 xl-50">
            <div class="card order-graph sales-carousel">
                <div class="card-header b-header">
                    <h6>{{ __('adminDash.Total_Product_Sold') }}</h6>
                    <div class="row">
                        <div class="col-6">
                            <div class="small-chartjs">
                                <div class="flot-chart-placeholder" id="simple-line-chart-sparkline-3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <span>{{ __('adminDash.Total_Product_Sold') }}</span>
                            <h2 class="mb-0">{{ $stats->total_Sales }}</h2>
                        </div>

                        <div class="bg-primary b-r-8">
                            <div class="small-box">
                                <i data-feather="briefcase"></i>
                            </div>
                        </div>
                    </div>

                    <div class="sales-contain">
                        <h5 class="f-w-600">{{ __('adminDash.Total_Product_Sold') }}</h5>
                        <p>Total Products Sold</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card order-graph sales-carousel">
                <div class="card-header b-header">
                    <h6>{{ __('adminDash.total_cash_transaction') }}</h6>
                    <div class="row">
                        <div class="col-6">
                            <div class="small-chartjs">
                                <div class="flot-chart-placeholder" id="simple-line-chart-sparkline-2">
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <span>{{ __('adminDash.Online_Payments_Transactions') }}</span>
                            <h2 class="mb-0">{{ $stats->total_transactions }}</h2>
                        </div>
                        <div class="bg-warning b-r-8">
                            <div class="small-box">
                                <i data-feather="shopping-cart"></i>
                            </div>
                        </div>
                    </div>

                    <div class="sales-contain">
                        <h5 class="f-w-600">{{ __('adminDash.details_about_cash') }}</h5>
                        <p>{{ __('adminDash.cash_optained_online_payments') }}</p>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('adminDash.monthly_Sales') }}</h5>
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
                    <h5>{{ __('adminDash.monthly_expenses') }}</h5>
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
                    <h5>{{ __('adminDash.Monthly_Returned_Products') }}</h5>
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
{{-- {{ dd($stats->monthlyGraph) }} --}}
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

    var monthlyGraph =  ['January', 'February', 'March', 'April', 'May', 'June', 'July',
		 'August', 'September', 'October', 'November', 'December'];
    var monthlyGraph_total_sales =  {{ Illuminate\Support\Js::from($stats->SalesMonthlyGraph) }};
  
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
      var expenseMonthlyGraph_price =  {{ Illuminate\Support\Js::from($stats->expensesGraph) }};
  
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
      var ReturnProductMonthlyGraphCount =  {{ Illuminate\Support\Js::from($stats->returnedProductGraph) }};
  
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
@endpush