@extends('layouts.app2')
@section('title', 'Attribute')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="bg-inner cart-section order-details-table">
                        <div class="row g-4">
                            <div class="col-xl-8">
                                <div class="card-details-title">
                                    <h3>Attribute<span> {{$attribute->name}}</span></h3>
                                </div>
                                <div class="table-responsive table-details">
                                    <table class="table cart-table table-borderless">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Options</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($attribute->options as $option)
                                            <tr class="table-order">
                                                <td>
                                                    <p>Attribute Ref.</p>
                                                    <h5>##{{$option->attribute->id}}</h5>
                                                </td>
                                                <td>
                                                    <p>Option Name</p>
                                                    <h5>{{$option->option}}</h5>
                                                </td>
                                                <td>
                                                    <p>Option English Name</p>
                                                    <h5>{{$option->en_option}}</h5>
                                                </td>
                                            </tr>
                                                
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- section end -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection