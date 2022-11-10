@extends('layouts.app2')
@section('title', 'Update | Expense')
@section('content')
<div class="container-fluid">
    <div class="card tab2-card">
        <div class="card-body">
            <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                <li class="nav-item"><a class="nav-link active show" id="restriction-tabs" data-bs-toggle="tab"
                        href="#restriction" role="tab" aria-controls="restriction" aria-selected="false"
                        data-original-title="" title="">Update an Expense</a></li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="restriction" role="tabpanel"
                    aria-labelledby="restriction-tabs">
                    <form method="POST" action="{{ route('admin.accounting.expenses.update', $expense->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-xl-3 col-md-4">Expense Type</label>
                            <div class="col-md-7">
                                <select class="custom-select w-100 form-control" name="expense_type_id" id="expense_type_id">
                                    <option value="{{$expense->expense_type->name}}">{{$expense->expense_type->name}}</option>
                                    @foreach($types as $id => $entry)
                                    <option value="{{$id}}">{{$entry}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="validationCustom4" class="col-xl-3 col-md-4">Price</label>
                            <div class="col-md-7">
                                <input class="form-control" placeholder="{{$expense->price}}" name="price" id="price" type="number" value="{{$expense->price}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="expense_date" class="col-xl-3 col-md-4">Date</label>
                            <div class="col-md-7">
                                <input class="form-control" name="expense_date" id="expense_date" type="datetime-local">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="receipt" class="form-label">Receipt</label>
                            <input class="form-control" type="file" id="image" name="image">
                        </div>
                        <div class="form-group row">
                            <input type="submit" class="btn btn-primary"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection