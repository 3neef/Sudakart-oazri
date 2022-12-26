@extends('layouts.app2')
@section('title', __('adminNav.Logs'))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="bg-inner cart-section order-details-table">
                        <div class="row g-4">
                            <div class="col-xl-12">
                                <div class="card-details-title">
                                    <h3><span>{{$activity->description}}</span></h3>
                                </div>
                                <div class="table-responsive table-desi">
                                    @foreach ($activity->properties as  $property)
                                        
                                    <table class="table all-package table-category mt-5">
                                        <thead>
                                            @if ($loop->index == 0) 
                                            <tr>
                                                <div style="font-size: 1.5em; font-weight: bold; " class="d-flex justify-content-center mt-3">NEW</div>
                                            </tr>
                                            @elseif ($loop->index == 1)
                                            <tr>
                                                <div style="font-size: 1.5em; font-weight: bold; " class="d-flex justify-content-center mt-3">OLD</div>
                                            </tr>
                                            @endif
                                            <tr>
                                                @foreach ($property as $key => $value )
                                                    
                                                <th >{{$key}}</th>
                                                @endforeach
                                            </tr>
                                            
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach ($property as $key => $value )
                                                    
                                                <td >{{$value}}</td>
                                                @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                    @endforeach
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