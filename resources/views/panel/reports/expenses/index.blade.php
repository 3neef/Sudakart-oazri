@extends('layouts.app2')
@section('title', __('adminNav.expenses_report'))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                aria-selected="true" data-original-title="" title="">{{__('adminNav.expenses_report')}}</a></li>
                    </ul>
                    @if ($errors->count() > 0)
                    {{$errors}}
                        
                    @endif
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="account" role="tabpanel"
                            aria-labelledby="account-tab">
                            <form method="GET" action="{{route('admin.expenses-report.request')}}" class="needs-validation user-add">
                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4"><span>*</span>{{__('body.expense_type')}}</label>
                                    <div class="col-md-7">
                                        <div class="button-container" style=" margin-bottom: 10px;">
                                            <button type="button" onclick="selectAll()">{{ __('adminBody.Select_All') }}</button>
                                            <button type="button" onclick="deselectAll()">{{ __('adminBody.Deselect_All') }}</button>
                                        </div>
                                        <select class="js-example-basic-multiple form-control" name="types[]" multiple="multiple">
                                            @foreach($types as $id => $entry)
                                            <option value="{{ $id }}" {{ old('type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span>{{ __('adminBody.from') }}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="date_from" name="date_from" type="date"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span>{{ __('adminBody.to') }}</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="date_to" name="date_to" type="date"
                                            required="">
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <input type="submit" class="btn btn-primary" value="{{__('adminBody.save')}}"></input>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-details-title">
                        <h3>{{__('adminBody.total_expenses')}} <span>@money($expenses->sum('price'), 'OMR')</span></h3>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="all-package coupon-table table table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('adminBody.Name') }}</th>
                                    <th>{{ __('adminBody.price') }}</th>
                                    <th>{{ __('adminBody.Receipt') }}</th>
                                    <th>{{ __('adminBody.Download_Receipt') }}</th>
                                    <th>{{ __('adminBody.Created_On') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($expenses as $expense)
                                <tr data-row-id="{{$expense->id}}">
                                    <td>{{$expense->expense_type->name}}</td>

                                    <td >
                                        <span>{{$expense->price}}</span>
                                    </td>

                                    <td>
                                        
                                        <img id="idimage" src="{{asset($expense->image)}}" onclick="newTabImage()"
                                            data-field="image" alt="
                                            ">
                                    
                                    </td>
                                     <td>
                                        <a class="button" href="{{asset($expense->image)}}" download="Receipt.jpg"><i class="fa fa-download" aria-hidden="true"></i></a>
                                    </td>

                                    <td class="list-date">{{$expense->expense_date}}</td>
                                </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection