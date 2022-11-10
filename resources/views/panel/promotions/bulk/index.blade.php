@extends('layouts.app2')
@section('title', __('adminBody.Messages'))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <form class="form-inline search-form search-box">
                        <div class="form-group">
                            <input class="form-control-plaintext" type="search" placeholder="Search..">
                        </div>
                    </form>

                    <a href="{{route('admin.bulk.send')}}" class="btn btn-primary mt-md-0 mt-2">{{ __('adminBody.sent_noti') }}</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="all-package coupon-table table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        <button type="button"
                                            class="btn btn-primary add-row delete_all">{{ __('adminBody.Delete') }}</button>
                                    </th>
                                    <th>{{ __('adminBody.Name') }}</th>
                                    <th>{{ __('adminBody.Status') }}</th>
                                    <th>{{ __('adminBody.Created_On') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr data-row-id="1">
                                    <td>
                                        <input class="checkbox_animated check-it" type="checkbox"
                                            value="" id="flexCheckDefault" data-id="1">
                                    </td>

                                    <td>Product List</td>

                                    <td class="order-warning">
                                        <span>Waiting</span>
                                    </td>

                                    <td class="list-date">2021-04-18T00:00:00</td>
                                </tr>

                                <tr data-row-id="2">
                                    <td>
                                        <input class="checkbox_animated check-it" type="checkbox"
                                            value="" id="flexCheckDefault1" data-id="2">
                                    </td>

                                    <td>Digital Product</td>

                                    <td class="order-success">
                                        <span>Success</span>
                                    </td>

                                    <td class="list-date">2021-04-18T00:00:00</td>
                                </tr>

                                <tr data-row-id="3">
                                    <td>
                                        <input class="checkbox_animated check-it" type="checkbox"
                                            value="" id="flexCheckDefault2" data-id="3">
                                    </td>

                                    <td>User Media</td>

                                    <td class="order-warning">
                                        <span>Waiting</span>
                                    </td>

                                    <td class="list-date">2021-04-18T00:00:00</td>
                                </tr>

                                <tr data-row-id="4">
                                    <td>
                                        <input class="checkbox_animated check-it" type="checkbox"
                                            value="" id="flexCheckDefault3" data-id="4">
                                    </td>

                                    <td>About Product</td>

                                    <td class="order-pending">
                                        <span>Pending</span>
                                    </td>

                                    <td class="list-date">2021-04-18T00:00:00</td>
                                </tr>

                                <tr data-row-id="5">
                                    <td>
                                        <input class="checkbox_animated check-it" type="checkbox"
                                            value="" id="flexCheckDefault4" data-id="5">
                                    </td>

                                    <td>User Profile</td>

                                    <td class="order-success">
                                        <span>Success</span>
                                    </td>

                                    <td class="list-date">2021-04-18T00:00:00</td>
                                </tr>

                                <tr data-row-id="6">
                                    <td>
                                        <input class="checkbox_animated check-it" type="checkbox"
                                            value="" id="flexCheckDefault5" data-id="6">
                                    </td>

                                    <td>Discount Product</td>

                                    <td class="order-pending">
                                        <span>Pending</span>
                                    </td>

                                    <td class="list-date">2021-04-18T00:00:00</td>
                                </tr>

                                <tr data-row-id="7">
                                    <td>
                                        <input class="checkbox_animated check-it" type="checkbox"
                                            value="" id="flexCheckDefault6" data-id="7">
                                    </td>

                                    <td>About Invoice</td>

                                    <td class="order-success">
                                        <span>Success</span>
                                    </td>

                                    <td class="list-date">pppppp</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection