(function($) {
    'use strict';

    function submitForm(url, form, redirect) {
        // Get form data
        const formData = $(form).serializeArray().reduce((obj, item) => (obj[item.name] = item.value, obj), {});

        // Post data
        $.ajax({
            url,
            type: 'POST',
            data: formData,
            success: function(data) {
                const { msg } = JSON.parse(data);
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: msg
                }).then((result) => {
                    window.location = redirect;
                });
            },
            error: function({ responseText }) {
                const { msg, type } = responseText ? JSON.parse(responseText) : { msg: 'Ha ocurrido un error, inténtalo más tarde', type: 'error' };
                Swal.fire({
                    icon: type,
                    title: type === 'error' ? 'Ups...' : 'Advertencia',
                    html: `${ msg.constructor === Array ? msg.join('<br />') : msg }`
                });
            }
        });
    }

    $('#signupForm').on('submit', function(e) {
        // Submit form
        e.preventDefault();
        submitForm('./api/signup.php', this, './index.php');
    });

    $('#signinForm').on('submit', function(e) {
        // Submit form
        e.preventDefault();
        submitForm('./api/signin.php', this, './index.php');
    });
    
})(jQuery);