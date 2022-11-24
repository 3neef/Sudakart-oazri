@extends('layouts.app2')
@section('title', __('adminNav.attributes'))
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
                                    <h3><span> 
                                        @if (app()->getLocale() == 'en')
                                            
                                        {{$attribute->en_name}}
                                        @else
                                            
                                        {{$attribute->name}}
                                        @endif
                                    </span></h3>
                                </div>
                                <div class="table-responsive table-details">
                                    <table class="table cart-table table-borderless">
                                        <thead>
                                            <tr>
                                                <th colspan="2">{{__('body.options')}}</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($attribute->options as $option)
                                            <tr class="table-order">
                                                <td>
                                                    <p style="font-weight: bold; color: black;">{{__('adminBody.Ref_No')}}</p>
                                                    <h5>##{{$option->attribute->id}}</h5>
                                                </td>
                                                <td>
                                                    <p style="font-weight: bold; color: black;">{{__('form.option')}}</p>
                                                    <h5>{{$option->option}}</h5>
                                                </td>
                                                <td>
                                                    <p style="font-weight: bold; color: black;">{{__('form.en_option')}}</p>
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