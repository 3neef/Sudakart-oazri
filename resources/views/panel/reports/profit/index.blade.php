@extends('layouts.app2')
@section('title', 'Profit-Loss Report')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                aria-selected="true" data-original-title="" title="">Years</a></li>
                    </ul>
                    @if ($errors->count() > 0)
                    {{$errors}}
                        
                    @endif
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="account" role="tabpanel"
                            aria-labelledby="account-tab">
                            <form method="POST" action="{{route('admin.profit-report.year')}}" class="needs-validation user-add">
                                @csrf
                                <h4>yearly profits</h4>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4"><span>*</span>Select A Year</label>
                                    <div class="col-md-7">
                                        <select class="js-example-basic-multiple form-control" name="year">
                                            @foreach($years as $id => $entry)
                                            <option value="{{ $entry }}">{{ $entry }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <input type="submit" class="btn btn-primary"></input>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                @if ($year)
                <div class="card-header">
                    <div class="card-details-title">
                        <h3>Showing profits from the year <span>{{$year}}</span></h3>
                    </div>
                </div>
                @endif
                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="all-package coupon-table table table-striped">
                            <thead>
                                <tr>
                                    <th>Month</th>
                                    <th>Expenses</th>
                                    <th>Commissions</th>
                                    <th>Profit/ Loss</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($monthes as $month)
                                <tr>
                                    <td>{{$month}}</td>
                                    <td>{{$expenses->where('month', $month)->first() ? $expenses->where('month', $month)->first()->total_expenses : 0}}</td>
                                    <td>{{$commissions->where('month', $month)->first() ? $commissions->where('month', $month)->first()->total_commissions : 0}}</td>
                                    <td>{{($commissions->where('month', $month)->first() ? $commissions->where('month', $month)->first()->total_commissions : 0) - ($expenses->where('month', $month)->first() ? $expenses->where('month', $month)->first()->total_expenses : 0)}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td>Total</td>
                                    <td>{{$expenses->sum('total_expenses')}}</td>
                                    <td>{{$commissions->sum('total_commissions')}}</td>
                                    <td>{{$commissions->sum('total_commissions') - $expenses->sum('total_expenses')}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection