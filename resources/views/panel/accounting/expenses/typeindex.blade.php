@extends('layouts.app2')
@section('title', __('adminBody.EXPENSE_TYPES_LIST'))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <form class="form-inline search-form search-box">

                    </form>

                    <a href="{{route('admin.accounting.expensetypes.create')}}" class="btn btn-primary mt-md-0 mt-2">{{ __('adminBody.new_expenses_type') }}</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="all-package coupon-table table table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('adminBody.Name') }}</th>
                                    <th>{{ __('adminBody.Created_On') }}</th>
                                    <th>{{ __('adminBody.Actions') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($expenses as $expense)
                                <tr data-row-id="{{$expense->id}}">
                                    <td>{{$expense->name}}</td>

                                    <td class="list-date">{{$expense->created_at}}</td>

                                    <td>
                                        <a href="{{route('admin.accounting.expensetypes.edit', $expense->id)}}">
                                            <i class="fa fa-edit" title="Edit"></i>
                                        </a>
                                        <form action="{{route('admin.accounting.expensetypes.destroy', $expense->id)}}" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="fa fa-trash" value="Delete">
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