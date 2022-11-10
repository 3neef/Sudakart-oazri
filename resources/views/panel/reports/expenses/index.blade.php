@extends('layouts.app2')
@section('title', 'Expenses Reports')
@section('content')
<div class="container-fluid">
    <div class="row">
    <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                aria-selected="true" data-original-title="" title="">New</a></li>
                    </ul>
                    @if ($errors->count() > 0)
                    {{$errors}}
                        
                    @endif
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="account" role="tabpanel"
                            aria-labelledby="account-tab">
                            <form method="GET" action="{{route('admin.expenses-report.request')}}" class="needs-validation user-add">
                                <h4>find expenses</h4>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4"><span>*</span>Expenses Types</label>
                                    <div class="col-md-7">
                                        <div class="button-container" style=" margin-bottom: 10px;">
                                            <button type="button" onclick="selectAll()">Select All</button>
                                            <button type="button" onclick="deselectAll()">Deselect All</button>
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
                                        class="col-xl-3 col-md-4"><span>*</span>From</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="date_from" name="date_from" type="date"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1"
                                        class="col-xl-3 col-md-4"><span>*</span>To</label>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="date_to" name="date_to" type="date"
                                            required="">
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
                <div class="card-header">
                    <div class="card-details-title">
                        <h3>Your Total Expenses is <span>{{$expenses->sum('price')}} OMR</span></h3>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="all-package coupon-table table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Receipt</th>
                                    <th>Created On</th>
                                    <th>Actions</th>
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
                                        
                                        <img src="{{asset($expense->image)}}"
                                            data-field="image" alt="
                                            ">
                                    
                                    </td>

                                    <td class="list-date">{{$expense->expense_date}}</td>

                                    <td>
                                        <a href="{{route('admin.accounting.expenses.edit', $expense->id)}}">
                                            <i class="fa fa-edit" title="Edit"></i>
                                        </a>
                                        <form action="{{route('admin.accounting.expenses.destroy', $expense->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" value="Delete" style="border:none"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
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