@extends('layouts.app2')
@section('title', __('adminBody.EXPENSES_LIST'))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    {{-- <a href="{{route('admin.accounting.expenses').'?filter[expense_type_id]=3'}}" class="btn btn-primary mt-md-0 mt-2">Add it</a> --}}
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary mt-md-0 mt-2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('adminBody.expenses_type') }}
                        </button>
                        <ul class="dropdown-menu">
                            @foreach($types as $id => $entry)
                            <li><a class="dropdown-item" href="?filter[expense_type_id]={{$id}}">{{$entry}}</a></li>
                            
                            @endforeach
                        </ul>
                    </div>
                    <a href="{{route('admin.accounting.expenses.create')}}" class="btn btn-primary mt-md-0 mt-2">{{ __('adminBody.new_expenses') }}</a>
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
                                    <th>{{ __('adminBody.Actions') }}</th>
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