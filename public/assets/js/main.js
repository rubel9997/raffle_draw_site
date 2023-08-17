$(document).ready(function () {
    $(document).on('input','#user-name',function () {
        $(this).closest('div.form-group').find('span.error-text').text('');
    })

    $(document).on('input','#user-email',function () {
        $(this).closest('div.form-group').find('span.error-text').text('');
    })

    $(document).on('input','#user-phone',function () {
            $(this).closest('div.form-group').find('span.error-text').text('');
    })

    $(document).on('input','#user-coupon',function () {
        $(this).closest('div.form-group').find('span.error-text').text('');
    })

    $(document).on('input','#category',function () {
        $(this).closest('div.form-group').find('span.error-text').text('');
    })

    $(document).on('input','#user-link',function () {
        $(this).closest('div.form-group').find('span.error-text').text('');
    })

    $(document).on('input','#inputGroupFile02',function () {
        $(this).closest('div.form-group').find('span.error-text').text('');
    })

    $('#raffle-form').on('submit',function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: new FormData(this),
            processData: false, // Change processType to processData
            dataType: 'json',
            contentType: false,
            beforeSend:function () {
                $(document).find('span.error-text').text('');
            },
            success:function (data) {
                if(data.status == 0){
                    $.each(data.error,function (prefix,val) {
                        $('span.'+prefix+'_error').text(val[0]);
                    })
                    $("html, body").animate({
                        scrollTop: 300
                    }, 1000)
                }else{
                    // console.log(data);
                    $('#raffle-form')[0].reset();
                    $('.form').hide();
                    $('.thanks').show();
                }
            },
        })
    })
})
