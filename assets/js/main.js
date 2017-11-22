$(document).ready(function () {
	$('#CPF').mask('000.000.000-00', {reverse: true, placeholder: "000.000.000-00"}); 
});

(function ($) {
    $.toggleShowPassword = function (options) {
        var settings = $.extend({
            field: "#password",
            control: "#toggle_show_password",
        }, options);

        var control = $(settings.control);
        var field = $(settings.field)

        control.bind('click', function () {
            if (control.is(':checked')) {
                field.attr('type', 'text');
            } else {
                field.attr('type', 'password');
            }
        })
    };
}(jQuery));

$.toggleShowPassword({
    field: '#password-input',
    control: '#enable-show'
});