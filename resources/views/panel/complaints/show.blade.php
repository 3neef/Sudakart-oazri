@extends('layouts.app2')
@section('title', 'Complaint')
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
                                    <h3>Complaint<span> {{$complaint->subject}}</span></h3>
                                </div>
                                <div class="table-responsive table-details">
                                    <table class="table cart-table table-borderless">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Complaint body</th>
                                                <th colspan="2">{{$complaint->status}}</th>
                                            </tr>
                                            
                                            
                                        </thead>

                                        <tbody>
                                            <tr class="table-order">
                                                <td>
                                                   <p>{!!$complaint->body!!}</p>
                                                </td>
                                            </tr>
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