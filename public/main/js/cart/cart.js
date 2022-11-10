$(document).ready(function(){

    $(".add-to-cart-no-option").on("click", function(event){
        event.preventDefault();
        $("#theme-digital-mart-password-1").LoadingOverlay("show");
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        

        var formValue = $(this.form).serialize();
        
        
        $.ajax({
            url : '/addTocart',
            type : 'post',
            data: formValue,
            success:function(result){
                livewire.emit('cart-added');
                $("#theme-digital-mart-password-1").LoadingOverlay("hide");
                notify();
                
            }
        })
    });


    $("#add-to-cart-form-with-option").on("submit", function(event){
        event.preventDefault();
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        
    
        var formValue = $(this).serialize();
        
        
        $.ajax({
            url : '/addTocartWithOptions',
            type : 'post',
            data: formValue,
            success:function(result){
                livewire.emit('cart-added');
            }
        })
    });

    $('.update-pro-btn').on('click',function(e){  
        e.preventDefault();
        $("#theme-digital-mart-password-1").LoadingOverlay("show");
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        var id = $(this).data('id');
        var quantity = $('#product-qty-'+id).val();
        
        $.ajax({
            url : '/updateCart',
            type : 'post',
            data: {quantity:quantity,rowId:id},
            success:function(result){
                livewire.emit('cart-view');
                $("#theme-digital-mart-password-1").LoadingOverlay("hide");
            }
        })
    });

    $('.update-pro-btn-mobile').on('click',function(e){  
        e.preventDefault();
        $("#theme-digital-mart-password-1").LoadingOverlay("show");
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        var id = $(this).data('id');
        var quantity = $('#product-qty-mobile-'+id).val();
        
        $.ajax({
            url : '/updateCart',
            type : 'post',
            data: {quantity:quantity,rowId:id},
            success:function(result){
                livewire.emit('cart-view');
                $("#theme-digital-mart-password-1").LoadingOverlay("hide");
            }
        })
    });

   

    $('input[type=radio][name=delivery_method_id]').on('change',function() {
        var price = $(this).data('price');
        $('#total_price-shipping').html(price.toFixed(2));

    });

    $('#apply-coupon-btn').on('click',function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        var code = $('#coupon-code-hidden-input').val();
        var message = `
            <div class="alert alert-success" role="alert">
                Coupon applied succefully
            </div>
        `;
        if(!code){
            var coupon = $('#coupon-input').val();
            if(coupon) {
                $.ajax({
                    url : '/applyCoupon',
                    type : 'post',
                    data: {coupon:coupon},
                    success:function(result){
                        
                        if(result.success == 1){
                            livewire.emit('check-reload');
                            $('#coupon-hidden-input').val(result.id);
                            $('#coupon-code-hidden-input').val(coupon);
                            $('#coupon-area').html(message);
                        }else {
                            alert(result.error);
                        }
                        
                    }
                })
            }else {
                alert('Please Enter A coupon');
            }
        }else {
            alert('You have applied this coupon allready !!!!!');
        }


    });

    $('#cartEffect').on('click', function () {
        $.notify({
            icon: 'fa fa-check',
            title: 'Success!',
            message: 'Item Successfully added to your cart'
        }, {
            element: 'body',
            position: null,
            type: "success",
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: true,
            placement: {
                from: "top",
                align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 5000,
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            },
            icon_type: 'class',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
        });
    });

    

});

function notify(){
    $.notify({
        icon: 'fa fa-check',
        title: 'Success!',
        message: 'Item Successfully added to your cart'
    }, {
        element: 'body',
        position: null,
        type: "success",
        allow_dismiss: true,
        newest_on_top: false,
        showProgressbar: true,
        placement: {
            from: "top",
            align: "right"
        },
        offset: 20,
        spacing: 10,
        z_index: 1031,
        delay: 5000,
        animate: {
            enter: 'animated fadeInDown',
            exit: 'animated fadeOutUp'
        },
        icon_type: 'class',
        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
            '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="title">{1}</span> ' +
            '<span data-notify="message">{2}</span>' +
            '<div class="progress" data-notify="progressbar">' +
            '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            '</div>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>'
    });
}


