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
                    <form method="POST" action="{{ route('admin.accounting.expensetypes.update', $expense->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="validationCustom4" class="col-xl-3 col-md-4">Name</label>
                            <div class="col-md-7">
                                <input class="form-control" placeholder="{{$expense->name}}" name="name" id="name" type="text">
                            </div>
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