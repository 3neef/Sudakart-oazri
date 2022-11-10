<div class="col-md-3">
    <ul class="list-group">
        <a href="{{ route('profile.index') }}" class="list-group-item list-group-link border-0 shadow-md  @if (Route::is('profile.index')) active @endif">
            <div class="d-flex justify-content-center self-center gap-2">
                <div class="mr-4" style="flex-basis: 25%;">
                    <i class="fa fa-user display-4 default-color" aria-hidden="true"></i>
                </div>
                <div  style="flex-basis: 75%;">
                    <h2 class="h6 text-dark">
                        {{ __('body.my_account') }}
                    </h2>
                    <p class="text-dark">
                        {{ __('labels.my_account_label') }}
                    </p>
                </div>
                <div>
                    <i class="fa fa-arrow-right default-color" aria-hidden="true"></i>
                </div>
            </div>
        </a>
        <a href=" {{ route('profile.order.refunds') }} " class="list-group-item list-group-link border-0 shadow-md @if (Route::is('profile.order.refunds')) active @endif">
            <div class="d-flex justify-content-center self-center gap-2">
                <div class="mr-4" style="flex-basis: 25%;">
                    <i class="fa fa-truck display-4 default-color" aria-hidden="true"></i>
                </div>
                <div style="flex-basis: 75%;">
                    <h2 class="h6 text-dark">
                        {{ __('body.return_orders') }}
                    </h2>
                    <p class="text-dark">
                        {{ __('labels.return_orders_label') }}
                    </p>
                </div>
                <div>
                    <i class="fa fa-arrow-right default-color" aria-hidden="true"></i>
                </div>
            </div>
        </a>
        <a href="{{ route('profile.myOrder') }}" class="list-group-item list-group-link border-0 shadow-md @if (Route::is('profile.myOrder')) active @endif">
            <div class="d-flex justify-content-center self-center gap-2">
                <div class="mr-4" style="flex-basis: 25%;">
                    <i class="fa fa-history display-4 default-color" aria-hidden="true"></i>
                </div>
                <div style="flex-basis: 75%;">
                    <h2 class="h6 text-dark">
                        {{ __('body.order_history') }}
                    </h2>
                    <p class="text-dark">
                        {{ __('labels.order_history_label') }}
                    </p>
                </div>
                <div>
                    <i class="fa fa-arrow-right default-color" aria-hidden="true"></i>
                </div>
            </div>
        </a>

        <a href="{{ route('profile.notifications') }}" class="list-group-item list-group-link border-0 shadow-md @if (Route::is('profile.notifications')) active @endif">
            <div class="d-flex justify-content-center self-center gap-2">
                <div class="mr-4" style="flex-basis: 25%;">
                    <i class="fa fa-bell display-4 default-color" aria-hidden="true"></i>
                </div>
                <div style="flex-basis: 75%;">
                    <h2 class="h6 text-dark">
                        {{ __('body.notifications') }}
                    </h2>
                    <p class="text-dark">
                       {{ __('labels.notifications_labels') }}
                    </p>
                </div>
                <div>
                    <i class="fa fa-arrow-right default-color" aria-hidden="true"></i>
                </div>
            </div>
        </a>

       
    </ul>
</div>