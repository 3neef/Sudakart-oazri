$(document).ready(function () {

    $('#return-order-btn').on('click',function () {  
        $('#return-order-modal').modal('show');
    });

    $('#clsBtnFooter').on('click',function () {  
        $('#return-order-modal').modal('hide');
    });

    $('#return-order-form').on('submit',function(event){
        
            event.preventDefault();
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
            });
            
    
            var formValue = $(this).serialize();
            var message = `<div class="alert alert-success alert-dismissible fade show" role="alert">
              Your request for returning a product has been placed successfully
          </div>`;
            
            
            $.ajax({
                url : '/profile/returnProduct',
                type : 'post',
                data: formValue,
                success:function(result){
                    if(result.success){
                        $('#return-order-modal').modal('hide');
                        $('#returned-message').html(message);
                        $('#return-order-form').reset();

                    }
                }
            })
        
    })

});

