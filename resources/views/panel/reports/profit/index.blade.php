@extends('layouts.app2')
@section('title', __('adminNav.profit_loss'))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                aria-selected="true" data-original-title="" title="">{{__('adminNav.profit_loss')}}</a></li>
                    </ul>
                    @if ($errors->count() > 0)
                    {{$errors}}
                        
                    @endif
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="account" role="tabpanel"
                            aria-labelledby="account-tab">
                            <form method="POST" action="{{route('admin.profit-report.year')}}" class="needs-validation user-add">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4"><span>*</span>{{__('adminBody.year')}}</label>
                                    <div class="col-md-7">
                                        <select class="js-example-basic-multiple form-control" name="year">
                                            @foreach($years as $id => $entry)
                                            <option value="{{ $entry }}">{{ $entry }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <input type="submit" class="btn btn-primary" value="{{__('body.Choose')}}"></input>
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
                        <h3>{{__('adminBody.show_profit')}} <span>{{$year}}</span></h3>
                    </div>
                </div>
                @endif
                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="all-package coupon-table table table-striped">
                            <thead>
                                <tr>
                                    <th>{{__('body.month')}}</th>
                                    <th>{{__('adminNav.expenses')}}</th>
                                    <th>{{__('adminNav.commissions')}}</th>
                                    <th>{{__('adminNav.profit_loss')}}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($monthes as $month)
                                <tr>
                                    <td>
                                        @if ($month == 'January')
                                            {{__('body.January')}}
                                        @elseif ($month == 'February')
                                            {{__('body.February')}}
                                        @elseif ($month == 'March')
                                            {{__('body.March')}}
                                        @elseif ($month == 'April')
                                            {{__('body.April')}}
                                        @elseif ($month == 'May')
                                            {{__('body.May')}}
                                        @elseif ($month == 'June')
                                            {{__('body.June')}}
                                        @elseif ($month == 'July')
                                            {{__('body.July')}}
                                        @elseif ($month == 'August')
                                            {{__('body.August')}}
                                        @elseif ($month == 'September')
                                            {{__('body.September')}}
                                        @elseif ($month == 'October')
                                            {{__('body.October')}}
                                        @elseif ($month == 'November')
                                            {{__('body.November')}}
                                        @elseif ($month == 'December')
                                            {{__('body.December')}}
                                        @endif
                                    </td>
                                    <td>{{$expenses->where('month', $month)->first() ? $expenses->where('month', $month)->first()->total_expenses : 0}}</td>
                                    <td>{{$commissions->where('month', $month)->first() ? $commissions->where('month', $month)->first()->total_commissions : 0}}</td>
                                    <td
                                    @if (($commissions->where('month', $month)->first() ? $commissions->where('month', $month)->first()->total_commissions : 0) - ($expenses->where('month', $month)->first() ? $expenses->where('month', $month)->first()->total_expenses : 0) > 0)
                                    style="color:green;"
                                        
                                    @else
                                    style="color:red;"
                                        
                                    @endif
                                    >{{($commissions->where('month', $month)->first() ? $commissions->where('month', $month)->first()->total_commissions : 0) - ($expenses->where('month', $month)->first() ? $expenses->where('month', $month)->first()->total_expenses : 0)}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td><span  style="font-weight: bold; font-size:150%">{{__('body.total_ex')}}</span></td>
                                    <td>{{$expenses->sum('total_expenses')}}</td>
                                    <td>{{$commissions->sum('total_commissions')}}</td>
                                    <td
                                    @if ($commissions->sum('total_commissions') - $expenses->sum('total_expenses') > 0)
                                    style="color:green;"
                                        
                                    @else
                                    style="color:red;"
                                        
                                    @endif
                                    >{{$commissions->sum('total_commissions') - $expenses->sum('total_expenses')}}</td>
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