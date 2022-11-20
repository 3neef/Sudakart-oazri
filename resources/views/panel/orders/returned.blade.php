@extends('layouts.app2')
@section('title', __('adminBody.Returned_Products_List'))
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    {{-- <form class="form-inline search-form search-box">
                        <div class="form-group">
                            <input class="form-control-plaintext" type="search" placeholder="Search..">
                        </div>
                    </form> --}}

                    {{-- <a href="add-digital-product.html" class="btn btn-primary mt-md-0 mt-2">Add New
                        Product</a> --}}
                </div>

                <div class="card-body">
                    <div class="table-responsive table-desi">
                        <table class="table list-digital all-package table-category "
                            id="editableTable">
                            <thead>
                                <tr>
                                    <th>{{ __('adminDash.order_ref') }}</th>
                                    <th>{{ __('adminBody.product_image') }}</th>
                                    <th>{{ __('adminBody.customer_name') }}</th>
                                    <th>{{ __('adminBody.Product_Name') }}</th>
                                    <th>{{ __('adminDash.product_status') }}</th>
                                    <th>{{ __('adminDash.reason') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td data-field="name">#{{$product->order_id}}</td>


                                    <td>
                                      
                                        <img src="{{asset($product->product ? $product->product->first : 'images/placeholder.png')}}"
                                            data-field="image" alt="
                                            ">
                                        
                                    </td>
                                    <td data-field="name">{{$product->orderProduct ? $product->orderProduct->order->customer->name : 'deleted customer' }}</td>

                                    <td data-field="name">{{$product->product ? $product->product->name : '' }}</td>

                                    <td>
                                        <a  href="javascript:void(0)">
                                            <span data-id="{{$product->id}}" 
                                                class=" badge
                                                @if ($product->status == 'pending')
                                                    badge-danger
                                                @elseif($product->status == 'approved')
                                                    badge-info
                                                @elseif($product->status == 'returned')
                                                    badge-secondary
                                                @elseif ($product->status == 'refunded')
                                                    badge-success
                                                @elseif ($product->status == 'rejected')
                                                    badge-primary
                                                @endif
                                                    asign-ticket">
                                                {{$product->status}}
                                            </span>
                                        </a>
                                    </td>

                                    <td data-field="name">{{$product->reason}}</td>
                                    
                                </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                    <div class="d-flex justify-content-center">
                        {!! $products->links() !!}
                    </div>
            </div>
        </div>
    </div>
</div>




<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="return-order-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLongTitle">Change order status</h5>
            </div>
            <div class="modal-body">
                <form id="asign-ticket" action="#" method="POST" id="return-order-form">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Change Status</label>
                        <div class="col-md-7">
                        <select class="mySelect2 form-control" name="status" required>
                            <option value="rejected">rejected</option>
                            <option value="refunded">refunded</option>
                            <option value="approved">approved</option>
                            <option value="returned">returned</option>
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Save" class="btn btn-outline-success">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" id="clsBtnFooter" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<script src="{{ asset('main/js/modal/order.js') }}" defer></script>
@endsection

@push('scripts')
<script>
    $('.asign-ticket').on('click',function () {  
            // alert('haaaay');
            var id = $(this).data('id');
            console.log(id);
            $('#asign-ticket').attr('action', '/admin/orders/returned/'+id);
            $('#return-order-modal').modal('show');
    
});
</script>
@endpush