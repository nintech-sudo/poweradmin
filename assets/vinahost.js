toastr.options = {
    "closeButton": true,
    "debug": true,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "3000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

function alertSuccess(title = '', message = '') {
    toastr.success(message, title);
}

function alertError(title = '', message = '') {
    toastr.error(message, title);
}

function alertWarning(title = '', message = '') {
    toastr.warning(message, title);
}

function alertInfo(title = '', message = '') {
    toastr.info(message, title);
}

jQuery(function ($) {
    if ($('.needs-validation').length > 0 && $('.needs-validation select[name="type"]').length > 0 && $('.needs-validation input[name="content"]').length > 0) {
        // default type
        let default_type = $('.needs-validation select[name="type"]').val();
        if (default_type === 'DDNS') {
            $('.needs-validation input[name="content"]').removeAttr('required');
        }

        // event when change type
        $('.needs-validation select[name="type"]').on('change', function () {
            let type = $(this).val();
            if (type === 'DDNS') {
                $('.needs-validation input[name="content"]').removeAttr('required');
            }
        });
    }

    // copy and notification
    $(document).on('click', '.copy_token_link', function () {
        let token_link = $(this).attr('data-href');
        if (token_link != '' && token_link != undefined) {
            let inputElement = $("<input>");
            inputElement.val(token_link);
            $("body").append(inputElement);
            inputElement.select();
            document.execCommand("copy");
            inputElement.remove();
            alertSuccess('Sao chép thành công.');
        }
    });
});