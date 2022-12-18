@extends('layouts.app2')
@section('title', __('adminNav.cards'))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">

                    <a href="{{route('admin.card.create')}}" class="btn btn-primary add-row mt-md-0 mt-2">{{__('adminBody.new_card')}}</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="table all-package table-category " id="editableTable">
                            <thead>
                                <tr>
                                    <th>{{__('adminBody.no')}}</th>
                                    <th>{{__('adminBody.Amount')}}</th>
                                    <th>{{__('adminBody.Actions')}}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($cards as $card)
                                <tr>
                                    <td data-field="name">{{$loop->index + 1}}</td>
                                    <td data-field="name">{{$card->amount}}</td>

                                    <td>
                                        <a href="{{route('admin.card.edit', $card->id)}}">
                                            <i class="fa fa-edit" title="{{__('body.edit')}}"></i>
                                        </a>

                                        <form action="{{route('admin.card.destroy', $card->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" value="Delete" style="border:none"><i class="fa fa-trash" title="{{__('body.delete')}}"></i></button>
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